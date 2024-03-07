<!-- resources/views/events/categories.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-semibold mb-4 text-gray-800">Event Categories</h3>
                    @if ($categories->isEmpty())
                        <p class="text-gray-600">No categories found.</p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach ($categories as $category)
                                <div class="bg-blue-100 rounded-lg shadow-md p-6 transition duration-300 ease-in-out transform hover:scale-105">
                                    
                                    <form action="{{ route('event-categories.update', $category->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4">
                                            <label for="name_{{ $category->id }}" class="block font-semibold text-sm text-gray-700">Category Name</label>
                                            <input id="name_{{ $category->id }}" class="block mt-1 w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" type="text" name="name" value="{{ $category->name }}" required />
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="submit" class="text-blue-500 hover:text-blue-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                                                    <path fill-rule="evenodd" d="M13 3h-2V2H9v1H4v1H3v14h14V5h-3V4h-2V3zM5 16V6h10v10H5z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                    <!-- Delete button -->
                                    <div class="mt-4 flex justify-end">
                                        <form action="{{ route('event-categories.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
                                                    <path fill-rule="evenodd" d="M5.293 14.707a1 1 0 0 0 1.414 1.414L10 11.414l3.293 3.293a1 1 0 0 0 1.414-1.414L11.414 10l3.293-3.293a1 1 0 1 0-1.414-1.414L10 8.586 6.707 5.293a1 1 0 0 0-1.414 1.414L8.586 10 5.293 13.293z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
