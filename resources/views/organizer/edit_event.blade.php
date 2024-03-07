<!-- resources/views/events/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('events.update', $event->id) }}">
                        @csrf
                        <input type="hidden" name="organizer_id" value="{{auth()->user()->id}}"> 

                        @method('PUT')

                        <input type="hidden" name="id_event" value="{{ $event->id }}">
                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Event
                                Category</label>
                            <select name="category_id" id="category_id"
                                class="form-select rounded-md shadow-sm mt-1 block w-full">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $event->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $event->title }}" />
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="3" class="form-textarea mt-1 block w-full">{{ $event->description }}</textarea>
                        </div>

                        <!-- Date -->
                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                            <input type="date" name="date" id="date"
                                class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $event->date }}" />
                        </div>

                        <!-- Location -->
                        <div class="mb-4">
                            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                            <input type="text" name="location" id="location"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ $event->location }}" />
                        </div>

                        <!-- Available Seats -->
                        <div class="mb-4">
                            <label for="available_seats" class="block text-sm font-medium text-gray-700">Available
                                Seats</label>
                            <input type="number" name="available_seats" id="available_seats"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ $event->available_seats }}" />
                        </div>

                        <!-- Validation Mode -->
                        <div class="mb-4">
                            <label for="Mode_Validation_auto_manuel"
                                class="block text-sm font-medium text-gray-700">Validation Mode</label>
                            <select name="Mode_Validation_auto_manuel" id="Mode_Validation_auto_manuel"
                                class="form-select rounded-md shadow-sm mt-1 block w-full">
                                <option value="auto" @if ($event->Mode_Validation_auto_manuel == 'auto') selected @endif>Auto</option>
                                <option value="manuel" @if ($event->Mode_Validation_auto_manuel == 'manuel') selected @endif>Manuel</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
