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
</x-app-layout>
