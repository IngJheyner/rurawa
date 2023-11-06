<div x-data="index">

    <div class="flex flex-col h-[calc(100vh-300px)] my-8" x-data>

        <div class="flex-1 animate-blur-in">

            <!--===========================================
            TIPO DE USUARIO
            ===========================================-->
            <div class="flex justify-around">

                <button
                @class([
                    'border border-solid border-secondary-color py-2 px-4 rounded text-gray-500',
                    'bg-primary-color text-white border-primary-color hover:bg-primary-color hover:text-white' => $type_user == 'farmer',
                ])
                x-on:click="$wire.set('type_user', 'farmer');animateImage('img/auth/farmer.jpeg');"
                >
                    <i class="fa-solid fa-tractor"></i>  {{ __('Farmer') }}
                </button>

                <button
                @class([
                    'border border-solid border-secondary-color py-2 px-4 rounded text-gray-500',
                    'bg-primary-color text-white border-primary-color hover:bg-primary-color hover:text-white' => $type_user == 'company',
                ])
                x-on:click="$wire.set('type_user', 'company');animateImage('img/auth/company.jpeg');"
                >
                    <i class="fa-solid fa-building"></i>  {{ __('Company') }}
                </button>

            </div>

            @error('type_user')
                <span class="text-red-500 text-xs italic mt-4 inline-block">{{ $message }}</span>
            @enderror

            <!--===========================================
            TIPO DE PERSONA
            ===========================================-->
            <div class="space-y-2 mt-8">

                <x-label for="type_person" class="required">{{ __('type of person') }}</x-label>

                <x-group-input-rurawa>

                    <x-slot name="input">

                        <select class="flex-1 border-0 focus:border-white focus:ring-white text-gray-500"
                        wire:model="type_person">

                            <option disabled selected value="none">Seleccione una opción</option>

                            @foreach ($type_of_persons as $key => $person)

                                <option value="{{ $key }}">{{ $person }}</option>

                            @endforeach


                        </select>

                    </x-slot>

                </x-group-input-rurawa>

                @error('type_person')
                    <span class="text-red-500 text-xs italic mt-4 inline-block">{{ $message }}</span>
                @enderror

            </div>

        </div>

        <div class="button">

            <x-button wire:click="next" class="w-full text-xs" wire:loading.attr="disabled" type="button">

                {{ __('Continue') }}

            </x-button>

            <p class="text-center mt-2">{{ __("Do you already have an account?") }}
            <x-nav-link>{{ __("Enter") }}</x-nav-link></p>


        </div>

    </div>

</div>
