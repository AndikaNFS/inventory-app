<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Outlet') }}
        </h2>
    </x-slot>

    <!-- ====== Table Section Start -->
<section class="dark:bg-dark py-10 lg:py-[50px]">
    <div class="container mx-auto">
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
                              ID
                           </th>
                           <th
                              class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                              >
                              Name
                           </th>
                           <th
                           class="w-auto min-w-[160px] py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                              >
                              Location
                           </th>
                           <th
                           class="w-auto min-w-[160px] border-r border-transparent py-4 px-3 text-lg font-medium text-white lg:py-7 lg:px-4"
                              >
                              Register
                           </th>
                        </tr>
                     </thead>
                     @foreach ($outlets as $outlet )
                     <tbody>
                        <tr class="">
                           <td
                              class="text-dark border-b border-l border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                              >
                              {{ $outlet->id }}
                              
                           </td>
                           <td
                              class="text-dark border-b border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                              >
                              {{ $outlet->name }}
                           </td>
                           <td
                              class="text-dark border-b border-[#E8E8E8] bg-white dark:bg-dark-3 dark:border-dark dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                              >
                              {{ $outlet->location }}
                           </td>
                           <td
                              class="text-dark border-b border-r border-[#E8E8E8] bg-white dark:border-dark dark:bg-dark-2 dark:text-dark-7 py-5 px-2 text-center text-base font-medium"
                              >
                              <a
                                 href="{{ route('admin.devices.index', $outlet->id) }}"
                                 class="inline-block px-6 py-2.5  text-primary hover:bg-primary hover:text-cyan-600 font-medium"
                                 >
                              Lihat details
                              </a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                     

               </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- ====== Table Section End -->
</x-app-layout>
