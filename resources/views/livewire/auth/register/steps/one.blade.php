<div>

    <a href="#" class="absolute top-1 left-[5rem] mt-4 mr-4 text-gray-500 hover:text-gray-900"
    wire:click="previous">
        <i class="fa-solid fa-arrow-left text-secondary-color mx-2 my-auto"></i> Atras
    </a>

    <div class="flex flex-col xl:h-[calc(100vh-270px)] mb-8" x-data>

        <div class="flex-1 mt-8 animate-blur-in overflow-y-auto overflow-hidden py-2">

            <div class="space-y-2">

                <x-label class="required">{{ __('First Name') }}</x-label>

                <x-group-input-rurawa>

                    <x-slot name="icon">
                        <i class="fa-solid fa-user mx-2 my-auto text-2xl text-secondary-color"></i>
                    </x-slot>

                    <x-slot name="input">
                        <x-input class="border-none w-full bg-gray-50 text-gray-500" placeholder="Escriba su nombre"
                        wire:model.defer="first_name"></x-input>
                    </x-slot>

                </x-group-input-rurawa>

                @error('first_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>

            <div class="space-y-2 mt-4">

                <x-label class="required">{{ __('Last Name') }}</x-label>

                <x-group-input-rurawa>

                    <x-slot name="icon">
                        <i class="fa-solid fa-user mx-2 my-auto text-2xl text-secondary-color"></i>
                    </x-slot>

                    <x-slot name="input">
                        <x-input class="border-none w-full bg-gray-50 text-gray-500" placeholder="Escriba su nombre"
                        wire:model.defer="last_name"></x-input>
                    </x-slot>

                </x-group-input-rurawa>

                @error('last_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>

            <div class="space-y-2 mt-4">

                <x-label class="required">{{ __('Type of Document') }}</x-label>

                <x-group-input-rurawa>

                    <x-slot name="input">

                        <select class="flex-1 border-0 focus:border-white focus:ring-white text-gray-500"
                        wire:model.defer="type_of_document">

                            <option disabled selected value="none">Seleccione una opción</option>
                            @foreach ($type_of_documents as $key => $type)
                                <option value="{{ $key }}">{{ $type }}</option>
                            @endforeach

                        </select>

                    </x-slot>

                </x-group-input-rurawa>

                @error('type_of_document')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>

            <div class="space-y-2 mt-4">

                <x-label class="required">{{ __('Number of document') }}</x-label>

                <x-group-input-rurawa>

                    <x-slot name="icon">
                        <i class="fa-solid fa-id-card mx-2 my-auto text-2xl text-secondary-color"></i>
                    </x-slot>

                    <x-slot name="input">
                        <x-input class="border-none w-full bg-gray-50 text-gray-500" placeholder="Numero de documento"
                        wire:model.defer="document_number"
                        @keypress="function(event) { if (!(event.charCode >= 48 && event.charCode <= 57)) event.preventDefault(); }"></x-input>
                    </x-slot>

                </x-group-input-rurawa>

                @error('document_number')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>

            <div class="space-y-2 mt-4">

                <x-label>{{ __('organization to which it belongs') }}</x-label>
                <x-group-input-rurawa>

                    <x-slot name="input">

                        <select class="flex-1 border-0 focus:border-white focus:ring-white text-gray-500">

                            <option disabled selected>Seleccione una opción</option>
                            <option value="1">Natural</option>
                            <option value="2">Juridica</option>

                        </select>

                    </x-slot>

                </x-group-input-rurawa>

            </div>

        </div>

        <div class="btn mt-8">

            <x-button wire:click="next" class="w-full text-xs block">Continuar</x-button>

        </div>

    </div>

</div>
