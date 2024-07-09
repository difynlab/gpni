<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} | @yield('title')</title>
        <link rel="icon" href="{{ asset('storage/favicon.png') }}">
        
        @stack('before-styles')
            <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}"></link>
            <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}"></link>
        @stack('after-styles')

    </head>

    <body>
        <div id="app">
            <div class="wrapper">
                <div class="content">
                    @yield('content')
                </div>
            </div>

            @stack('before-scripts')
                <script src="{{ asset('frontend/js/jquery.js') }}"></script>
                <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
            @stack('after-scripts')
        </div>
    </body>

</html>