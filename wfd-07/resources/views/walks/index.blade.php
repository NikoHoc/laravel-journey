@extends('base')

@section('library-css')
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 btn-group">
            <h1>List Walks</h1>
            <a href="{{ route('walks.create') }}" class="btn mt-2">
                <button type="button" class="btn btn-sm btn-danger">
                    + Create
                </button>
            </a>
        </div>
    </div>
    @if (Session::has('message') && Session::get('alert-class') == 'success')
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @elseif(Session::has('message') && Session::get('alert-class') == 'danger')
        <div class="alert alert-danger" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <!--{{ $walks }} -->
    <table id="walkData" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dog</th>
                <th>Owner</th>
                <th>Start At</th>
                <th>Finished At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($walks as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->dogOwner->dog->name }}</td>
                <td>{{ $data->dogOwner->owner->name }}</td>
                <td>{{ \Carbon\Carbon::parse($data->started_at)->format('Y-m-d H:i:s') }}</td>
                <td>
                    @if($data->finished_at)
                        {{ \Carbon\Carbon::parse($data->finished_at)->format('Y-m-d H:i:s') }}
                    @else
                    -
                    @endif
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Action">
                        <a href="{{ route('walks.show', [ "walk" => $data->id ]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" class="bg-primary text-white"><path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2m1 15h-2v-6h2zm0-8h-2V7h2z"/></svg>
                        </a>
                        <a href="{{ route('walks.edit', [ "walk" => $data->id ]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" class="text-white bg-warning"><path fill="currentColor" d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75z"/></svg>
                        </a>
                        <form action="{{ route('walks.destroy', [ "walk" => $data->id ]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24" class="text-white bg-danger"><path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6zM19 4h-3.5l-1-1h-5l-1 1H5v2h14z"/></svg>
                        </form>
                    </div>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>


@endsection


@section('library-js')
<script>
    $(document).ready(function() {
        $('#walkData').DataTable({
            language: {
                searchPlaceholder: "Cari Dogs", 
            }
        });
    });
</script>
@endsection