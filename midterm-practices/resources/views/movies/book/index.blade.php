@extends('base.base')

@section('library-css')
@endsection

@section('content')
<h1>Hello World from movies/book</h1>
@if (Session::has('message') && Session::get('alert-class') == 'success')
    <div class="alert alert-success mt-4" role="alert">
        {{ Session::get('message') }}
    </div>
@elseif(Session::has('message') && Session::get('alert-class') == 'failed')
    <div class="alert alert-error mt-4" role="alert">
        {{ Session::get('message') }}
    </div>
@endif
<form method="POST" class="w-1/2" action="{{ route('ticket.submit') }}">
    @csrf
    <div class="mb-4">
        <label for="customer_name" class="block text-gray-700 font-bold ">Movie : {{ $movie->movie_title }}</label>
        <input type="hidden" id="movie_id" name="movie_id" value="{{ $movie->id }}" required>
    </div>
    
    <div class="mb-4">
        <label for="customer_name" class="block text-gray-700">Customer Name</label>
        <input type="text" id="customer_name" name="customer_name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
    </div>
    <div class="mb-4">
        <label for="seat_number" class="block text-gray-700">Seat Number</label>
        <input type="text" id="seat_number" name="seat_number" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
    </div>
    <div class="mb-4">
        <label for="is_checked_in" class="block text-gray-700">Checked In</label>
        <input type="checkbox" id="is_checked_in" name="is_checked_in" class="mt-1">
    </div>

    <!-- Initially hidden Check-in Time input -->
    <div class="mb-4" id="check_in_time_container" style="display: none;">
        <label for="check_in_time" class="block text-gray-700">Check-in Time</label>
        <input type="datetime-local" id="check_in_time" name="check_in_time" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
    </div>
    <div>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md">Order Ticket</button>
    </div>
</form>


@section('library-js')
<script>
    $(document).ready(function() {
        // Set initial visibility based on the checkbox state
        if ($('#is_checked_in').is(':checked')) {
            $('#check_in_time_container').show();
        } else {
            $('#check_in_time_container').hide();
        }

        $('#is_checked_in').change(function() {
            if ($(this).is(':checked')) {
                $('#check_in_time_container').show();
            } else {
                $('#check_in_time_container').hide();
            }
        });
    });
</script>
@endsection


@endsection