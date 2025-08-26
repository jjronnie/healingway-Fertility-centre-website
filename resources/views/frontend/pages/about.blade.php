<x-guest-layout>

{{-- nav --}}
@include('frontend.layouts.page-title')




    <!-- Story Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Content -->
                <div>
      <h2 class="text-4xl md:text-4xl font-bold text-blue-900 mb-6">About HealingWay Fertility Centre</h2>
<p class="text-lg text-gray-600 mb-6 leading-relaxed">
    HealingWay Fertility Centre was established with one clear mission: to bring hope and solutions to individuals and couples facing challenges in starting a family. From the very beginning, our focus has been on combining medical expertise with compassionate care.
</p>
<p class="text-lg text-gray-600 mb-6 leading-relaxed">
    Over the years, we have supported thousands of families on their journey to parenthood. Our team of experienced specialists provides a wide range of advanced fertility treatments, supported by modern technology and continuous research in reproductive medicine.
</p>
<p class="text-lg text-gray-600 mb-8 leading-relaxed">
    Today, HealingWay Fertility Centre is recognized as a trusted destination for fertility care. We pride ourselves on offering personalized treatment plans, emotional support, and a welcoming environment that ensures every patient feels valued and understood throughout their journey.
</p>

                    
                 <!-- Why Choose Us -->
<div class="grid md:grid-cols-2 gap-6">
    <div class="flex items-center space-x-3">
        <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center">
            <i data-lucide="check" class="w-5 h-5 text-white"></i>
        </div>
        <span class="text-gray-700">Personalized Treatment Plans</span>
    </div>
    <div class="flex items-center space-x-3">
        <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center">
            <i data-lucide="check" class="w-5 h-5 text-white"></i>
        </div>
        <span class="text-gray-700">Compassionate  Care</span>
    </div>
    <div class="flex items-center space-x-3">
        <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center">
            <i data-lucide="check" class="w-5 h-5 text-white"></i>
        </div>
        <span class="text-gray-700">Advanced Fertility Technology</span>
    </div>
    <div class="flex items-center space-x-3">
        <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center">
            <i data-lucide="check" class="w-5 h-5 text-white"></i>
        </div>
        <span class="text-gray-700">Experienced  Specialists</span>
    </div>
</div>

                </div>
                
                <!-- Statistics Cards -->
                <div class="space-y-6">
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <div class="text-4xl font-bold text-blue-900 mb-2">5+</div>
                        <div class="text-gray-600 text-lg">Years in Service</div>
                        <p class="text-sm text-gray-500 mt-2">Leading fertility care in East Africa</p>
                    </div>
                    
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <div class="text-4xl font-bold text-green-600 mb-2">100+</div>
                        <div class="text-gray-600 text-lg">Successful Pregnancies</div>
                        <p class="text-sm text-gray-500 mt-2">Helping families grow every day</p>
                    </div>
                    
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <div class="text-4xl font-bold text-purple-600 mb-2">85%</div>
                        <div class="text-gray-600 text-lg">Proven Success Rate</div>
                        <p class="text-sm text-gray-500 mt-2">Industry-leading outcomes</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- Mission, Vision, Values -->
    <section class="py-20 bg-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Mission -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="target" class="w-10 h-10 text-blue-900"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-blue-900 mb-4">Our Mission</h3>
                    <p class="text-gray-600 leading-relaxed">
                       To provide world-class fertility care with compassion, helping every family achieve their dream of parenthood.      </p>
                </div>
                
                <!-- Vision -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="lightbulb" class="w-10 h-10 text-green-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-blue-900 mb-4">Our Vision</h3>
                    <p class="text-gray-600 leading-relaxed">
                     To be the leading fertility center, setting new standards in reproductive medicine and patient care.                 </p>
                </div>
                
                <!-- Values -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="heart" class="w-10 h-10 text-purple-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-blue-900 mb-4">Our Values</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Compassion, integrity, excellence, and innovation.
                    </p>
                </div>
            </div>
        </div>
    </section>

     <div class="text-center mt-12">
                <a href="{{ route('our-services') }}"
                    class="bg-hw-blue text-white px-8 py-3 rounded-lg font-medium hover:bg-green-700 transition-colors inline-flex items-center">
                    Explore Our Services
                </a>
            </div>


</x-guest-layout>