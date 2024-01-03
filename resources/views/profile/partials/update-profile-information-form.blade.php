<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mt-4">
            <x-input-label for="country" :value="__('Country')" />
            <select id="country" name="country" class="block mt-1 w-full" required>
                <option value="" disabled selected>Select Country</option>
                @foreach($countries as $name)
                    <option value="{{ $name }}" {{ old('country', $user->country) == $name ? 'selected' : '' }}>{{ $name }}</option>
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
            <x-text-input id="business_name" class="mt-1 block w-full" type="text" name="business_name" :value="$user->business_name,old('business_name')" required autofocus autocomplete="business_name" />
            <x-input-error :messages="$errors->get('business_name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="$user->first_name,old('first_name')" required autofocus autocomplete="first_name" />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="$user->last_name,old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="mt-1 block w-full" type="text" name="phone" :value="$user->phone,old('phone')" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="$user->email,old('email')" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Website -->
        <div class="mt-4">
            <x-input-label for="website" :value="__('Website')" />
            <x-text-input id="website" class="mt-1 block w-full" type="url" name="website" :value="$user->website,old('website')"  autofocus autocomplete="website" />
            <x-input-error :messages="$errors->get('website')" class="mt-2" />
        </div>

        <!-- Instagram -->
        <div class="mt-4">
            <x-input-label for="instagram" :value="__('Instagram')" />
            <x-text-input id="instagram" class="mt-1 block w-full" type="url" name="instagram" :value="$user->instagram,old('instagram')"  autofocus autocomplete="instagram" />
            <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
        </div>

        <!-- Industry -->
        <div class="mt-4">
            <x-input-label for="industry" :value="__('Industry')" />
            <x-text-input id="industry" class="mt-1 block w-full" type="text" name="industry" :value="$user->industry,old('industry')"  autofocus autocomplete="industry" />
            <x-input-error :messages="$errors->get('industry')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
