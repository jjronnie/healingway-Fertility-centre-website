<x-guest-layout>

{{-- nav --}}
@include('frontend.layouts.page-title')


<!-- Services Highlights -->
    <section id="services" class="py-20 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Heading -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold bg-clip-text text-transparent bg-hw-gradient mb-4">
                    Our Specialized Services
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Comprehensive fertility treatments with cutting-edge technology and personalized care plans.
                </p>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                @foreach ($services as $service)
                    <div
                        class="p-6 rounded-xl border border-green-400 bg-gradient-to-t from-white to-green-100 hover:border-hw-blue hover:-translate-y-2 hover:shadow-xl transition-all">

                        <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                            <i data-lucide="{{ $service->icon ?? 'info' }}" class="w-7 h-7 text-hw-blue"></i>
                        </div>

                        <h3 class="text-lg font-bold text-healingway-blue mb-3">{{ $service->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $service->desc }}</p>

                        <a href="{{ route('service.show', $service->slug) }}"
                            class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                            Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                        </a>
                    </div>
                @endforeach
            </div>

         

        </div>
    </section>

</x-guest-layout>