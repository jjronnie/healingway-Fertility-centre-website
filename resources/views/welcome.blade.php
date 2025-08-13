@extends('frontend.layouts.main')
@section('content')
    



{{-- nav --}}
@include('frontend.layouts.nav')








    <!-- Hero Banner Section -->
  
@include('frontend.layouts.banner')








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

                <!-- IVF -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="baby" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">IVF Treatment</h3>
                    <p class="text-gray-600 mb-4">Advanced in-vitro fertilization with the highest success rates.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

                <!-- IUI -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="heart" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">IUI</h3>
                    <p class="text-gray-600 mb-4">Intrauterine insemination for assisted conception.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

                <!-- ICSI -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="activity" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">ICSI</h3>
                    <p class="text-gray-600 mb-4">Intracytoplasmic sperm injection for male infertility cases.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

                <!-- Ovulation Induction -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="sunrise" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">Ovulation Induction</h3>
                    <p class="text-gray-600 mb-4">Stimulating ovulation to enhance conception chances.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

                <!-- Fertility Preservation -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="snowflake" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">Fertility Preservation</h3>
                    <p class="text-gray-600 mb-4">Egg & sperm freezing for future family planning.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

                <!-- Surrogacy -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="users" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">Surrogacy Programmes</h3>
                    <p class="text-gray-600 mb-4">Comprehensive legal and medical surrogacy support.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

                <!-- Donor Programs -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="gift" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">Donor Programs</h3>
                    <p class="text-gray-600 mb-4">Egg, sperm, and embryo donor options for various needs.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

                <!-- Hormonal Treatments -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="droplet" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">Hormonal Treatments</h3>
                    <p class="text-gray-600 mb-4">Balancing hormones to support fertility and pregnancy.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

                <!-- Laparoscopy -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="scissors" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">Laparoscopy</h3>
                    <p class="text-gray-600 mb-4">Minimally invasive surgery for fertility conditions.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

                <!-- Hysteroscopy -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="eye" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">Hysteroscopy</h3>
                    <p class="text-gray-600 mb-4">Diagnosis and treatment of uterine issues.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

                <!-- Male & Female Testing -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="search" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">Fertility Testing</h3>
                    <p class="text-gray-600 mb-4">Male & female testing for complete fertility analysis.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

                <!-- Pre-implantation Testing -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="dna" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">Pre-implantation Genetic Testing</h3>
                    <p class="text-gray-600 mb-4">Screening embryos for genetic conditions.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

                <!-- Sex Selection -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="venus" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">Sex Selection</h3>
                    <p class="text-gray-600 mb-4">Family balancing through advanced embryo screening.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

                <!-- Inherited Diseases -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="alert-octagon" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">Inherited Diseases</h3>
                    <p class="text-gray-600 mb-4">Preventing transmission of genetic disorders.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

                <!-- Aneuploidy -->
                <div
                    class="p-6 rounded-xl border border-gray-200 bg-white hover:border-green-400 hover:-translate-y-2 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-healingway-blue rounded-lg flex items-center justify-center mb-5">
                        <i data-lucide="alert-triangle" class="w-7 h-7 text-hw-blue"></i>
                    </div>
                    <h3 class="text-lg font-bold text-healingway-blue mb-3">Aneuploidy Screening</h3>
                    <p class="text-gray-600 mb-4">Detecting chromosomal abnormalities in embryos.</p>
                    <a href="services.html"
                        class="text-green-500 font-semibold hover:text-green-600 transition-colors">
                        Learn More <i data-lucide="arrow-right" class="w-4 h-4 inline ml-1"></i>
                    </a>
                </div>

            </div>

            <!-- View All Button -->
            <div class="text-center mt-12">
                <a href="services.html"
                    class="inline-block bg-healingway-green text-healingway-blue px-8 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl hover:bg-lime-400 transition-all duration-300">
                    View All Services
                </a>
            </div>

        </div>
    </section>


    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold text-blue-900 mb-6">Healing Way to Parenthood</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        For over 15 years, HealingWay Hospital has been at the forefront of reproductive medicine,
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
                    <div class="bg-white p-6 rounded-2xl shadow-lg">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="target" class="w-6 h-6 text-blue-900"></i>
                            </div>
                            <h3 class="text-xl font-bold text-blue-900">Our Mission</h3>
                        </div>
                        <p class="text-gray-600">To provide world-class fertility care with compassion, helping every
                            family achieve their dream of parenthood.</p>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg">
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

    <!-- Team Preview -->
    <section id="team" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-blue-900 mb-4">Meet Our Expert Team</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Board-certified fertility specialists dedicated to
                    your success.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Doctor 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                    <div class="w-24 h-24 bg-blue-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i data-lucide="user-check" class="w-12 h-12 text-blue-900"></i>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Dr. Sarah Johnson</h3>
                        <p class="text-green-600 font-medium mb-3">Lead Fertility Specialist</p>
                        <p class="text-gray-600 text-sm mb-4">15+ years in reproductive endocrinology with expertise in
                            complex IVF cases.</p>
                        <div class="flex justify-center space-x-2">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">IVF Expert</span>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Research</span>
                        </div>
                    </div>
                </div>

                <!-- Doctor 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                    <div class="w-24 h-24 bg-green-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i data-lucide="user-check" class="w-12 h-12 text-green-600"></i>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Dr. Michael Chen</h3>
                        <p class="text-green-600 font-medium mb-3">Reproductive Endocrinologist</p>
                        <p class="text-gray-600 text-sm mb-4">Specializes in male fertility and advanced reproductive
                            techniques.</p>
                        <div class="flex justify-center space-x-2">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Male
                                Fertility</span>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Surgery</span>
                        </div>
                    </div>
                </div>

                <!-- Doctor 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                    <div class="w-24 h-24 bg-purple-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <i data-lucide="user-check" class="w-12 h-12 text-purple-600"></i>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Dr. Emily Rodriguez</h3>
                        <p class="text-green-600 font-medium mb-3">Genetic Counselor</p>
                        <p class="text-gray-600 text-sm mb-4">Expert in genetic screening and personalized treatment
                            plans.</p>
                        <div class="flex justify-center space-x-2">
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Genetics</span>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Counseling</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="team.html"
                    class="bg-blue-900 text-white px-8 py-3 rounded-lg hover:bg-blue-800 transition-colors inline-flex items-center">
                    Meet All Our Doctors <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-blue-900 mb-4">Get in Touch</h2>
                <p class="text-xl text-gray-600">Ready to start your journey? Contact us today.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <h3 class="text-2xl font-bold text-blue-900 mb-6">Send us a Message</h3>
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">First Name</label>
                                <input type="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Last Name</label>
                                <input type="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
                            <textarea rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full accent-gradient text-blue-900 font-semibold py-3 rounded-lg hover:shadow-lg transition-all">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <div class="bg-white p-6 rounded-2xl shadow-lg">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="map-pin" class="w-6 h-6 text-blue-900"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Address</h4>
                                <p class="text-gray-600">123 Medical Center Drive<br>Healthcare City, HC 12345</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="phone" class="w-6 h-6 text-green-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Phone</h4>
                                <p class="text-gray-600">(555) 123-4567</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="mail" class="w-6 h-6 text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Email</h4>
                                <p class="text-gray-600">info@healingway.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-lg">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                                <i data-lucide="clock" class="w-6 h-6 text-orange-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-blue-900">Hours</h4>
                                <p class="text-gray-600">Mon-Fri: 8AM-6PM<br>Sat: 9AM-4PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->

