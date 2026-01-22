   @if (!app()->environment('local'))
       <div class="text-center">

           <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}" data-theme="light"
               data-size="normal" data-callback="onSuccess"></div>

           @error('cf-turnstile-response')
               <p class="text-red-600 text-sm">{{ $message }}</p>
           @enderror

       </div>
   @endif
