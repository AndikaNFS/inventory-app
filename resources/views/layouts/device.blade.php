<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>@yield('title', config('app.name', 'Web Inventory'))</title>


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- @vite('resources/css/app.css') --}}

        <style>
            .date-container {
                position: relative;
                display: inline-block;
                width: 100%;
            }

            .date-container input[type="date"] {
                padding-left: 40px; /* Beri jarak untuk ikon */
                color: white;
                width: 100%;
            }

            .date-container::before {
                content: "📅"; /* Atau gunakan FontAwesome */
                position: absolute;
                left: 10px;
                top: 50%;
                transform: translateY(-50%);
                color: white; /* Warna ikon */
                font-size: 16px;
                pointer-events: none; /* Supaya tidak mengganggu klik */
            }

            /* Untuk tombol kalender bawaan browser */
            .date-container input[type="date"]::-webkit-calendar-picker-indicator {
                position: absolute;
                right: 10px; /* Pindahkan ke dalam container */
                cursor: pointer;
                opacity: 1;
                filter: invert(1); /* Ubah warna jadi putih jika perlu */
            }
                    </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-800 dark:bg-gray-900">
            @include('layouts.navigation-device')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-gray-600 dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <script>
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
    </script>
</html>
