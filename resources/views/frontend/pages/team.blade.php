<x-guest-layout>

    {{-- nav --}}
    @include('frontend.layouts.page-title')


    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Heading -->
            <h2 class="text-4xl font-extrabold text-center text-gray-800 mb-10">Meet Our Dedicated Team of Doctors</h2>
            <p class="text-lg text-center text-gray-600 mb-12 max-w-2xl mx-auto">
                Our experienced and compassionate medical professionals are committed to providing the highest quality
                care. Get to know the experts who will be looking after you.
            </p>

            <!-- Doctor Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Doctor Card 1 -->
                <div
                    class="flex flex-col bg-gradient-to-r from-hw-blue to-hw-green shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300 ease-in-out h-full">
                    <div class="relative w-full h-60 overflow-hidden ">
                        <img src="https://healingwayafrica.com/uploads/staff/1752778901_dale.jpg" alt="DR. DALE MUGISHA"
                            class="object-cover w-full h-full">
                    </div>
                    <div class="p-6 flex flex-col justify-between flex-grow">
                        <div>
                            <h3 class="text-xl font-bold text-center text-white mb-1">DR. DALE MUGISHA</h3>
                            <p class="text-md text-white text-center mb-4">Head Fertility</p>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>





</x-guest-layout>
