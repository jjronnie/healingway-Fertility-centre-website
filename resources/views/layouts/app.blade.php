@extends('backend.layouts.main')
@section('content')
    

    <!-- Sidebar -->
    @include('backend.layouts.sidebar')
 

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Header -->

        @include('backend.layouts.nav')
      

        <!-- Dashboard Content -->
        <main class="p-6">
            {{ $slot }}
           
        </main>
    </div>


    @endsection



