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
                    <h3 class="text-lg font-semibold mb-4">Event Categories</h3>
                    @if ($categories->isEmpty())
                        <p class="text-gray-600">No categories found.</p>
                    @else
                        <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach ($categories as $category)
                                <li class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition duration-300 ease-in-out">
                                    <form action="{{ route('event-categories.update', $category->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-2">
                                            <label for="name_{{ $category->id }}" class="block font-medium text-sm text-gray-700">Category Name</label>
                                            <input id="name_{{ $category->id }}" class="block mt-1 w-full" type="text" name="name" value="{{ $category->name }}" required />
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="submit" class="text-blue-500 hover:text-blue-700">Update</button>
                                        </div>
                                    </form>
                                    <!-- Delete button -->
                                    <div class="mt-2 flex justify-end">
                                        <form action="{{ route('event-categories.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
