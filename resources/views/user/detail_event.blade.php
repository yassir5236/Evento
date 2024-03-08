{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-10"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.354 5.646a.5.5 0 0 1 .708.708L10.707 10l4.354 4.354a.5.5 0 0 1-.708.708L10 10.707l-4.354 4.354a.5.5 0 0 1-.708-.708L9.293 10 4.646 5.646a.5.5 0 0 1 .708-.708L10 9.293l4.354-4.354z" />
                        </svg>
                    </span>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-3xl font-semibold mb-4">{{ $event->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $event->description }}</p>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-gray-600"><strong>Date:</strong> {{ $event->date }}</p>
                        <p class="text-gray-600"><strong>Location:</strong> {{ $event->location }}</p>
                        <p class="text-gray-600"><strong>Available Seats:</strong> {{ $event->available_seats }}</p>
                        <p class="text-gray-600"><strong>Validation Mode:</strong>
                            {{ $event->Mode_Validation_auto_manuel }}</p>

                            <!-- Bouton pour afficher le ticket généré -->
                    @if($ticket)
                    <a href="{{ route('tickets.show', $ticket) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Voir le ticket</a>
                    @endif
                    </div>
                    <hr class="my-6">
                    <!-- Formulaire de réservation -->
                   
                    @if ($alreadyReserved)
                        <button type="button"
                            class="bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded cursor-not-allowed"
                            disabled>Déjà réservé</button>
                    @else
                        <form action="{{ route('events.reserve', $event) }}" method="post"
                            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            @csrf
                            <div class="mb-4">
                                <label for="place_number" class="block text-gray-700 text-sm font-bold mb-2">Nombre de
                                    places :</label>
                                <input type="number" id="place_number" name="place_number" min="1"
                                    value="1"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <input type="hidden" id="reservations_date" name="reservations_date"
                                value="{{ now() }}">
                            <div class="flex items-center justify-center">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Réserver</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-10"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.354 5.646a.5.5 0 0 1 .708.708L10.707 10l4.354 4.354a.5.5 0 0 1-.708.708L10 10.707l-4.354 4.354a.5.5 0 0 1-.708-.708L9.293 10 4.646 5.646a.5.5 0 0 1 .708-.708L10 9.293l4.354-4.354z" />
                        </svg>
                    </span>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-3xl font-semibold mb-4">{{ $event->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $event->description }}</p>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-gray-600"><strong>Date:</strong> {{ $event->date }}</p>
                        <p class="text-gray-600"><strong>Location:</strong> {{ $event->location }}</p>
                        <p class="text-gray-600"><strong>Available Seats:</strong> {{ $event->available_seats }}</p>
                        <p class="text-gray-600"><strong>Validation Mode:</strong>
                            {{ $event->Mode_Validation_auto_manuel }}</p>
                    </div>
                    <hr class="my-6">
                    <!-- Formulaire de réservation -->
                    @if ($alreadyReserved)
                        <button type="button"
                            class="bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded cursor-not-allowed"
                            disabled>Déjà réservé</button>
                    @else
                        <form action="{{ route('events.reserve', $event) }}" method="post"
                            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            @csrf
                            <div class="mb-4">
                                <label for="place_number" class="block text-gray-700 text-sm font-bold mb-2">Nombre de
                                    places :</label>
                                <input type="number" id="place_number" name="place_number" min="1"
                                    value="1"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <input type="hidden" id="reservations_date" name="reservations_date"
                                value="{{ now() }}">
                            <div class="flex items-center justify-center">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Réserver</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-10"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.354 5.646a.5.5 0 0 1 .708.708L10.707 10l4.354 4.354a.5.5 0 0 1-.708.708L10 10.707l-4.354 4.354a.5.5 0 0 1-.708-.708L9.293 10 4.646 5.646a.5.5 0 0 1 .708-.708L10 9.293l4.354-4.354z" />
                        </svg>
                    </span>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-3xl font-semibold mb-4">{{ $event->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $event->description }}</p>
                    <div class="grid grid-cols-2 gap-4">
                        <p class="text-gray-600"><strong>Date:</strong> {{ $event->date }}</p>
                        <p class="text-gray-600"><strong>Location:</strong> {{ $event->location }}</p>
                        <p class="text-gray-600"><strong>Available Seats:</strong> {{ $event->available_seats }}</p>
                        <p class="text-gray-600"><strong>Validation Mode:</strong>
                            {{ $event->Mode_Validation_auto_manuel }}</p>
                    </div>
                    <hr class="my-6">
                    <!-- Formulaire de réservation -->
                    @if ($alreadyReserved)
                        <button type="button"
                            class="bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded cursor-not-allowed"
                            disabled>Déjà réservé</button>
                    @else
                        <form action="{{ route('events.reserve', $event) }}" method="post"
                            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            @csrf
                            <div class="mb-4">
                                <label for="place_number" class="block text-gray-700 text-sm font-bold mb-2">Nombre de
                                    places :</label>
                                <input type="number" id="place_number" name="place_number" min="1"
                                    value="1"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <input type="hidden" id="reservations_date" name="reservations_date"
                                value="{{ now() }}">
                            <div class="flex items-center justify-center">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Réserver</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


