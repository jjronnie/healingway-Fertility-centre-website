@extends('frontend.layouts.main')
@section('content')  

   
<main class="mb-5">
{{ $slot }}
</main>

    <!-- Footer -->
@include('frontend.layouts.footer')

     @endsection