<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'place_number',
        'reservations_date',
        'user_id',
        'event_id',
        'statut', // Ajoutez la colonne statut à la liste fillable

    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'reservations_date' => 'datetime',
    ];

    /**
     * Get the user who made the reservation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the event for which the reservation was made.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

  
}
