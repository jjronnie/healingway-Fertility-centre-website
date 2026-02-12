<x-guest-layout>

    <x-page-header image="assets/img/3.webp" title="Our Services "
        description=" At HealingWay Fertility Centre, we provide comprehensive fertility treatments with cutting-edge technology and personalized care
                    plans tailored to meet your needs." />



    <!-- Services Highlights -->
    <section class="-mt-32 pb-20 relative z-10">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8  p-8 ">

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">



                @foreach ($services as $service)
                    <a href="{{ route('service.show', $service->slug) }}">

                        <div
                            class="bg-white border border-hw-green hover:bg-gradient-to-t from-white to-green-100 hover:border-hw-blue  hover:-translate-y-2 hover:shadow-xl transition-all rounded-3xl shadow-lg overflow-hidden ">

                            <!-- Top content -->
                            <div class="p-6">

                                <!-- Icon -->
                                <div
                                    class="w-12 h-12 bg-hw-blue  rounded-lg bg-primary-100 flex items-center justify-center mb-4">

                                    <i data-lucide="{{ $service->icon ?? 'info' }}" class="w-7 h-7 text-white "></i>
                                </div>

                                <!-- Heading -->
                                <h3 class="text-2xl font-bold text-gray-900 mb-3 leading-tight">
                                    {{ $service->name }}
                                </h3>

                                <!-- Description -->
                                <p class="text-gray-600 leading-relaxed">
                                    {{ $service->desc }}
                                </p>
                            </div>

                            <!-- Image -->
                            <div class="px-6 pb-6">
                                @php
                                    $serviceImage = $service->getFirstMediaUrl('photo', 'webp')
                                        ?: ($service->photo ? asset('storage/' . $service->photo) : asset('assets/img/1.webp'));
                                @endphp
                                <img src="{{ $serviceImage }}" alt="{{ $service->name }}"
                                    class="w-full h-56 object-cover rounded-2xl" loading="lazy">


                            </div>

                        </div>
                    </a>
                @endforeach




            </div>



        </div>
    </section>

</x-guest-layout>
