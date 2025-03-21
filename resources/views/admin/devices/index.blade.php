<x-device-layout>
   <x-slot name="header">
      
      {{-- @foreach ($devices as $device ) --}}
      <div class="flex">
         <div class="">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               List Device || {{ $outlet_id }}
               
            </h2>

         </div>
         

      </div>
      {{-- @endforeach --}}
      
   </x-slot>

    <!-- ====== Table Section Start -->
<section class="dark:bg-dark py-10 lg:py-[50px]">
   
    <div class="container mx-auto">
      <div class="">
         {{-- @foreach ($devices as $device) --}}
          <div class="flex justify-between place-items-center bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <div class="flex ">
               <form action="{{ route('admin.devices.export') }}" method="GET" class="">
                   {{-- <label for="outlet">Pilih Outlet:</label> --}}
                   <select name="outlet_id" id="outlet" class="text-white bg-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-s-md text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-700  dark:focus:ring-blue-800" required>
                       <option value="" >Pilih Outlet</option>
                       @foreach($outlets as $outlet)
                           <option value="{{ $outlet->id }}" >{{ $outlet->name }}</option>
                       @endforeach
                   </select>
                   <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-e-md text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-700 dark:focus:ring-blue-800">Export</button>
               </form>
               <div class="flex text-white bg-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-s-md text-sm w-full sm:w-auto px-5  text-center dark:bg-gray-700  dark:focus:ring-blue-800">
                  <form action="{{ route('admin.devices.import') }}" method="POST" enctype="multipart/form-data" class="">
                     @csrf
                     <div class="flex items-center ">
                        <input type="file" name="file" class="w-full  text-sm text-gray-900 border border-gray-300 h-11 content-center rounded-s-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="large_size" type="file" required>
                        <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-e-md text-sm w-full sm:w-auto px-3 py-3 text-center dark:bg-green-500 dark:hover:bg-green-700" >Import</button>

                     </div>
                  </form>
   
               </div>
               
            </div> 
            <div class=" flex place-content-end">
               <a href="{{ route('admin.devices.create', $outlet_id) }}">
                  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Device</button>   
               </a>
            </div>
          </div>
 
         {{-- <div class="">
            <form action="{{ route('admin.devices.export') }}" method="GET">
               <label for="outlet">Pilih Outlet:</label>
               <select name="outlet_id" id="outlet" required>
                   <option value="">-- Pilih Outlet --</option>
                   @foreach($outlets as $outlet)
                       <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                   @endforeach
               </select>
               <button type="submit">Export Per Outlet</button>
           </form>
            <a href="{{ route('admin.devices.export') }}">
               <button type="submit" class="text-white bg-green-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-700 dark:focus:ring-blue-800">Export</button>

            </a>
            <a href="">
               

               <button type="submit" class="text-white bg-green-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-700 dark:focus:ring-blue-800">Import</button>

            </a>

         </div> --}}
         {{-- <div class=" flex place-content-end">
            <a href="{{ route('admin.devices.create', $outlet_id) }}">
               <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Device</button>

            </a>

         </div> --}}
            
         {{-- @endforeach --}}
      </div>
      <div class="flex flex-wrap -mx-4"> 
         <div class="w-full px-4">
            <div class=" max-w-full overflow-x-auto content-center ">
               <div class="grid place-content-center">

                  <table class="table-auto">
                     <thead>
                        <tr class="text-center bg-primary">
                           <th
                              class="w-auto min-w-[15px] border-l border-transparent py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                              >
                              Image
                           </th>
                           <th
                              class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                              >
                              Device
                           </th>
                           <th
                              class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                              >
                              Merek
                           </th>
                           <th
                              class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                              >
                              Type
                           </th>
                           <th
                              class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                              >
                              Qlt
                           </th>
                           <th
                              class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                              >
                              Serial Number
                           </th>
                           <th
                              class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                              >
                                Status
                           </th>
                           {{-- <th
                              class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                              >
                                Keterangan
                           </th> --}}
                           <th
                              class="w-auto min-w-[160px] border-r border-transparent py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                              >
                              Action
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        
                  @forelse ($devices as $device )
                     <tr class="">
                        <td
                           class="text-dark border-b border-l border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                           >
                           @if ($device->image)
                              <img src="{{ asset('storage/' . $device->image) }}" alt="Photo" width="80px" height="50px">
                           @else
                              <p>No image available</p>   
                           @endif
                        </td>
                        <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                           >
                           {{ $device->device }}
                           
                        </td>
                        <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                           >
                           {{ $device->merek }}
                           
                        </td>
                        <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                           >
                           {{ $device->type }}
                        </td>
                        <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                           >
                           {{ $device->qlt }}
                        </td>
                        <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                           >
                           {{ $device->serial_num }}
                        </td>
                        <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                           >
                           <strong>{{ $device->status }}</strong>
                        </a>
                        </td>
                        {{-- <td
                           class="text-dark border-b border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                           >
                           <a
                           href="{{ route('admin.report.index') }}"
                           class="inline-block px-6 py-2.5  text-primary hover:bg-primary hover:text-cyan-600 font-medium"
                           >
                        Lihat details
                        </a>
                        </td> --}}
                        <td
                           class="text-dark border-b border-r border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                           >
                           {{-- <a
                              href="{{ url('/report/detail') }}"
                              class="inline-block px-2 py-2 bg-orange-300 border rounded-md border-primary text-primary hover:bg-primary hover:text-zinc-500 font-medium"
                              >
                              Lihat
                           </a> --}}
                           <a
                              href="{{ route('admin.devices.edit', $device->id) }}"
                              class="inline-block px-2 py-2 bg-orange-300 border rounded-md border-primary text-primary hover:bg-primary hover:text-zinc-500 font-medium"
                              >
                              Edit
                           </a>
                           <form action="{{ route('admin.devices.destroy', $device->id) }}" method="post" style="display: inline;">

                              @csrf
                              @method('DELETE')
                              {{-- <a
                                 href="javascript:void(0)"
                                 type="submit"
                                 class="inline-block px-2 py-2 bg-red-500 border rounded-md border-primary text-primary hover:bg-primary hover:text-zinc-500 font-medium"
                                  onclick="return confirm('Apakah Anda yakin ingin menghapus device ini?')"
                                 >
                                 Delete
                              </a> --}}
                              <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus device ini?')"
                              class="inline-block px-2 py-2 bg-red-500 border rounded-md border-primary text-primary hover:bg-primary hover:text-zinc-500 font-medium"
                              
                              >Hapus</button>
                           </form>
                        </td>
                        {{-- <td>
                           {{ $device->outlet->id }}
                        </td> --}}
                     </tr>
                  
                  @empty
                  
                  <p>Tidak ada device dalam outlet ini.</p>
                  
                  {{-- @endforeach --}}
                  @endforelse
               </tbody>
                  </table>

               </div>
             </div>
          </div>
       </div>
    </div>
</section>

 <!-- ====== Table Section End -->
</x-device-layout>
