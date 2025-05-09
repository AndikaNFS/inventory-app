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

      <form action="{{ route('admin.devices.update', $device->id) }}" enctype="multipart/form-data" method="POST" class="w-3/4  border border-gray-500 rounded-lg dark:bg-white ">
          @csrf
          @method('PUT')
          <div class="mt-5 flex justify-center">

              {{-- @foreach ($devices as $device ) --}}
              <h2 class="font-semibold text-3xl items-center text-gray-800 dark:text-black leading-tight">
                  Form Tambah Perangkat 
                  {{-- {{ $outlet->name }} --}}
              </h2>
                  
              {{-- @endforeach --}}

          </div>
          <div class="m-10">
              <div class="grid gap-6 mb-6 md:grid-cols-2">
                  <div>
                      <label for="device" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Device</label>
                      <input value="{{ $device->device }}" type="text" name="device" id="device" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
                  </div>
                  <div>
                      <label for="merek" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Merek</label>
                      <input value="{{ $device->merek }}" type="text" name="merek" id="merek" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                  </div>
                  <div>
                      <label for="type" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Type</label>
                      <input value="{{ $device->type }}" type="text" name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                  </div>
                  <div>
                      <label for="serial_num" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Serial Number</label>
                      <input value="{{ $device->serial_num }}" type="text" name="serial_num" id="serial_num" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                  </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                  
                    <div class="relative w-full">
                          <label for="qlt" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Quantity</label>
                          <input value="{{ $device->qlt }}" type="number" name="qlt" id="qlt" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Jumlah perangkat" required />
                    </div>
                    <div>
                          <label for="name_pic" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Kondisi</label>
                          <select name="status" id="" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                              <option value="" disabled selected>Pilih Kondisi</option>
                              <option value="Baik" {{ $device->status == 'Baik' ? 'selected' : '' }}>Baik</option>
                              <option value="Rusak" {{ $device->status == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                          </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Photo</label>
                        <input type="file" name="image" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                        <small>Leave blank if you don't want to change the photo</small>
                        
                    </div>

                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
              </div> 
          </div>
      </form>

  </div>
  

    
</x-device-layout>
