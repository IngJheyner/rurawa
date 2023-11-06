 <div class="grid grid-cols-5 relative">

    <div class="col-span-2">

        <div class="bg-gray-50 rounded-[55px] shadow border border-gray-200 overflow-hidden absolute top-[50px]
        left-[calc(100%-90%)] min-w-[642px] max-w-[645px] min-h-[calc(100vh-85px)] z-10 p-16 flex flex-col">


            @if(isset($header))

                @if(isset($logo))
                    <div class="flex justify-center mb-4">{{ $logo }} </div>
                @endif

                <div class="card-header">
                    {{ $header }}
                </div>

            @endif

            <div class="card-body">
                {{ $slot }}
            </div>


        </div>

    </div>

    <div class="col-span-3 relative grid-guest-rigth w-full h-screen">

        <img src="{{ asset("img/auth/access.jpeg") }}" alt="" class="absolute top-0 left-0 w-full h-full object-cover">

        <span class="bg-secondary-color absolute left-0 opacity-50 w-full h-screen transition-[opacity] duration-[1s]"></span>


    </div>

</div>
