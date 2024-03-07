<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Reservation;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function generateTicket(Reservation $reservation)
    {
        // Générer un numéro de ticket unique
        $ticketNumber = 'TICKET-' . uniqid();
    
        $ticket = Ticket::create([
            'reservation_id' => $reservation->id,
            'ticket_number' => $ticketNumber,
            'seat_number' => 'A12', // Numéro de siège (vous pouvez ajuster cela selon vos besoins)
            'valid_until' => now()->addDays(7), // Exemple de date de validité
        ]);
    
        return $ticket;
    }

        public function show(Ticket $ticket)
    {
        return view('user.ticket', compact('ticket'));
    }
}
