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

        <link rel="icon" href="{{ asset('assets/images/fiveicon.jpg') }}" type="image/png">
        <link href="{{asset('build/assets/app-CtpER2l3.css')}}" rel="stylesheet" />
        <script src="{{asset('build/assets/app-C1-XIpUa.js')}}"></script>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

        <!-- Styles -->
        @livewireStyles

        <style>
            .hidd-left {
              display: none;
            }

            @media (min-width: 1024px) {
              /* Tailwind's lg breakpoint */
              .hidd-left {
                display: flex;
              }
            }
          </style>

    </head>
    <body>
        <div class="font-sans antialiased text-gray-900">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
