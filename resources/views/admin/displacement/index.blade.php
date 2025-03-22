<x-device-layout>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('RR Sudirman') }}
        </h2>
    </x-slot> --}}


    
    <div class="mt-5 flex justify-center items-center place-content-center">
        @if (@session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="w-3/4  border border-gray-500 rounded-lg dark:bg-white">
            <div class="mt-5 flex justify-center">
                <h2 class="font-semibold text-3xl items-center text-gray-800 dark:text-black leading-tight">
                    Form Perpindahan Barang
                </h2>

            </div>
            <div class="m-10">
                <form action="{{ url('/displacement/create') }}" method="GET">
                    <div class="mb-6">
                        <label for="outlet_awal_id" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Dari Oulet</label>
                        <select id="outlet_awal_id" name="outlet_awal_id" onchange="this.form.submit()" class="form-control bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Pilih Outlet</option>
                            @foreach ($outlets as $outlet )
                                <option value="{{ $outlet->id }}" {{ request('outlet_awal_id') == $outlet->id ? 'selected' : ''}}>
                                    {{ $outlet->name }}
                                </option>
                            @endforeach
                    </div>
                </form>

                @if($selectedOutlet)
                <form action="{{ url('/displacement/store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="outlet_awal_id" value="{{ $selectedOutlet }}">
                    {{-- {{ dd($selectedOutlet) }} --}}
            
                    <div class="grid grid-cols-2 gap-4 mb-2">
                        <div class="">
                            <label for="device_id" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black ">Device</label>
                            <select name="device_id" id="device_id" class="form-control bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                <option value="">-- Pilih Device --</option>
                                @foreach($devices as $device)
                                    <option value="{{ $device->id }}">
                                        {{ $device->device }} - Merek : {{ $device->merek }} - Qlt : {{ $device->qlt }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label for="jumlah_pindah" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black `">Jumlah Pindah</label>
                            <input type="number" name="jumlah_pindah" class=" form-control bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="1" required>
                        </div>
                    </div>
                    <div class="">
                        <label for="outlet_tujuan_id" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black ">Outlet Tujuan</label>
                        <select name="outlet_tujuan_id" id="outlet_tujuan_id" class="form-control form-control bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">-- Pilih Outlet --</option>
                            @foreach($outlets as $outlet)
                                @if($outlet->id != $selectedOutlet)
                                    <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    
                    {{-- <div id="qlt" name="qlt" aria-label="disabled input" class="shrink-0 z-10 inline-flex  items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                        @foreach ($devices as $device)
                        <span>{{ $device->qlt }}</span>
                            
                        @endforeach
                    </div> --}}
                    <div class="grid grid-cols-2 gap-4 mb-3">
                        <div>
                            <label for="name_pic" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Name PIC</label>
                            <input type="text" id="name_pic" name="name_pic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
                        </div>
                        <div>
                            <label for="name_it" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Name IT</label>
                            <input type="text" id="name_it" name="name_it" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                        </div>

                    </div>
            
                    <div class="mb-3">
                        <label for="tanggal_pindah" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Tanggal Pindah</label>
                        <input 
                            type="date" 
                            name="tanggal_pindah" 
                            id="tanggal_pindah" 
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            required
                            />
                            
                    </div>
                    
                    <div class="mb-6">
                    
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Keterangan</label>
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
    
                    </div>
            
                    <button type="submit" class="btn btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </form>
                @endif
                    {{-- <label for="outlet_tujuan_id" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Ke Oulet</label>
                    <select id="outlet_tujuan_id" name="outlet_tujuan_id" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Pilih Outlet</option>
                        @foreach ($outlets as $outlet )
                            <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                        @endforeach
                      </select>

                      <div class="mb-3">
                        <label for="tanggal_pindah" class="form-label">Tanggal Pindah</label>
                        <input type="date" name="tanggal_pindah" id="tanggal_pindah" class="form-control" required>
                    </div>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="name_pic" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Name PIC</label>
                        <input type="text" id="name_pic" name="name_pic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
                    </div>
                    <div>
                        <label for="name_it" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Name IT</label>
                        <input type="text" id="name_it" name="name_it" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                    </div>
                    <div class="">
                        <label for="device_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Device</label>
                        <select id="device_id" name="device_id" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=""> Pilih Device</option>
                        </select>    
                    </div>   --}}
                    {{-- <div>
                        <div class="">
                            <label for="device_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Merek</label>
                            <select id="device_id" name="device_id" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                              @foreach ($devices as $device )
                                  <option value="{{ $device->id }}">{{ $device->merek }}</option>
                              @endforeach
                            </select>    
                        </div>  
                    </div> --}}
                    {{-- <div>
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Type</label>
                        <select id="device_id" name="device_id" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($devices as $device )
                            <option value="{{ $device->id }}">{{ $device->type }}</option>
                           
                        @endforeach
                        </select>
                    </div> --}}
                    {{-- <div>
                        <label for="serial_num" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Serial Number</label>
                        <select id="device_id" name="device_id" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        
                            @foreach ($devices as $device )
                                <option value="{{ $device->id }}">{{ $device->serial_num }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                </div>

                {{-- <div class="mb-6"> --}}
                    
                    {{-- <form class="max-w-sm mx-auto"> --}}
                        {{-- <label for="qlt" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Quantity</label>
                        
                        <div class="flex items-center">
                            <div id="qlt" name="qlt" aria-label="disabled input" class="shrink-0 z-10 inline-flex  items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                                <span>1</span>
                            </div>
                            
                            <label for="qlt" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Phone number:</label>
                            <div class="relative w-full">
                                <input type="number" id="qlt" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Jumlah perangkat" required />
                            </div>
                        </div> --}}

                    {{-- </form> --}}

                {{-- </div>  --}}
               
                {{-- <div class="mb-6">
                    
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Keterangan</label>
                    <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>

                </div> --}}
                {{-- <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> --}}
            </div>
        </div>

    </div>
    {{-- <script>
        document.getElementById("outlet_awal_id").addEventListener("change", function() {
            var outletId = this.value;
            var deviceSelect = document.getElementById("device_id");
    
            // Kosongkan daftar device saat outlet berubah
            deviceSelect.innerHTML = '<option value="">-- Pilih Device --</option>';
    
            if(outletId) {
                fetch('/perpindahan/devices/' + outletId)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(device => {
                            var option = document.createElement("option");
                            option.value = device.id;
                            option.text = device.device + ' - ' + device.merek + ' - ' + device.type;
                            deviceSelect.appendChild(option);
                        });
                    });
            }
        });
    </script> --}}
   
  
      
</x-device-layout>
