@extends('base')

@section('library-css')
@endsection


@section('content')
<div class="container-fluid">
    <div class="row m-3">
        <div class="col-md-4">
            <a href="{{ route('walks.index') }}">
                <button type="button" class="btn btn-warning me-2" style="float: left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 512 512"><path fill="currentColor" d="m273.77 169.57l-89.09 74.13a16 16 0 0 0 0 24.6l89.09 74.13A16 16 0 0 0 300 330.14V181.86a16 16 0 0 0-26.23-12.29"/><path fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192s192-86 192-192Z"/></svg>
                </button>
            </a>
             
            <h1>
                @if(isset($id))
                    Edit Walk
                @else 
                    Create Walk
                @endif
            </h1>
        </div>
    </div>
    

    <div class="row m-3">
        <div class="col">
            <form action="{{ (isset($id)) ? route('walks.update', ['walk' => $id]) : route('walks.store') }}">

                <div class="mb-3">
                    <label for="owners" class="form-label">Owner Name</label>
                    <select class="selectOwner form-control" id="owners"name="owner">
                        @foreach($listOwners as $owner)
                        <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                          
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dogs" class="form-label">Dogs Name</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                </div>
            </form>
        </div>
        
        
    </div>
</div>
@endsection

@section('library-js')
<script>
    $(document).ready(function() {
        $('.selectOwner').select2();
    });
</script>
@endsection