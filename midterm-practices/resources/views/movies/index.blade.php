@extends('base.base')

@section('content')

<h1>Hello World from movies</h1>
@foreach ($movies as $movie)
    <div class="mt-5">
        <p>Film: {{ $movie->movie_title }}</p>
        <p>Duration: {{ $movie->duration }}</p>
        <p>release data: {{ $movie->release_date }}</p>
        <p>Jumlah penonton: {{ $movie->tickets->count() }}</p>
        <a href="{{ url('movies/tickets/' . $movie->id) }}" class="btn btn-primary">Lihat Tiket</a>
    </div>        
@endforeach

@endsection