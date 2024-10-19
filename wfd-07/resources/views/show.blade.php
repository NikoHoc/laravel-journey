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
            <h1>Walks {{ $walkData->id }}</h1>
        </div>
    </div>
    

    <div class="row m-3">
        <div class="col-md-3">
            <span class="fw-bold">Dog name:</span>
            <p>{{ $walkData->dogOwner->dog->name }}</p>
        </div>
        <div class="col-md-3">
            <span class="fw-bold">Owner name:</span>
            <p>{{ $walkData->dogOwner->owner->name }}</p>
        </div>
        <div class="col-md-3">
            <span class="fw-bold">Walk time</span>
            @if($walkData->finished_at)
            <p>
                {{ \Carbon\Carbon::parse($walkData->started_at)->format('Y-M-d | H:i') }}
                -
                {{ \Carbon\Carbon::parse($walkData->finished_at)->format('Y-M-d | H:i') }}
            </p>
            @else 
            <p>
                {{ \Carbon\Carbon::parse($walkData->started_at)->format('Y-M-d | H:i') }} - na
            </p>

            @endif
        </div>
    </div>


    
    
</div>


@endsection


@section('library-js')

@endsection