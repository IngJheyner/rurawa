<div>

    <a href="#" class="absolute top-1 left-[5rem] mt-4 mr-4 text-gray-500 hover:text-gray-900" wire:click="previous">

        <i class="fa-solid fa-arrow-left text-secondary-color mx-2 my-auto"></i> Atras

    </a>

    <div class="flex flex-col xl:h-[calc(100vh-270px)] mb-8" x-data>

        <div class="flex-1 mt-8 animate-blur-in overflow-y-auto overflow-hidden py-2">

            <!-- ===== ===== Company name ===== ===== -->
            <div class="space-y-2 mt-4">

                <x-label class="required">{{ __('Company name') }}</x-label>

                <x-group-input-rurawa>

                    <x-slot name="icon">
                        <i class="fa-solid fa-business-time mx-2 my-auto text-2xl text-secondary-color "></i>
                    </x-slot>

                    <x-slot name="input">

                        <input type="text" class="flex-1 border-0 focus:border-white focus:ring-white text-gray-500"
                            wire:model.defer="company_name" placeholder="Nombre de la empresa">
                    </x-slot>

                </x-group-input-rurawa>

                @error('company_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>

            <!-- ===== ===== Departament ===== ===== -->
            <div class="space-y-2 mt-4">

                <x-label class="required">{{ __('Departments') }}</x-label>

                <x-group-input-rurawa>

                    <x-slot name="input">

                        <select class="flex-1 border-0 focus:border-white focus:ring-white text-gray-500"
                            wire:model="department_id">

                            <option disabled selected value="0">Seleccione una opción</option>

                            @foreach ($this->departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach

                        </select>
                    </x-slot>

                </x-group-input-rurawa>

                @error('department_id')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>

            <!-- ===== ===== City ===== ===== -->
            <div class="space-y-2 mt-4">

                <x-label class="required">{{ __('Cities') }}</x-label>

                <x-group-input-rurawa>

                    <x-slot name="input">

                        <select class="flex-1 border-0 focus:border-white focus:ring-white text-gray-500"
                            wire:model="city_id">

                            <option disabled selected value="0">Seleccione una opción</option>

                            @foreach ($cities as $city)

                                <option value="{{ $city->id }}">{{ $city->name }}</option>

                            @endforeach

                        </select>

                    </x-slot>

                </x-group-input-rurawa>

                @error('city_id')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>

            <!-- ===== ===== Address ===== ===== -->
            <div class="space-y-2 mt-4">

                <x-label class="required">{{ __('Address') }}</x-label>

                <x-group-input-rurawa>

                    <x-slot name="icon">
                        <i class="fa-solid fa-house mx-2 my-auto text-2xl text-secondary-color "></i>
                    </x-slot>

                    <x-slot name="input">

                        <input type="text" class="flex-1 border-0 focus:border-white focus:ring-white text-gray-500"
                            wire:model.defer="address" placeholder="Carrera 9 No. 11-08">
                    </x-slot>

                </x-group-input-rurawa>

                @error('address')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>

            <!-- ===== ===== Organization belongs ===== ===== -->
            <div class="space-y-2 mt-4">

                <x-label class="required">{{ __('Categories company') }}</x-label>

                <x-group-input-rurawa>

                    <x-slot name="input">

                        <select class="flex-1 border-0 focus:border-white focus:ring-white text-gray-500"
                            wire:model.defer="organization_belongs">

                            <option disabled selected value="none">Seleccione una opción</option>

                            @foreach ($this->organizationBelongs as $key =>$organization)
                                <option value="{{ $key }}">{{ $organization }}</option>
                            @endforeach

                        </select>
                    </x-slot>

                </x-group-input-rurawa>

                @error('organization_belongs')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror

            </div>

        </div>
        <div class="btn mt-8">

            <x-button wire:click="next" class="w-full text-xs block">Continuar</x-button>

        </div>
    </div>
</div>
