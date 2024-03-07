<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Ticket;

class AdminController extends Controller
{
    public function statistics()
    {
        // Récupérez les données statistiques nécessaires
        $totalEvents = Event::count();
        $totalUsers = User::count();
        $totalReservations = Reservation::count();
        $totalTickets = Ticket::count();

        // Passez les données à la vue
        return view('admin.statistics', compact('totalEvents', 'totalUsers', 'totalReservations', 'totalTickets'));
    }
}
