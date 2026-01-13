<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if (isset($seoData))
        {!! seo($seoData) !!}
    @elseif(isset($service))
        {!! seo()->for($service) !!}
    @elseif(isset($staff))
        {!! seo()->for($staff) !!}
    @else
        {!! seo() !!}
    @endif

    <meta name="geo.region" content="UG-C">
    <meta name="geo.placename" content="Kampala">
    <meta name="location" content="Plot 6A2-7B2 Luthuli 5th Close, Bugolobi, Kampala, Uganda">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.png') }}">

    <!-- Google Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
   

         <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])



</head>

<body class="font-sans text-gray-900 bg-gray-50">


    <!-- Preloader -->
    <div x-data="{ loading: true }" x-init="window.addEventListener('load', () => loading = false)" x-show="loading"
        x-transition:leave="transition ease-in-out duration-700" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 flex flex-col items-center justify-center bg-gradient-to-r from-hw-blue to-hw-green z-[9999]">
        <!-- Spinner with Logo -->
        <div class="relative w-24 h-24 mb-4">
            <!-- Outer spinning ring -->
            <div class="absolute inset-0 border-4 border-hw-green border-t-transparent rounded-full animate-spin"></div>
            <!-- Inner slow spinning ring -->
            <div class="absolute inset-2 border-4 border-white border-t-transparent rounded-full animate-spin-slow">
            </div>
            <!-- Logo in center -->
            <div class="absolute inset-0 flex items-center justify-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-10 h-10 object-contain">
            </div>
        </div>

        <!-- Loading Text -->
        <div class="text-white text-lg font-semibold animate-pulse-scale">
            Loading...
        </div>
    </div>




    @yield('content')



    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
