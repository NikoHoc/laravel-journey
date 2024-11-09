@extends('base')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="m-2">
                <h1>{{ $clothes->name }}</h1>
                <img src="{{ asset('images/default-image.jpg') }}"
                <div style="background-color:{{ env(strtoupper($clothes->color)) }}; width:10rem; height:5rem">
                    <p>{{ $clothes->color }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="m-2">
                <h1>Reviews:</h1>
                @foreach ($clothes->reviews as $review)
                    <div class="mt-2"><h4>{{ $review->name }}<h4></div>
                    <div class="mb-3">{{ $review->review }}</div>
                @endforeach
            </div>
        </div>
    </div>
@endsection()