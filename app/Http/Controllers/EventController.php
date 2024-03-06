<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventCategory;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::all();
        return view('organizer.index', compact('events'));
    }


    // Afficher le formulaire pour créer un nouvel événement
    public function create()
    {
        $categories = EventCategory::all();

        return view('organizer.add_event', compact('categories'));

    }

    // Enregistrer un nouvel événement dans la base de données
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'available_seats' => 'required|integer',
            'Mode_Validation_auto_manuel' => 'required',

        ]);

        // dd($request->input(''));

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    
    // Afficher les détails d'un événement spécifique
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    // Afficher le formulaire pour mettre à jour un événement existant
    public function edit(Event $event)
    {
         $categories = EventCategory::all();
        return view('organizer.edit_event', compact('event', 'categories'));
    }

    // Mettre à jour les données d'un événement dans la base de données
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'available_seats' => 'required|integer',
            'Mode_Validation_auto_manuel' => 'required',
        ]);
    
        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'available_seats' => $request->available_seats,
            'Mode_Validation_auto_manuel' => $request->Mode_Validation_auto_manuel,
        ]);

    
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }
    // Supprimer un événement de la base de données
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}




