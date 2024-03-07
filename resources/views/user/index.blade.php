<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Events') }}
        </h2>
    </x-slot>

    <div class="flex justify-between">
        <div class="py-4 p-10">
            <form action="{{ route('events.filter') }}" method="POST" class="flex items-center">
                @csrf
                <label for="category_id" class="text-sm font-medium text-gray-700 mr-2">Choisir une catégorie :</label>
                <div class="relative">
                    <select name="category_id" id="category_id"
                        class="mt-1 block rounded-md  focus:outline-none sm:text-sm">
                        <option value="">Toutes les catégories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                </div>
                <button type="submit"
                    class="ml-4 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Filtrer
                </button>
            </form>
        </div>




        <!-- Dans votre vue Blade -->
        <form action="{{ route('events.search') }}" method="post" class="flex items-center px-10">
            @csrf
            <input type="text" name="search" placeholder="Rechercher "
                class="w-64 h-12 px-4 bg-white border border-gray-300 rounded-l-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            <button type="submit"
                class="bg-indigo-600 text-white px-6 py-3 rounded-r-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Rechercher</button>
        </form>

    </div>


    <!-- Dans votre vue Blade -->
    @foreach ($events as $event)
        <!-- Afficher les détails de l'événement -->
    @endforeach

    <!-- Afficher la pagination -->
    {{ $events->links() }}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($events as $event)
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-6">
                            {{-- <h3 class="text-lg font-semibold mb-2">{{ $event->title }}</h3> --}}
                            <h3 class="text-lg font-semibold mb-2">
                                <a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a>
                            </h3>

                            <!-- Bouton d'édition -->

                            <div class="flex justify-bettwen">
                                @if (auth()->user()->role === 'organizer')
                                    <a href="{{ route('events.edit', $event->id) }}" class="p-2">
                                        <svg width="25px" height="25px" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title></title>
                                                <g id="Complete">
                                                    <g id="edit">
                                                        <g>
                                                            <path
                                                                d="M20,16v4a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V6A2,2,0,0,1,4,4H8"
                                                                fill="none" stroke="#000000" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"></path>
                                                            <polygon fill="none"
                                                                points="12.5 15.8 22 6.2 17.8 2 8.3 11.5 8 16 12.5 15.8"
                                                                stroke="#000000" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"></polygon>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>

                                    </a>


                                    <!-- Bouton de suppression -->
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2">

                                            <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path d="M10 12V17" stroke="#000000" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M14 12V17" stroke="#000000" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M4 7H20" stroke="#000000" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path
                                                        d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                                        stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                        stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination links -->
            <div class="mt-6">
                {{ $events->links() }}
            </div>
        </div>

</x-app-layout>
