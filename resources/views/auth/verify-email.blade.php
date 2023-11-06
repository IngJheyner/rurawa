<x-guest-layout>

    <div x-data="verify">

        <x-authentication-rurawa-card>
            <x-slot name="header">
                <x-slot name="logo">
                    <x-authentication-card-logo />
                </x-slot>
                <h1 class="text-2xl font-bold text-center">{{ __('Verfication account') }}</h1>
                <div class="my-4 text-sm text-gray-600">
                    {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>
            </x-slot>
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                </div>
            @endif
            <div class="mt-4 flex flex-col items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div>
                        <x-button type="submit">
                            {{ __('Resend Verification Email') }}
                        </x-button>
                    </div>
                </form>
                <div class="mt-4">
                    <a
                        href="{{ route('profile.show') }}"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        {{ __('Edit Profile') }}</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </x-authentication-rurawa-card>

    </div>

    @push('scripts')

    <script>

        document.addEventListener('alpine:init', () => {
            Alpine.data('verify', () => ({
                init() {
                    const img = document.querySelector(".grid-guest-rigth img");
                    if (img)
                        // cambiar el atributo src a una imagen
                        img.setAttribute("src", '{{ asset("img/auth/auth-email-1.jpg") }}');

                },
            }));

        });

    </script>

    @endpush


</x-guest-layout>
