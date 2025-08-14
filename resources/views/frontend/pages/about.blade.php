<x-guest-layout>

{{-- nav --}}
@include('frontend.layouts.page-title')



    <!-- Mission, Vision, Values -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Mission -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="target" class="w-10 h-10 text-blue-900"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-blue-900 mb-4">Our Mission</h3>
                    <p class="text-gray-600 leading-relaxed">
                        To provide world-class fertility care with compassion, innovation, and excellence, helping every family achieve their dream of parenthood through personalized treatment plans and cutting-edge medical technology.
                    </p>
                </div>
                
                <!-- Vision -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="eye" class="w-10 h-10 text-green-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-blue-900 mb-4">Our Vision</h3>
                    <p class="text-gray-600 leading-relaxed">
                        To be the leading fertility center globally, setting new standards in reproductive medicine, patient care, and medical research while maintaining the highest success rates and patient satisfaction.
                    </p>
                </div>
                
                <!-- Values -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="heart" class="w-10 h-10 text-purple-600"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-blue-900 mb-4">Our Values</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Compassion, integrity, excellence, and innovation guide everything we do. We believe in treating each patient with dignity, respect, and personalized attention throughout their fertility journey.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Story Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Content -->
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold text-blue-900 mb-6">Our Story</h2>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        Founded in 2008 by Dr. Sarah Johnson, HealingWay Hospital began as a small fertility clinic with a big dream: to help every couple achieve their dream of parenthood. What started with just three dedicated professionals has grown into a world-renowned fertility center.
                    </p>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        Over the past 15 years, we've helped more than 5,000 families welcome their precious babies. Our success is built on continuous innovation, ongoing research, and most importantly, our unwavering commitment to compassionate care.
                    </p>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Today, HealingWay Hospital stands as a beacon of hope for couples worldwide, offering the most advanced fertility treatments while maintaining the personal touch that makes all the difference in this deeply personal journey.
                    </p>
                    
                    <!-- Key Achievements -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center">
                                <i data-lucide="check" class="w-5 h-5 text-white"></i>
                            </div>
                            <span class="text-gray-700">15+ Years of Excellence</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center">
                                <i data-lucide="check" class="w-5 h-5 text-white"></i>
                            </div>
                            <span class="text-gray-700">5,000+ Happy Families</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center">
                                <i data-lucide="check" class="w-5 h-5 text-white"></i>
                            </div>
                            <span class="text-gray-700">85% Success Rate</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-green-400 rounded-full flex items-center justify-center">
                                <i data-lucide="check" class="w-5 h-5 text-white"></i>
                            </div>
                            <span class="text-gray-700">50+ Expert Specialists</span>
                        </div>
                    </div>
                </div>
                
                <!-- Statistics Cards -->
                <div class="space-y-6">
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <div class="text-4xl font-bold text-blue-900 mb-2">15+</div>
                        <div class="text-gray-600 text-lg">Years of Experience</div>
                        <p class="text-sm text-gray-500 mt-2">Leading fertility care since 2008</p>
                    </div>
                    
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <div class="text-4xl font-bold text-green-600 mb-2">5,000+</div>
                        <div class="text-gray-600 text-lg">Successful Pregnancies</div>
                        <p class="text-sm text-gray-500 mt-2">Helping families grow every day</p>
                    </div>
                    
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                        <div class="text-4xl font-bold text-purple-600 mb-2">85%</div>
                        <div class="text-gray-600 text-lg">Success Rate</div>
                        <p class="text-sm text-gray-500 mt-2">Industry-leading outcomes</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold text-blue-900 mb-6">Way to Parenthood</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        For over 5 years, HealingWay Fertility Centre has been at the forefront of reproductive science,
                        combining cutting-edge technology with compassionate, personalized care.
                    </p>
                    <div class="space-y-4 mb-8">
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 bg-green-400 rounded-full flex items-center justify-center">
                                <i data-lucide="check" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="text-gray-700">State-of-the-art laboratory facilities</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 bg-green-400 rounded-full flex items-center justify-center">
                                <i data-lucide="check" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="text-gray-700">Expert team of fertility specialists</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 bg-green-400 rounded-full flex items-center justify-center">
                                <i data-lucide="check" class="w-4 h-4 text-white"></i>
                            </div>
                            <span class="text-gray-700">Personalized treatment plans</span>
                        </div>
                    </div>
                    <a href="about.html"
                        class="bg-blue-900 text-white px-8 py-3 rounded-lg hover:bg-blue-800 transition-colors inline-flex items-center">
                        Learn About Us <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                    </a>
                </div>

                <!-- Mission Cards -->
                <div class="space-y-6">
                    <div class="bg-white p-6 border-gray-200 rounded-2xl shadow-lg hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="target" class="w-6 h-6 text-blue-900"></i>
                            </div>
                            <h3 class="text-xl font-bold text-blue-900">Our Mission</h3>
                        </div>
                        <p class="text-gray-600">To provide world-class fertility care with compassion, helping every
                            family achieve their dream of parenthood.</p>
                    </div>

                    <div class="bg-white p-6 border-gray-200 rounded-2xl shadow-lg hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="eye" class="w-6 h-6 text-green-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-blue-900">Our Vision</h3>
                        </div>
                        <p class="text-gray-600">To be the leading fertility center, setting new standards in
                            reproductive medicine and patient care.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>