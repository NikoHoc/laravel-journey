@extends('base')

@section('library-css')
<link href="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.css" rel="stylesheet">
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <h1>List Walks</h1>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-danger">Create</button>
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
                <td>{{ $data->started_at }}</td>
                <td>{{ $data->finished_at }}</td>
                <td>
                    <button type="button" class="btn btn-warning">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>


@endsection


@section('library-js')
<script src="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.js"></script>
@endsection