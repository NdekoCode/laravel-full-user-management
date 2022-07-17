<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="h-20 w-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!--First Name -->
            <div>
                <x-label for="firstname" :value="__('First Name')" />

                <x-input id="firstname" class="mt-1 block w-full" type="text" name="firstname" :value="old('firstname')" required
                    autofocus />
            </div>

            <!--Last Name -->
            <div>
                <x-label for="lastname" :value="__('Last Name')" />

                <x-input id="lastname" class="mt-1 block w-full" type="text" name="lastname" :value="old('lastname')"
                    required autofocus />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="mt-1 block w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="mt-1 block w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
