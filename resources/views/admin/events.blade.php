<!-- resources/views/events/pending.blade.php -->

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pending Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                @foreach ($pendingEvents as $event)
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-4">{{ $event->title }}</h3>
                            <p class="text-gray-600"><strong>Description:</strong> {{ $event->description }}</p>
                            <p class="text-gray-600"><strong>Date:</strong> {{ $event->date }}</p>
                            <!-- Ajoutez d'autres détails d'événement selon vos besoins -->
                        </div>
                        <div class="flex justify-end p-4 bg-gray-100">
                            <!-- Formulaire pour approuver l'événement -->
                            <form method="POST" action="{{ route('events.approve', $event) }}">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Approve</button>
                            </form>
                            <!-- Formulaire pour rejeter l'événement -->
                            <form method="POST" action="{{ route('events.reject', $event) }}">
                                @csrf
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Reject</button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout> --}}

<!-- resources/views/events/pending.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pending Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                @foreach ($pendingEvents as $event)
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-4">{{ $event->title }}</h3>
                            <p class="text-gray-600"><strong>Description:</strong> {{ $event->description }}</p>
                            <p class="text-gray-600"><strong>Date:</strong> {{ $event->date }}</p>
                            <!-- Ajoutez d'autres détails d'événement selon vos besoins -->
                        </div>
                        <div class="flex justify-end p-4 bg-gray-100">
                            <!-- Icône d'approbation de l'événement -->
                            <form method="POST" action="{{ route('events.approve', $event) }}">
                                @csrf
                                <button type="submit"
                                    class="text-green-500 hover:text-green-700 mr-4 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </button>
                            </form>
                            <!-- Icône de rejet de l'événement -->
                            <form method="POST" action="{{ route('events.reject', $event) }}">
                                @csrf
                                <button type="submit" class="text-red-500 hover:text-red-700 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
