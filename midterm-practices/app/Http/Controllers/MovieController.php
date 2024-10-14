<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Ticket;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index () {
        //$movies = Movie::query()->get();
        $movies = Movie::with('tickets')->get();
        return view('movies.index', [
            'movies' => $movies
        ]);
    }

    public function showTickets ($id) {
        $movie = Movie::find($id);
        $tickets = Ticket::where('movie_id', $id)->get();
        return view('movies.tickets.index', [
            'movie' => $movie,
            'tickets' => $tickets,
        ]);
    }
}
