<x-device-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Perpindahan Barang') }}
        </h2>
    </x-slot> --}}

    
    <div class="mt-5 flex justify-center items-center place-content-center">
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif  

        <form action="{{ route('admin.devices.store', $outlet->id) }}" enctype="multipart/form-data" method="POST" class="w-3/4  border border-gray-500 rounded-lg dark:bg-white ">
            @csrf
            <div class="mt-5 flex justify-center">

                {{-- @foreach ($devices as $device ) --}}
                <h2 class="font-semibold text-3xl items-center text-gray-800 dark:text-black leading-tight">
                    Form Tambah Perangkat 
                    {{ $outlet->name }}
                </h2>
                    
                {{-- @endforeach --}}

            </div>
            <div class="m-10">
                {{-- @foreach ($devices as $device )
                    
                <div class="mb-6">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Ke Oulet</label>
                    <select id="default" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Outlet..</option>
                        <option value="US">{{ $device->outlet->name }}</option>
                        <option value="CA">RR Senopati</option>
                        <option value="FR">RR The Luc</option>
                        <option value="DE">RR Deltamas</option>
                      </select>
                </div>
                @endforeach --}}
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="device" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Device</label>
                        <input type="text" name="device" id="device" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
                    </div>
                    <div>
                        <label for="merek" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Merek</label>
                        <input type="text" name="merek" id="merek" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                    </div>
                    <div>
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Type</label>
                        <input type="text" name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                    </div>
                    <div>
                        <label for="serial_num" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Serial Number</label>
                        <input type="text" name="serial_num" id="serial_num" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                    </div>
                </div>

                <div class="mb-6">
                    
                    {{-- <form class="max-w-sm mx-auto"> --}}
                        <label for="qlt" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Quantity</label>
                        <div class="relative w-full">
                            <input type="number" name="qlt" id="qlt" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Jumlah perangkat" required />
                        </div>

                        <div class="flex items-center">
                            {{-- <div id="disabled-input" aria-label="disabled input" class="shrink-0 z-10 inline-flex  items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                                <span>1</span>
                            </div> --}}
                            
                            {{-- <label for="phone-input" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Phone number:</label> --}}
                            {{-- <div class="relative w-full">
                                <input type="phone" id="phone-input" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Jumlah perangkat" required />
                            </div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Kondisi</label>
                            <select name="status" class="form-control" required>
                                <option value="Baik">Baik</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        

                    {{-- </form> --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Photo</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                </div> 
               
                {{-- <div class="mb-5">
                    
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Your message</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>

                </div> --}}
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>

    </div>
    
  
      
</x-device-layout>
