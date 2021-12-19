<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
          
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class=" antialiased">
        <a href="/language/pl">Polska</a>
        <a href="/language/en">Anglia</a>
        <h1> {{ __('greetings') }}</h1>
        <h1>{{ config('app.locale') }}</h1>
        @if (config('app.locale') == 'pl')
            <h1>Polski w if else</h1>
        @else
            <h1>Englis in if else</h1>

        @endif
        @empty($url)
            <img src="{{ $url }}" alt="">

        @else
                        <img src="{{ $url }}" alt="">

        @endempty
       
     
    </html>
