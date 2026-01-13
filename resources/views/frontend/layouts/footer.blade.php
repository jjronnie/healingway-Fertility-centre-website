      
   <x-back-to-top/>   
      <div class="relative mt-32">
         

           <footer class="bg-hw-blue text-white pt-72 relative z-10">
              <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                      <!-- Hospital Info -->
                      <div>
                          <!-- Logo -->
                          <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                              <div
                                  class="w-12 h-12 flex items-center justify-center overflow-hidden   transition-all duration-300">
                                  <img src="{{ asset('assets/img/logo.png') }}" alt="HealingWay Logo"
                                      class="w-full h-full object-contain">
                              </div>

                              <div>
                                  <div class="text-2xl mb-0 font-bold transition-colors text-white ">
                                      <span class="text-hw-green">Healing</span>Way
                                  </div>
                                  <div class="text-1xl mt-0 font-bold transition-colors text-hw-green">
                                      Fertility Centre
                                  </div>
                              </div>
                          </a>
                          <p class=" mb-6">Leading the way in reproductive medicine with compassionate care and
                              cutting-edge
                              technology.</p>
                          <div class="flex space-x-4">
                              <a href="#"
                                  class="w-10 h-10 bg-blue-800 rounded-lg flex items-center justify-center hover:bg-blue-700 transition-colors">
                                  <i data-lucide="facebook" class="w-5 h-5"></i>
                              </a>
                              <a href="#"
                                  class="w-10 h-10 bg-blue-800 rounded-lg flex items-center justify-center hover:bg-blue-700 transition-colors">
                                  <i data-lucide="twitter" class="w-5 h-5"></i>
                              </a>
                              <a href="#"
                                  class="w-10 h-10 bg-blue-800 rounded-lg flex items-center justify-center hover:bg-blue-700 transition-colors">
                                  <i data-lucide="instagram" class="w-5 h-5"></i>
                              </a>
                          </div>
                      </div>

                      <!-- Quick Links -->
                      <div>
                          <h4 class="text-lg font-bold mb-6">Quick Links</h4>
                          <div class="space-y-3">
                              <a href="about.html" class="block  hover:text-white transition-colors">About Us</a>
                              <a href="services.html" class="block  hover:text-white transition-colors">Our Services</a>
                              <a href="team.html" class="block  hover:text-white transition-colors">Our Team</a>
                              <a href="contact.html" class="block  hover:text-white transition-colors">Contact Us</a>
                          </div>
                      </div>

                      @php
                          $services = \App\Models\Service::latest()->take(6)->get();
                      @endphp




                      <!-- Services -->
                      <div>
                          <h4 class="text-lg font-bold mb-6">Services</h4>
                          <div class="space-y-2">
                              @foreach ($services as $service)
                                  <a href="{{ url('services/' . $service->slug) }}"
                                      class="flex items-center gap-2 group text-white  transition-all">
                                      <i data-lucide="chevron-right"
                                          class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"></i>
                                      <span>{{ $service->name }}</span>
                                  </a>
                              @endforeach

                              <a href="{{ url('/services') }}"
                                  class="flex items-center gap-2 group font-semibold text-white  transition-all">
                                  <i data-lucide="arrow-right"
                                      class="w-4 h-4 transform group-hover:rotate-90 transition-transform"></i>
                                  <span>View All</span>
                              </a>
                          </div>
                      </div>


                      <!-- Contact Info -->
                      <div>
                          <h4 class="text-lg font-bold mb-6">Get In Touch</h4>
                          <div class="space-y-4">
                              <div class="flex items-center space-x-3">
                                  <i data-lucide="map-pin" class="w-5 h-5 text-hw-green"></i>
                                  <span class="">Find Us at Plot 6A2-7B2 Luthuli 5th Close,<br>Bugolobi, Kampala
                                      Uganda</span>
                              </div>
                              <div class="flex items-center space-x-3">
                                  <i data-lucide="phone" class="w-5 h-5 text-hw-green"></i>
                                  <span class="">+256 700 521 155</span>
                              </div>
                              <div class="flex items-center space-x-3">
                                  <i data-lucide="mail" class="w-5 h-5 text-hw-green"></i>
                                  <span class="">info.ivf@healingwayafrica.com</span>
                              </div>
                          </div>

                          <div class="flex space-x-4 mt-6">
                              <a href="#"
                                  class="w-10 h-10 bg-blue-800 rounded-lg flex items-center justify-center hover:bg-blue-700 transition-colors">
                                  <i data-lucide="facebook" class="w-5 h-5"></i>
                              </a>
                              <a href="#"
                                  class="w-10 h-10 bg-blue-800 rounded-lg flex items-center justify-center hover:bg-blue-700 transition-colors">
                                  <i data-lucide="twitter" class="w-5 h-5"></i>
                              </a>
                              <a href="#"
                                  class="w-10 h-10 bg-blue-800 rounded-lg flex items-center justify-center hover:bg-blue-700 transition-colors">
                                  <i data-lucide="instagram" class="w-5 h-5"></i>
                              </a>
                          </div>
                      </div>


                  </div>

                  <div class="border-t border-gray-500 mt-12 pt-8 text-center">
                      <p>Copyright &copy; {{ date('Y') }} HealingWay Fertility Center | All rights reserved.</p>
                  </div>

              </div>
          </footer>


           <!-- CTA Section -->
           <section
        class="absolute -top-24 left-1/2 transform -translate-x-1/2 z-20 w-full max-w-7xl px-4 sm:px-6 lg:px-8">
        <div
            class="bg-gradient-to-r from-hw-green to-green-400 shadow-lg rounded-2xl py-16 px-6 text-center">
            <h2 class="text-2xl md:text-2xl font-bold text-hw-blue mb-6">
                Ready to Start Your Family Journey?
            </h2>
            <p class="text-lg text-hw-blue mb-8 max-w-2xl mx-auto">
                Our fertility specialists are here to guide you every step of the way.
                Schedule your consultation today and take the first step towards parenthood.
            </p>
            <a href="{{ route('book-appointment') }}"
                class="bg-hw-blue hover:bg-blue-800 text-white px-8 py-3 text-lg rounded-lg font-semibold transition-all hover-lift">
                Schedule An Appointment
            </a>
        </div>
    </section>
      </div>
