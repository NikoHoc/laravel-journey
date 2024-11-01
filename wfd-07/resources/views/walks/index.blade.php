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
                            <button type="button" class="btn btn-sm btn-primary ml-1">
                                <i class="fa-solid fa-circle-info"></i>
                            </button>
                        </a>
                        <a href="{{ route('walks.edit', [ "walk" => $data->id ]) }}">
                            <button type="button" class="btn btn-sm btn-warning mx-1">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                        </a>
                        <form action="{{ route('walks.destroy', [ "walk" => $data->id ]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger ml-1">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
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