@include('frontend.layouts.footer')

 

    <!-- Appointment Booking Modal -->
    <dialog x-ref="appointmentModal" class="backdrop:bg-black backdrop:bg-opacity-50 bg-transparent">
        <div class="bg-white rounded-2xl p-8 max-w-2xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-blue-900">Book Appointment</h3>
                <button @click="$refs.appointmentModal.close()" class="text-gray-500 hover:text-gray-700">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>

            <form class="space-y-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">First Name</label>
                        <input type="text"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Last Name</label>
                        <input type="text"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                        <input type="tel"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Preferred Date</label>
                        <input type="date"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Preferred Time</label>
                        <select
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400">
                            <option>9:00 AM</option>
                            <option>10:00 AM</option>
                            <option>11:00 AM</option>
                            <option>2:00 PM</option>
                            <option>3:00 PM</option>
                            <option>4:00 PM</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Service</label>
                    <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400">
                        <option>Initial Consultation</option>
                        <option>IVF Treatment</option>
                        <option>Fertility Assessment</option>
                        <option>Genetic Counseling</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Additional Notes</label>
                    <textarea rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:border-green-400"></textarea>
                </div>

                <div class="flex space-x-4">
                    <button type="submit"
                        class="flex-1 accent-gradient text-blue-900 font-semibold py-3 rounded-lg hover:shadow-lg transition-all">
                        Book Appointment
                    </button>
                    <button type="button" @click="$refs.appointmentModal.close()"
                        class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </dialog>

    @endsection