


<section class="relative banner-image py-24 mt-[80px] overflow-hidden" 
    style="background-image: url('assets/img/home_banner.png');">

    <!-- Blur/Dark Overlay -->
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-4 text-white">
                {{ Str::title(str_replace('-', ' ', Route::currentRouteName())) }}
            </h1>
        </div>
    </div>
</section>

