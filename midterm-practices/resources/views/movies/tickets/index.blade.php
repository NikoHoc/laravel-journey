@extends('base.base')

@section('content')
<h1>Hello World from movies/tickets</h1>
<h1>Movie: {{ $movie->movie_title }}</h1>

@if (Session::has('message') && Session::get('alert-class') == 'success')
    <div class="alert alert-success mt-4" role="alert">
        {{ Session::get('message') }}
    </div>
@elseif(Session::has('message') && Session::get('alert-class') == 'failed')
    <div class="alert alert-error mt-4" role="alert">
        {{ Session::get('message') }}
    </div>
@endif

@foreach ($tickets as $ticket)
    <div class="mt-5">
        <p>Nama Customer: {{ $ticket->customer_name }}</p>
        <p>Kursi duduk: {{ $ticket->seat_number }}</p>
        @if($ticket->is_checked_in == 0)
            {{-- <a href="{{ url('ticket/checkin/' . $ticket->id) }}" class="btn btn-primary">Check In</a> --}}
            <form action="{{ url('ticket/checkin/' . $ticket->id) }}" method="POST" id="checkin-form-{{ $ticket->id }}">
                @csrf
                @method('PUT') <!-- Mengirim request PUT -->
                <button type="submit" class="btn btn-primary">Check In</button>
            </form>

            <form action="{{ url('ticket/delete/' . $ticket->id) }}" method="POST" id="delete-form-{{ $ticket->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary">Hapus Tiket</button>
            </form>
        @else
            <p>waktu cek in: {{ $ticket->check_in_time}}</p>
            <button disabled class="btn btn-primary">Sudah Check In ✅</button>
        @endif
    </div>        
@endforeach
@endsection