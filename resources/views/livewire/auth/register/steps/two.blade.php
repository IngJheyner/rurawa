<div x-data="index">

    <a href="#" class="absolute top-1 left-[5rem] mt-4 mr-4 text-gray-500 hover:text-gray-900"
    wire:click="previous">
        <i class="fa-solid fa-arrow-left text-secondary-color mx-2 my-auto"></i> Atras
    </a>

    <div class="flex flex-col h-[calc(100vh-300px)] xl:h-[calc(100vh-270px)] mb-8">

        <div class="flex-1 mt-4 animate-blur-in overflow-y-auto overflow-hidden">

            <div class="space-y-2">

                <x-label class="required">{{ __('E-mail') }}</x-label>

                <x-group-input-rurawa>

                    <x-slot name="icon">
                        <i class="fa-solid fa-envelope mx-2 my-auto text-2xl text-secondary-color"></i>
                    </x-slot>

                    <x-slot name="input">
                        <x-input class="border-none w-full bg-gray-50 text-gray-500" placeholder="Escriba su correo electronico" type="email"
                        wire:model.defer="email"></x-input>
                    </x-slot>

                </x-group-input-rurawa>

                @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>

            <div class="space-y-2 mt-4">

                <x-label class="required" value="{{ __('Telephone') }}" />

                <x-group-input-rurawa>

                    <x-slot name="icon">
                        <i class="fa-solid fa-mobile mx-2 my-auto text-2xl text-secondary-color"></i>
                    </x-slot>

                    <x-slot name="input">

                        <div wire:ignore>
                            <x-input class="border-none w-full bg-gray-50 text-gray-500"
                            id="phone"
                            x-on:input="$wire.set('phone', intl.getNumber(), true)"
                            @keypress="function(event) { if (!(event.charCode >= 48 && event.charCode <= 57)) event.preventDefault();}"></x-input>
                        </div>

                    </x-slot>

                </x-group-input-rurawa>

                @error('phone')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>

            <livewire:auth.register.register-passwords/>

            @error('password')
                <span class="text-red-500 text-xs inline-block max-w-[450px]">{{ $message }}</span>
            @enderror

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="space-y-2 mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required
                            wire:model.defer="terms" />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>

                        </div>
                        @error('terms')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                    </x-label>
                </div>
            @endif


        </div>

    </div>

    <div class="button mt-8">

        <x-button class="w-full text-xs block"
        wire:click="save">

            {{-- Spinner de carga mientras se procesa la información --}}
            <span wire:loading wire:target="save">

                <x-spinner size="6" class="mr-3" />

            </span>

            {{ __('Register') }}

        </x-button>

    </div>

</div>

