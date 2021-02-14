<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tech Challenge by Hossam Razaq</title>
    {{-- Tailwind Css  --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tailwind.min.css') }}" >
    {{--  font  --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div id="app" class="container mx-auto">
        <product-listing></product-listing>
    </div>
</body>
</html>
