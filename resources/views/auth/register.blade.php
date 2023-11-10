<x-guest-layout>

    {{-- <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card> --}}

    <div x-data="index">

        <x-authentication-rurawa-card>

            <x-slot name="header">

                <h1 class="text-2xl font-bold text-center">{{ __('Create account') }}</h1>

            </x-slot>

            @livewire('register-wizard')

        </x-authentication-rurawa-card>

    </div>

    @push('scripts')

    <script>

        document.addEventListener('alpine:init', () => {
            Alpine.data('index', () => ({
                intl: null,
                phone: null,
                init() {

                    this.phone = document.querySelector("#phone");
                    if (this.phone)
                        this.intlTelInput(this.phone);

                },
                intlTelInput(phone) {
                    this.intl = intlTelInput(this.phone, {
                        initialCountry: 'co',
                        preferredCountries: ['co', 'us'],
                        separateDialCode: true,
                        //hiddenInput: "phone",
                        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                    });
                },
                animateImage(nameImage) {
                    const background = document.querySelector(".grid-guest-rigth span");
                    const img = document.querySelector(".grid-guest-rigth img");

                    background.classList.add("opacity-transition");

                    setTimeout(() => {

                        background.classList.remove("opacity-transition");
                        console.log(nameImage);
                        img.src = nameImage;


                    }, 1000);
                },
            }))
        });

    </script>

    @endpush

</x-guest-layout>
