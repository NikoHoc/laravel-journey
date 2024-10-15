<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\TicketController;
use App\Models\Ticket;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){ 
    return redirect('/movies');
});

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/tickets/{movie:id}', [MovieController::class, 'showTickets']);
Route::get('/movies/book/{movie:id}', [MovieController::class, 'showBookTicket']);

Route::post('/ticket/submit', [TicketController::class, 'submitTicket'])->name('ticket.submit');
Route::put('/ticket/checkin/{ticket:id}', [TicketController::class, 'checkIn']);
Route::delete('/ticket/delete/{ticket:id}', [TicketController::class, 'deleteTicket']);


// Route::get('/movies', [MovieController::class, 'show'])->name('movie');
// Route::get('/movies/tickets/{movie:id}', [MovieController::class, 'showTicket'])->name('movie.ticket');;
// Route::get('/movies/book/{movie:id}', [MovieController::class, 'toForm'])->name('movie.book');
// Route::post('/ticket/submit', [TicketController::class, 'submitTicket'])->name('ticket.submit');
// Route::put('/ticket/checkin/{ticket:id}', [TicketController::class, 'checkIn']);
// Route::delete('/ticket/delete/{ticket:id}', [TicketController::class, 'delete'])->name('ticket.delete');