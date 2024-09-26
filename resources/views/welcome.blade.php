<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ env("app_name") }}</title>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
        />
    </head>

    <body class="welcome main main-bg">
        <div class="branding-container">@include('components.branding')</div>

        <div class="container">
            <a class="button" href=""> SIGN In </a>
            <br />
            <a class="button" href=""> Sign Up </a>
        </div>
    </body>
</html>
