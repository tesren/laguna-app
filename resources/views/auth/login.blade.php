<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <img class="w-60" src="{{asset('/assets/img/laguna-logo-negro.png')}}" alt="Laguna Logo">
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Correo')" />

                <input class="rounded-md shadow-sm border-gray-300 block mt-1 w-full focus:border-green-600 focus:ring focus:ring-green-600 focus:ring-opacity-50" id="email" type="email" name="email" required="required" autofocus="autofocus">
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña')" />

                <input class="rounded-md shadow-sm border-gray-300 focus:border-green-600 focus:ring focus:ring-green-600 focus:ring-opacity-50 block mt-1 w-full" id="password" type="password" name="password" required="required" autocomplete="current-password">
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-600 focus:ring focus:ring-green-600 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif --}}

                <button type="submit" class="w-full text-center text-white rounded p-1" style="background-color: #1E4748">
                    {{ __('Iniciar sesión') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
