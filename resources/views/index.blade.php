<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <link rel="stylesheet" href="{{'css/app.css'}}"/>
    </head>
    <body class="antialiased">
       <div id="root"></div>
       <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
