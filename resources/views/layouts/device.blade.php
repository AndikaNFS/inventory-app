<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- @vite('resources/css/app.css') --}}
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation-device')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
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
