<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class TicketController extends Controller
{
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
