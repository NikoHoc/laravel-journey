<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class TicketController extends Controller
{
    public function submitTicket(Request $request ) {
        $validatedData = $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'customer_name' => 'required|string|max:100',
            'seat_number' => 'required|string|max:5',
            'is_checked_in' => 'nullable|boolean',
            'check_in_time' => 'nullable|date',
        ]);

        try {
            if ($request->has('is_checked_in') && $request->is_checked_in) {
                Ticket::create([
                    'movie_id' => $validatedData['movie_id'],
                    'customer_name' => $validatedData['customer_name'],
                    'seat_number' => $validatedData['seat_number'],
                    'is_checked_in' => true,
                    'check_in_time' => $validatedData['check_in_time'] ?? now(),
                ]);
    
                FacadesSession::flash('message', 'Berhasil book tiket dan check in!');
                FacadesSession::flash('alert-class', 'success');
            } else {
                Ticket::create([
                    'movie_id' => $validatedData['movie_id'],
                    'customer_name' => $validatedData['customer_name'],
                    'seat_number' => $validatedData['seat_number'],
                    'is_checked_in' => false, 
                    'check_in_time' => null, 
                ]);
    
                FacadesSession::flash('message', 'Berhasil book tiket, belum check in');
                FacadesSession::flash('alert-class', 'success');
            }
        } catch (QueryException $e) {
            FacadesSession::flash('message', 'Gagal book tiket: ' . $e->getMessage());
            FacadesSession::flash('alert-class', 'danger');
        }

        return redirect()->back();
    }

    public function checkIn($id) {
        // $ticket = Ticket::where('id', $id)->get();

        $ticket = Ticket::find($id);

        if ($ticket) {
           
            $ticket->is_checked_in = true; 
            $ticket->check_in_time = now();

            // Simpan perubahan
            $ticket->save();
            FacadesSession::flash('message', 'Berhasil Check In');
            FacadesSession::flash('alert-class', 'success');
        } else {
            FacadesSession::flash('message', 'Gagal Check In');
            FacadesSession::flash('alert-class', 'failed');
        }

        return redirect()->back();
    }

    public function deleteTicket($id) {
        // $ticket = Ticket::where('id', $id)->get();

        $ticket = Ticket::find($id);

        if ($ticket) {
            $ticket->delete();

            // Flash message sukses
            FacadesSession::flash('message', 'Berhasil menghapus tiket');
            FacadesSession::flash('alert-class', 'success');
        } else {
            // Flash message gagal
            FacadesSession::flash('message', 'Tiket gagal dihapus');
            FacadesSession::flash('alert-class', 'failed');
        }

        return redirect()->back();
    }
}
