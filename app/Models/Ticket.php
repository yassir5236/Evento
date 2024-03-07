<?php
// app/Models/Ticket.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'ticket_number', // Numéro de ticket unique
        'seat_number', // Numéro de siège
        'valid_until', // Date de fin de validité du ticket
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

        // Ajoutez ces méthodes pour accéder aux informations sur l'utilisateur et l'événement
        public function user()
        {
            return $this->reservation->user();
        }
    
        public function event()
        {
            return $this->reservation->event();
        }
}
