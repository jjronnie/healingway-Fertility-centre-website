<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {!! seo() !!}


    <meta name="geo.region" content="UG-C">
    <meta name="geo.placename" content="Kampala">
    <meta name="location" content="Plot 6A2-7B2 Luthuli 5th Close, Bugolobi, Kampala, Uganda">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon.png') }}" type="image/png">

    <!-- Google Fonts -->




    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap"
        rel="stylesheet">

    @guest
        <link rel="preconnect" href="https://challenges.cloudflare.com">
        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    @endguest


    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])



</head>

<body class=" text-gray-900 bg-gray-100">




    @yield('content')



    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
