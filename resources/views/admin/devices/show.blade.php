<x-device-layout>
    {{-- <x-slot name="header">
      @foreach ($devices as $device )
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            
            List Device | {{ $device->outlet->name }}
      </h2>
         
    </x-slot> --}}

    <!-- ====== Table Section Start -->
<section class="dark:bg-dark py-10 lg:py-[50px]">
   
    <div class="container mx-auto">
      <div class="grid place-items-end">
         <a href="{{ route('admin.devices.create') }}">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Device</button>

         </a>
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
                              No
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
                                Keterangan
                           </th>
                           <th
                              class="w-auto min-w-[160px] border-r border-transparent py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                              >
                              Action
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr class="">
                           <td
                              class="text-dark border-b border-l border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                              >
                              {{ $device->id }}
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
                              <a
                              href="{{ route('admin.report.index') }}"
                              class="inline-block px-6 py-2.5  text-primary hover:bg-primary hover:text-cyan-600 font-medium"
                              >
                           Lihat details
                           </a>
                           </td>
                           <td
                              class="text-dark border-b border-r border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                              >
                              <a
                                 href="javascript:void(0)"
                                 class="inline-block px-2 py-2 bg-orange-300 border rounded-md border-primary text-primary hover:bg-primary hover:text-zinc-500 font-medium"
                                 >
                                 Edit
                              </a>
                              <a
                                 href="javascript:void(0)"
                                 class="inline-block px-2 py-2 bg-red-500 border rounded-md border-primary text-primary hover:bg-primary hover:text-zinc-500 font-medium"
                                 >
                                 Delete
                              </a>
                           </td>
                        </tr>
                     </tbody>
                  </table>

               </div>
             </div>
          </div>
       </div>
    </div>
</section>
{{-- @endforeach --}}

 <!-- ====== Table Section End -->
</x-device-layout>
