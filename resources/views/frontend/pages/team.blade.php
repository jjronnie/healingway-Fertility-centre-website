<x-guest-layout>

    <x-page-header image="assets/img/3.webp" title="Meet Our Expert Team"
        description=" Our experienced and compassionate medical professionals are committed to providing the highest quality
                care. Get to know the experts who will be looking after you." />

    <section class="-mt-32 pb-20 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">

            <div class="relative overflow-hidden  h-[500px] lg:h-[600px]">
                <img src="{{ asset('assets/img/drs.webp') }}" alt="Fertility Care Team"
                    class="w-full h-full rounded-3xl object-cover">
            </div>

        </div>
    </section>



    <section class="-mt-32 pb-20 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">

            <!-- staff Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

                @foreach ($staff as $person)
                    <!-- staff Card 1 -->
                    <a href="{{ route('staff.show', $person->slug) }}">


                        <div
                            class="bg-white p-2 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="aspect-[4/5] overflow-hidden ">

                                @php
                                    $staffImage = $person->getFirstMediaUrl('photo', 'webp')
                                        ?: ($person->photo ? asset('storage/' . $person->photo) : 'https://placehold.co/400x320/CCCCCC/FFFFFF?text=No+Photo');
                                @endphp
                                <img src="{{ $staffImage }}" alt="{{ $person->name ?? 'No Photo' }}"
                                    class="w-full h-full rounded-2xl object-cover hover:scale-105 transition-transform duration-300">
                              
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">
                                    {{ $person->name }}
                                </h3>
                                <p class="text-base text-gray-600">
                                    {{ $person->position ?? 'Position not specified' }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach



            </div>


        </div>
    </section>





</x-guest-layout>
