<x-device-layout>
    <div class="mt-5 flex justify-center items-center place-content-center">
        <form action="{{ route('admin.outlets.store')}}" enctype="multipart/form-data" method="POST" class="w-3/4  border border-gray-500 rounded-lg dark:bg-white ">
            @csrf
            <div class="mt-5 flex justify-center">
        
                {{-- @foreach ($devices as $device ) --}}
                <h2 class="font-semibold text-3xl items-center text-gray-800 dark:text-black leading-tight">
                    Form Tambah Outlet
                    {{-- {{ $outlet->name }} --}}
                </h2>
                    
                {{-- @endforeach --}}
        
            </div>
            <div class="m-10">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Nama Outlet</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
                    </div>
                    <div>
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-100 dark:text-black">Location</label>
                        <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                    </div>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>

    </div>


</x-device-layout>
