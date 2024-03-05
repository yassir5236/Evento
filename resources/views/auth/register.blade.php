<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Image -->
        <div class="mt-4">
            <x-input-label for="image" :value="__('Image')" />
            <input id="image" class="block mt-1 w-full" type="file" name="image" required />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <!-- Role Selection -->
        <div class="mt-4">
            <input type="hidden" name="role" id="selectedRole" value="user"> <!-- Valeur par défaut du rôle -->

            <x-input-label for="role" :value="__('Role')" />

            <div class="grid grid-cols-2 gap-4">
                <!-- User Card -->
                <div id="userCard" class="p-4 border border-indigo-400 rounded-md cursor-pointer hover:border-indigo-800" onclick="selectRole('user')">
                    <div class="flex items-center justify-center mb-2">
                        <svg width="40px" height="40px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <!-- Your SVG content here -->
                        </svg>
                    </div>
                    <p class="text-gray-500 text-xs">Select this card if you are an individual user.</p>
                </div>

                <!-- Enterprise Card -->
                <div id="organizerCard" class="p-4 border border-indigo-400 rounded-md cursor-pointer hover:border-indigo-800" onclick="selectRole('organizer')">
                    <div class="flex items-center justify-center mb-2">
                        <svg fill="#4848ff" width="40px" height="40px" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="#4848ff">
                            <!-- Your SVG content here -->
                        </svg>
                    </div>
                    <p class="text-gray-500 text-xs">Select this card if you are an organisator.</p>
                </div>
            </div>

            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function selectRole(role) {
            document.getElementById('selectedRole').value = role;

            const userCard = document.getElementById('userCard');
            const enterpriseCard = document.getElementById('organizerCard');

            if (role === 'user') {
                userCard.classList.add('border-indigo-900', 'border-2');
                userCard.classList.remove('border-indigo-400');
                enterpriseCard.classList.remove('border-indigo-900', 'border-2');
                enterpriseCard.classList.add('border-indigo-400');
            } else if (role === 'organizer') {
                enterpriseCard.classList.add('border-indigo-900', 'border-2');
                enterpriseCard.classList.remove('border-indigo-400');
                userCard.classList.remove('border-indigo-900', 'border-2');
                userCard.classList.add('border-indigo-400');
            }
        }
    </script>
</x-guest-layout>
