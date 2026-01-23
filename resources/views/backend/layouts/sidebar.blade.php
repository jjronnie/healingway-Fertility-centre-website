   @if (auth()->check() && auth()->user()->hasRole('admin'))
       @include('backend.layouts.partials.sidebar.admin')
   @elseif(auth()->check() && auth()->user()->hasRole('user'))
       @include('backend.layouts.partials.sidebar.users')
   @endif
