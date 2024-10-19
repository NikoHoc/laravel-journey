@extends('base')

@section('library-css')
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <h1>List Walks</h1>
        </div>
        <div class="col-md-1">
            <a href="{{ route('walks.create') }}">
                <button type="button" class="btn btn-danger">Create</button>
            </a>
        </div>
    </div>

    <!--{{ $walks }} -->
    <table id="walkData">
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
                    <div class=" me-2">
                        <a href="{{ route('walks.show', [ "walk" => $data->id ] ) }}"> 
                            <button type="button" class="btn btn-xs btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2m1 15h-2v-6h2zm0-8h-2V7h2z"/></svg>
                            </button>
                        </a>
                        <a href="{{ route('walks.edit', ["walk" => $data->id ]) }}">
                            <button type="button" class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z"/></svg>
                            </button>
                        </a>
                        <a href="{{ route('walks.destroy', [ "walk" => $data->id ] ) }}">
                            <button type="button" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z"/></svg>
                            </button>
                        </a>

                        
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