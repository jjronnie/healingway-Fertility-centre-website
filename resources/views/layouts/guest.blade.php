@extends('frontend.layouts.main')


@section('content')
    {{-- nav --}}
    @include('frontend.layouts.nav')


    <main class="mb-5">
        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('frontend.layouts.footer')
@endsection
