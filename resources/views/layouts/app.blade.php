<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:livewire="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/style.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        @isset($css)
            <!-- Styles de Vistas-->
            {{$css}}
            <!-- Fin de Styles de Vistas-->
        @endisset
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <livewire:navigation-dropdown/>


            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        @isset($js)
            <!-- Script de Vistas-->
            {{$js}}
            <!-- Fin de Script de Vistas-->
        @endisset
        @isset($atribucion)
            <div class="hidden">
                <!-- Atribuciones de Imagenes y recursos gratuitos-->
                {{$atribucion}}
                <!-- Fin de Atribuciones de Imagenes y recursos gratuitos-->
            </div>
        @endisset
    </body>
</html>
