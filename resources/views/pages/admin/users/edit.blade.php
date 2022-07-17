<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="h-20 w-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @if (session('error'))
            <p class="text-red-500">{{ session('error') }}</p>
        @endif
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <!-- FirstName -->
            <div>
                <x-label for="firstname" :value="__('First Name')" />

                <x-input id="firstname" class="mt-1 block w-full" type="text" name="firstname" :value="old('firstname') ?? $user->firstname"
                    required autofocus />
            </div>

            <!-- LastName -->
            <div>
                <x-label for="lastname" :value="__('Larst Name')" />

                <x-input id="lastname" class="mt-1 block w-full" type="text" name="lastname" :value="old('lastname') ?? $user->lastname"
                    required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email') ?? $user->email"
                    required />
            </div>
            @if (Auth::user()->canDoVIPActions())
                <div class="mt-5">

                    @foreach ($roles as $role)
                        <div>

                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" id="{{ $role->id }}"
                                @foreach ($user->roles as $roleUser) @if ($roleUser->id === $role->id) checked @endif
                                @endforeach
                            class="mr-1 scale-125 border border-gray-700">
                            <label for="{{ $role->id }}" class="ml-1 text-gray-800">
                                {{ $role->name }}</label>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="mt-4 flex items-center justify-end">

                <x-button class="ml-4">
                    {{ __('Update') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
