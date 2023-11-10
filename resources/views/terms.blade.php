<x-guest-layout>

    <x-authentication-rurawa-card>

        <x-slot name="header">

            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>

        </x-slot>

        <div class="bg-gray-100 h-[calc(100vh-300px)] xl:h-[calc(100vh-270px)]">
            <div class="flex flex-col items-center pt-6 sm:pt-0">

                <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                    {!! $terms !!}
                </div>
            </div>
        </div>
    </x-authentication-rurawa-card>
</x-guest-layout>
