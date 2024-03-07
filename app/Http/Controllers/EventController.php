<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventCategory;
use Symfony\Component\Translation\CatalogueMetadataAwareInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Ticket;


class EventController extends Controller
{

    // public function index()
    // {
        
    //     $events = Event::paginate(10);
    //     return view('user.index', compact('events'));
    // }


        public function index()
    {
        $events = Event::paginate(10);
        $categories = EventCategory::all(); // Récupérer toutes les catégories d'événements
        return view('user.index', compact('events', 'categories'));
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
        // Vérifier si l'utilisateur actuel a déjà réservé cet événement
        $alreadyReserved = $event->reservations()->where('user_id', Auth::id())->exists();
        
        // Initialiser $ticket à null par défaut
        $ticket = null;

        // Si l'utilisateur a déjà réservé cet événement, générer le ticket
        if ($alreadyReserved) {
            // Récupérer la réservation de l'utilisateur
            $reservation = $event->reservations()->where('user_id', Auth::id())->first();

            // Générer le ticket
            $ticket = $this->generateTicket($reservation);
        }
    
        // Passer les données à la vue
        return view('user.detail_event', compact('event', 'alreadyReserved', 'ticket'));
    }

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

    public function filter(Request $request)
    {

        $categoryId = $request->input('category_id');
        // Vérifier si une catégorie a été sélectionnée
        if ($categoryId) {
            // Récupérer les événements associés à la catégorie sélectionnée
            $events = Event::where('category_id', $categoryId)->paginate(10);
        } else {
            // Si aucune catégorie n'est sélectionnée, afficher tous les événements
            $events = Event::paginate(10);
        }
    
        $categories = EventCategory::all(); // Récupérer toutes les catégories d'événements
        return view('user.index', compact('events', 'categories'));  
      }
    



    // Dans votre contrôleur des événements (EventController)
    public function search(Request $request)
    {
        $categories = EventCategory::all();
        $searchTerm = $request->input('search');
        $events = Event::where('title', 'like', '%' . $searchTerm . '%')->paginate(10);

        return view('user.index', compact('events', 'categories')); 
    }


    // public function reserve(Request $request, Event $event)
    // {
    //     $request->validate([
    //         'place_number' => 'required|integer|min:1',
    //     ]);
    
    //     Reservation::create([
    //         'place_number' => $request->place_number,
    //         'user_id' => auth()->id(),
    //         'event_id' => $event->id,
    //         'reservations_date' => now(), // Automatiquement définie la date actuelle
    //     ]);
    
    //     return redirect()->back()->with('success', 'Votre réservation a été effectuée avec succès.');
    // }

    public function reserve(Request $request, Event $event)
    {
        $request->validate([
            'place_number' => 'required|integer|min:1',
        ]);

        // Créer une nouvelle réservation
        $reservation = Reservation::create([
            'place_number' => $request->place_number,
            'user_id' => auth()->id(),
            'event_id' => $event->id,
            'reservations_date' => now(), // Automatiquement définie la date actuelle
        ]);

        // Générer un ticket pour la réservation
        $ticketController = new TicketController();
        $ticket = $ticketController->generateTicket($reservation);

        return redirect()->back()->with('success', 'Votre réservation a été effectuée avec succès. Votre ticket a été généré.');
    }
    
    
}




