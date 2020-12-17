<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Game App</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}

        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito';
            }
            .poster::after{
                content: "";
                background-color: rgba(0,0,0,0.2);
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1;
            }
            .poster:hover.poster::after{
                z-index: 2;
            }

        </style>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body class="bg-dark-purple d-flex flex-column">
        <x-header></x-header>
        
        @yield('content')

        <div class="border-bottom border-secondary"></div>

        <x-footer></x-footeer>


        <script src="/js/app.js"></script>
        {{-- <script src="https://unpkg.com/@popperjs/core@2"></script> --}}
    </body>
</html>
