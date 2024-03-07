<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ticket Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <div class="mb-8">
                        <h3 class="text-2xl font-semibold mb-2 text-indigo-600">Ticket Number:</h3>
                        <p class="text-gray-700">{{ $ticket->ticket_number }}</p>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-2xl font-semibold mb-2 text-indigo-600">Seat Number:</h3>
                        <p class="text-gray-700">{{ $ticket->seat_number }}</p>
                    </div>

                    <div class="mb-8">
                        <h3 class="text-2xl font-semibold mb-2 text-indigo-600">Valid Until:</h3>
                        <p class="text-gray-700">{{ $ticket->valid_until }}</p>
                    </div>
                    
                    <!-- Afficher les informations sur la réservation -->
                    <div>
                        <h3 class="text-2xl font-semibold mb-2 text-indigo-600">Reservation Information:</h3>
                        <p class="text-gray-700"><strong>Event:</strong> {{ $ticket->reservation->event->title }}</p>
                        <p class="text-gray-700"><strong>User:</strong> {{ $ticket->reservation->user->name }}</p>
                        <p class="text-gray-700"><strong>Reserved Places:</strong> {{ $ticket->reservation->place_number }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
