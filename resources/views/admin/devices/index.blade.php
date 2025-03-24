<x-device-layout>
   @section('title', 'Web Inventory - ' . config('app.name'))
   <x-slot name="header">
      
      {{-- @foreach ($devices as $device ) --}}
      <div class="flex">
         <div class="">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               {{-- <input type="hidden" value="{{ $outlet_id }}">
               @foreach ($devices as $device )
                  {{ $device->outlet->name }}
               @endforeach --}}
               List Device | {{ $outlets->where('id', $outlet_id)->first()->name ?? 'Outlet Tidak Ditemukan' }} | {{ $outlet_id }}

               
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
                   <select name="outlet_id" id="outlet" class="text-white bg-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-s-md text-sm w-full sm:w-auto px-5 py-2.5 dark:bg-gray-700  dark:focus:ring-blue-800" required>
                       <option value="" >Pilih Outlet</option>
                       @foreach($outlets as $outlet)
                           <option value="{{ $outlet->id }}" >{{ $outlet->id }} | {{ $outlet->name }}</option>
                       @endforeach
                   </select>
                   <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-e-md text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-500 dark:hover:bg-green-700 dark:focus:ring-blue-800">Export</button>
               </form>
               <div class="flex text-white bg-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-s-md text-sm w-full sm:w-auto px-5  text-center dark:bg-gray-700  dark:focus:ring-blue-800">
                  <form action="{{ route('admin.devices.import') }}" method="POST" enctype="multipart/form-data" class="">
                     @csrf
                     <div class="flex items-center ">
                        <input type="file" name="file" class="w-full text-sm text-gray-900 border border-gray-300 h-11 content-center rounded-s-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="large_size" type="file" required>
                        <button type="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-e-md text-sm w-full sm:w-auto px-3 py-3 text-center dark:bg-green-500 dark:hover:bg-green-700" >Import</button>

                     </div>
                  </form>
   
               </div>
               
              <button data-popover-target="popover-click" data-popover-trigger="click" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Format File</button>

              <div data-popover id="popover-click" role="tooltip" class="absolute z-10 invisible inline-block w-96 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                  <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                      <h3 class="font-semibold text-gray-900 dark:text-white">Format File</h3>
                  </div>
                  <div class="px-3 py-2">
                      <p>Sebelum Download file mohon cek dahulu "outlet_id" Import berdasarkan outlet ID yang ada sebelah kanan List Device</p>
                      <a href="{{ route('download.file', ['filename' => 'FormatDataIT.xlsx']) }}" class=" text-white focus:outline-none font-medium rounded-md text-sm w-full sm:w-auto  text-center  dark:hover:text-cyan-700">
                         Download
                     </a>
                  </div>
                  <div data-popper-arrow></div>
              </div>
            </div>


             <!-- Form Pencarian -->
            {{-- <form method="GET" action="{{ route('admin.devices.index', ['outlet_id' => $outlet_id]) }}">
               <input type="hidden" name="outlet_id" value="{{ $outlet_id }}">
               <input type="text" name="search" class="form-control mt-2" placeholder="Cari device..." value="{{ request('search') }}">
               <button type="submit" class="btn btn-primary mt-2">Cari</button>
            </form> --}}

            
            <form class="flex items-center max-w-sm mx-auto" method="GET" action="{{ route('admin.devices.index', ['outlet_id' => $outlet_id]) }}">   
               {{-- <label for="simple-search" class="sr-only">Search</label> --}}
               <input type="hidden" name="outlet_id" value="{{ $outlet_id }}">
               
               <div class="relative w-full">
                  <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                     <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                     </svg>
                  </div>
                  <input type="text" id="simple-search" name="search" value="{{ request('search') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search device..." />
               </div>
               <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                  </svg>
                  <span class="sr-only">Search</span>
               </button>
            </form>

            

            <div class=" flex place-content-end">
               <a href="{{ route('admin.devices.create', $outlet_id) }}">
                  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Device</button>   
               </a>
            </div>
          </div>
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
                           @if (auth()->user()->hasRole('admin'))
                           <th
                              class="w-auto min-w-[160px] border-r border-transparent py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                              >
                              Action
                           </th>

                           
                           @endif
                        </tr>
                     </thead>
                     <tbody>
                  
                  {{-- @if ($devices->count() > 0) --}}
                  @if(session('message'))
                        <li class="list-group-item text-danger">{{ session('message') }}</li>
                  {{-- @elseif ($devices->count() > 0)
                        @foreach ($devices as $device)
                           <li class="list-group-item">{{ $device->device }}</li>
                        @endforeach
                  @else
                        <li class="list-group-item">Tidak ada device ditemukan</li>
                  @endif --}}
                  @elseif ($devices->count() > 0)
                     @foreach ($devices as $device )
                     {{-- @forelse ($devices as $device ) --}}
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
                           @if (auth()->user()->hasRole('admin'))
                              <td
                                 class="text-dark border-b border-r border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                                 >
                                 <a
                                    href="{{ route('admin.devices.edit', $device->id) }}"
                                    class="inline-block px-2 py-2 bg-orange-300 border rounded-md border-primary text-primary hover:bg-primary hover:text-zinc-500 font-medium"
                                    >
                                    Edit
                                 </a>
                                 <form action="{{ route('admin.devices.destroy', $device->id) }}" method="post" style="display: inline;">

                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus device ini?')"
                                    class="inline-block px-2 py-2 bg-red-500 border rounded-md border-primary text-primary hover:bg-primary hover:text-zinc-500 font-medium"
                                    
                                    >Hapus</button>
                                 </form>
                              </td>
                              
                           @endif
                        </tr>
                     @endforeach
                  @else
                     {{-- @empty    --}}
                     
                     <p>Tidak ada device dalam outlet ini.</p>
                     
                     {{-- @endforelse --}}
                     
                  @endif
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
