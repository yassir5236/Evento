<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($users as $user)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-shrink-0">
                                <img class="h-20 w-20 rounded-full border-4 border-gray-200" src="{{ asset( $user->image) }}" alt="{{ $user->name }}">
                            </div>
                            <div class="ml-4">
                                <div class="text-lg font-semibold text-gray-900">{{ $user->name }}</div>
                                <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                <div class="text-sm text-gray-500">{{ $user->role === 'organizer' ? 'Organizer' : 'User' }}</div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-semibold bg-red-100 hover:bg-red-200 rounded-md px-4 py-2 transition duration-300 ease-in-out"> soft Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
