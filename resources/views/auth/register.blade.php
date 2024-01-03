<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf


        <!-- Country -->
        <div class="mt-4">
            <x-input-label for="country" :value="__('Country')" />
            <select id="country" name="country" class="block mt-1 w-full" required>
                <option value="" disabled selected>Select Country</option>
                @foreach($countries as $name)
                    <option value="{{ $name }}" {{ old('country') == $name ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
            @error('country')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- Business Name -->
        <div class="mt-4">
            <x-input-label for="business_name" :value="__('Business Name')" />
            <x-text-input id="business_name" class="block mt-1 w-full" type="text" name="business_name" :value="old('business_name')" required autofocus autocomplete="business_name" />
            <x-input-error :messages="$errors->get('business_name')" class="mt-2" />
        </div>


        <!-- First Name -->
        <div class="mt-4">
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>





        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
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


        <!-- Website -->
        <div class="mt-4">
            <x-input-label for="website" :value="__('Website')" />
            <x-text-input id="website" class="block mt-1 w-full" type="url" name="website" :value="old('website')"  autofocus autocomplete="website" />
            <x-input-error :messages="$errors->get('website')" class="mt-2" />
        </div>

        <!-- Instagram -->
        <div class="mt-4">
            <x-input-label for="instagram" :value="__('Instagram')" />
            <x-text-input id="instagram" class="block mt-1 w-full" type="url" name="instagram" :value="old('instagram')"  autofocus autocomplete="instagram" />
            <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
        </div>

        <!-- Industry -->
        <div class="mt-4">
            <x-input-label for="industry" :value="__('Industry')" />
            <x-text-input id="industry" class="block mt-1 w-full" type="text" name="industry" :value="old('industry')"  autofocus autocomplete="industry" />
            <x-input-error :messages="$errors->get('industry')" class="mt-2" />
        </div>



        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
