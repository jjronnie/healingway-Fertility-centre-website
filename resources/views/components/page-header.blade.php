@props([
    'image' => 'assets/img/3.webp',
    'title' => Str::title(str_replace('-', ' ', Route::currentRouteName())),
    'description' => null,
])

<section
    class="relative rounded-b-3xl banner-image py-40 mt-0 overflow-hidden"
    style="background-image: url('{{ asset($image) }}');"
>
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50 "></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white">
            <h1 class="text-3xl md:text-5xl font-bold mb-4">
                {{ $title }}
            </h1>

            <p class="max-w-3xl mx-auto text-base md:text-lg text-white/90">
                {{ $description ?? 'Providing trusted, professional services with care and excellence.' }}
            </p>
        </div>
    </div>
</section>
