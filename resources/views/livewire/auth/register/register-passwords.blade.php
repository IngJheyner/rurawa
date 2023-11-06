<div>

    <div class="space-y-2 mt-4">

        <x-label for="password" value="{{ __('Password') }}" />

        <x-group-input-rurawa>

            <x-slot name="icon">
                <i class="fa-solid fa-lock mx-2 my-auto text-2xl text-secondary-color"></i>
            </x-slot>

            <x-slot name="input">

                <div class="flex w-full">

                    <div class="relative flex-1" x-data="{ show: true }">
                        <x-input class="border-none w-full bg-gray-50 text-gray-500" id="password"
                            x-bind:type="show ? 'password' : 'text'" name="password" required
                            wire:model="password"
                            autocomplete="new-password" />

                        <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3"
                            @click="show = !show" :class="{ 'hidden': !show, 'block': show }">
                            <!-- Heroicon name: eye -->
                            <i class="fa fa-eye"></i>
                        </button>

                        <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3"
                            @click="show = !show" :class="{ 'block': !show, 'hidden': show }">
                            <!-- Heroicon name: eye-off -->
                            <i class="fa fa-eye-slash"></i>
                        </button>

                    </div>

                    <div class="flex items-center place-content-end ml-1">
                        <x-button wire:click="generatePassword" type="button">Generate</x-button>
                    </div>
                </div>


            </x-slot>

        </x-group-input-rurawa>

        <span class="text-sm">
            <span class="font-semibold">Password strength:</span> {{ $strengthLevels[$strengthScore] ?? 'Weak' }}
        </span>

        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">

            <div
            @class([
                "shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center transition-all duration-[1500]",
                "w-0" => $strengthScore == 0,
                "w-1/4 bg-red-500" => $strengthScore == 1,
                "w-1/2 bg-yellow-300" => $strengthScore == 2,
                "w-3/4 bg-yellow-500" => $strengthScore == 3,
                "w-full bg-primary-color" => $strengthScore == 4,
            ])></div>

        </div>

    </div>

    <!-- Confirm Password -->
    <div class="space-y-2 mt-4">

        <x-label for="passwordConfirmation" value="{{ __('Confirm Password') }}" />

        <x-group-input-rurawa>

            <x-slot name="icon">
                <i class="fa-solid fa-lock mx-2 my-auto text-2xl text-secondary-color"></i>
            </x-slot>

            <x-slot name="input">

                <x-input id="password_confirmation" class="border-none w-full bg-gray-50 text-gray-500" type="password"
                    name="password_confirmation"
                    wire:model="password_confirmation"
                    required autocomplete="new-password" />

            </x-slot>

        </x-group-input-rurawa>

    </div>

</div>
