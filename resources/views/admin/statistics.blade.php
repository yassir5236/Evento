<!-- resources/views/admin/statistics.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statistics') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="bg-blue-200 rounded-lg p-6 text-center">
                            <h3 class="text-3xl text-blue-800 font-semibold mb-2">{{ $totalEvents }}</h3>
                            <p class="text-gray-600">Total Events</p>
                        </div>
                        <div class="bg-yellow-200 rounded-lg p-6 text-center">
                            <h3 class="text-3xl text-yellow-800 font-semibold mb-2">{{ $totalUsers }}</h3>
                            <p class="text-gray-600">Total Users</p>
                        </div>
                        <div class="bg-green-200 rounded-lg p-6 text-center">
                            <h3 class="text-3xl text-green-800 font-semibold mb-2">{{ $totalReservations }}</h3>
                            <p class="text-gray-600">Total Reservations</p>
                        </div>
                        <div class="bg-purple-200 rounded-lg p-6 text-center">
                            <h3 class="text-3xl text-purple-800 font-semibold mb-2">{{ $totalTickets }}</h3>
                            <p class="text-gray-600">Total Tickets</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
