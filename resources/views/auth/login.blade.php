<x-guest-layout>

    <x-authentication-rurawa-card>

        <x-slot name="header">

            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>

        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))

            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>

        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mt-4">

                <x-label for="email" value="{{ __('Email') }}" />

                <x-group-input-rurawa>

                    <x-slot name="icon">
                        <i class="fa-solid fa-envelope mx-2 my-auto text-2xl text-secondary-color"></i>
                    </x-slot>

                    <x-slot name="input">

                        <x-input id="email" type="email" name="email" class="border-none w-full bg-gray-50 text-gray-500" placeholder="Escriba su email"
                        :value="old('email')"
                        required autofocus autocomplete="username"></x-input>

                    </x-slot>

                </x-group-input-rurawa>

            </div>

            <div class="mt-4" x-data="{ show: true }">

                <x-label for="password" value="{{ __('Password') }}" />

                <x-group-input-rurawa>

                    <x-slot name="icon">
                        <i class="fa-solid fa-lock mx-2 my-auto text-2xl text-secondary-color"></i>
                    </x-slot>

                    <x-slot name="input">

                        <div class="relative flex w-full">

                            <x-input id="password" class="border-none w-full bg-gray-50 text-gray-500 flex-1" type="password" name="password" required
                            x-bind:type="show ? 'password' : 'text'"
                            autocomplete="current-password" />

                            <button type="button" class="absolute inset-y-0 right-0 items-center pr-3"
                                @click="show = !show" :class="{ 'hidden': !show, 'block': show }">
                                <!-- Heroicon name: eye -->
                                <i class="fa fa-eye"></i>
                            </button>

                            <button type="button" class="absolute inset-y-0 right-0 items-center pr-3"
                                @click="show = !show" :class="{ 'block': !show, 'hidden': show }">
                                <!-- Heroicon name: eye-off -->
                                <i class="fa fa-eye-slash"></i>
                            </button>

                        </div>
                    </x-slot>
                </x-group-input-rurawa>

            </div>

            <div class="block mt-4">

                <label for="remember_me" class="flex items-center">

                    <x-checkbox id="remember_me" name="remember" />

                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>

                </label>
            </div>

            <div class="flex items-center justify-end mt-4">

                @if (Route::has('password.request'))

                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>

                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

    </x-authentication-rurawa-card>

</x-guest-layout>
