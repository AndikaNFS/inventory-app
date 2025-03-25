<x-device-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reporting Perpindahan Barang') }}
        </h2>
    </x-slot>

    {{-- <section class="dark:bg-dark py-10">
        <div class="container mx-auto">
           

            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                @foreach ($displacements as $key => $dis )
                    <h6 >{{ $key + 1 }}</h6>
                    <h6>{{ $dis->device->device ?? 'Tidak Ditemukan' }}</h6>
                    <h6>{{ $dis->device->type ?? 'Tidak Ditemukan' }}</h6>
                    <h6>{{ $dis->description ?? 'Tidak Ditemukan' }}</h6>
                    <h6>{{ $dis->outletAwal->name ?? 'Tidak Ditemukan' }}</h6>
                    <h6>{{ $dis->outletTujuan->name ?? 'Tidak Ditemukan' }}</h6>
                    <h6>{{ $dis->tanggal_pindah }}</h6>
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">RR</h5>
                @endforeach
                
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>

        </div>
    </section> --}}

    {{-- <div class="py-5 sm:py-5">
        @foreach ($displacements as $key => $dis )
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                
                                <input type="hidden" value="{{ $key + 1 }}">
                                    <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                                
                                <div class="p-5 w-72">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Perangkat : {{ $dis->device->device }}</h5>
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Type : {{ $dis->device->type }}</h5>
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Qlt : {{ $dis->jumlah_pindah }}</h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Dari {{ $dis->outletAwal->name }}</p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Ke {{ $dis->outletTujuan->name }}</p>
                                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Read more
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                        </svg>
                                    </a>
                                </div>

                            </div>
                    </div>
                    
                    @endforeach
                </div>
    </div> --}}
    <div class="flex flex-wrap -mx-4 mt-5"> 
        <div class="w-full px-4">
           <div class=" max-w-full overflow-x-auto content-center ">
              <div class="grid place-content-center">

                 <table class="table-auto m-10">
                    <thead>
                       <tr class="text-center bg-primary">
                          <th
                             class="w-auto min-w-[15px] border-l border-transparent py-4 px-3 text-lg font-medium text-black dark:text-white lg:py-7 lg:px-4"
                             >
                             NO
                          </th>
                          <th
                             class="w-auto min-w-[15px] border-l border-transparent py-4 px-3 text-lg font-medium text-black dark:text-white lg:py-7 lg:px-4"
                             >
                             Image
                          </th>
                          <th
                             class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-black dark:text-white lg:py-7 lg:px-4"
                             >
                             Device
                          </th>
                          <th
                             class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-black dark:text-white lg:py-7 lg:px-4"
                             >
                             Outlet Awal
                          </th>
                          <th
                             class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-black dark:text-white lg:py-7 lg:px-4"
                             >
                             Outlet Tujuan
                          </th>
                          <th
                             class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-black dark:text-white lg:py-7 lg:px-4"
                             >
                             Merek
                          </th>
                          <th
                             class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-black dark:text-white lg:py-7 lg:px-4"
                             >
                             Type
                          </th>
                          <th
                             class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-black dark:text-white lg:py-7 lg:px-4"
                             >
                             Serial Number
                          </th>
                          <th
                             class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-black dark:text-white lg:py-7 lg:px-4"
                             >
                             Qlt
                          </th>
                          <th
                             class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-black dark:text-white lg:py-7 lg:px-4"
                             >
                               Ketarangan
                          </th>
                          {{-- <th
                             class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                             >
                               Keterangan
                          </th> --}}
                          {{-- <th
                             class="w-auto min-w-[160px] border-r border-transparent py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                             >
                             Action
                          </th> --}}
                       </tr>
                    </thead>
                    <tbody>
                       
                 @forelse ($displacements as $key => $dis )
                 <input type="hidden" value="{{ $key + 1 }}">

                    <tr class="">
                     <td
                          class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                          >
                          {{ $dis->id }}
                          
                       </td>
                       <td
                          class="text-dark border-b border-l border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                          >
                          @if ($dis->device->image)
                             <img src="{{ asset('storage/' . $dis->device->image) }}" alt="Photo" width="80px" height="50px">
                          @else
                             <p>No image available</p>   
                          @endif
                       </td>
                       <td
                          class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                          >
                          {{ $dis->device->device }}
                          
                       </td>
                       <td
                          class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                          >
                          {{ $dis->outletAwal->name }}
                          
                       </td>
                       <td
                          class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                          >
                          {{ $dis->outletTujuan->name }}
                          
                       </td>
                       <td
                          class="text-dark border-b border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                          >
                          {{ $dis->device->merek }}
                          
                       </td>
                       <td
                          class="text-dark border-b border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                          >
                          {{ $dis->device->type }}
                       </td>
                       <td
                          class="text-dark border-b border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                          >
                          {{ $dis->device->serial_num }}
                       </td>
                       <td
                          class="text-dark border-b border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                          >
                          {{ $dis->jumlah_pindah }}
                       </td>
                       <td
                          class="text-dark border-b border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                          >
                          <strong>{{ $dis->description}}</strong>
                       </a>
                       </td>
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
      

</x-device-layout>