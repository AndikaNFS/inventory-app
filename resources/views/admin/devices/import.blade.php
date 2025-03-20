<x-device-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Perpindahan Barang') }}
        </h2>
    </x-slot> --}}

    
    <div class="mt-5 flex justify-center items-center place-content-center">
        {{-- @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif   --}}

        <form action="#" method="POST" class="w-3/4  border border-gray-500 rounded-lg dark:bg-white ">
            @csrf
            <div class="mt-5 flex justify-center">

                {{-- @foreach ($devices as $device ) --}}
                <div class="">

                    <h2 class="font-semibold text-3xl items-center text-gray-800 dark:text-black leading-tight">
                        Form Import Perangkat 
                        {{-- {{ $outlet->name }} --}}
                    </h2>
                </div>
                    
                {{-- @endforeach --}}
            </div>
            <div class="m-5 w-auto  grid place-content-center ">
                <div class="  w-96">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" for="file_input">Upload file</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
    
                </div>

            </div>
            
        </form>

    </div>
    
  
      
</x-device-layout>
