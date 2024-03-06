<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($events as $event)
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-2">{{ $event->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ $event->description }}</p>
                            <p class="text-gray-600"><strong>Date:</strong> {{ $event->date }}</p>
                            <p class="text-gray-600"><strong>Location:</strong> {{ $event->location }}</p>
                            <p class="text-gray-600"><strong>Available Seats:</strong> {{ $event->available_seats }}</p>

                            {{-- <p class="text-gray-600"><strong>Categories:</strong>
                                @foreach ($event->categories as $category)
                                    {{ $category->name }}
                                    @if (!$loop->last), @endif
                                @endforeach
                            </p> --}}


                            <!-- Bouton d'édition -->
                            <a href="{{ route('events.edit', $event->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Edit
                            </a>

                            <!-- Bouton de suppression -->
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Delete
                                </button>
                            </form>


                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination links if needed -->
            <div class="mt-6">
                {{-- {{ $events->links() }} --}}
            </div>
        </div>
    </div>
</x-app-layout>
