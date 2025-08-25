   <footer class="bg-hw-gradient text-white py-16">
       <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
           <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
               <!-- Hospital Info -->
               <div>
                   <!-- Logo -->
                   <a href="index.html" class="flex items-center space-x-3 group">
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
                   <p class=" mb-6">Leading the way in reproductive medicine with compassionate care and cutting-edge
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
    $services = \App\Models\Service::latest()->take(8)->get();
@endphp




              <!-- Services -->
<div>
    <h4 class="text-lg font-bold mb-6">Services</h4>
    <div class="space-y-2">
        @foreach ($services as $service)
            <a href="{{ url('services/' . $service->slug) }}"
               class="flex items-center gap-2 group text-white  transition-all">
                <i data-lucide="chevron-right" class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"></i>
                <span>{{ $service->name }}</span>
            </a>
        @endforeach

        <a href="{{ url('/services') }}"
           class="flex items-center gap-2 group font-semibold text-white  transition-all">
            <i data-lucide="arrow-right" class="w-4 h-4 transform group-hover:rotate-90 transition-transform"></i>
            <span>View All</span>
        </a>
    </div>
</div>


               <!-- Contact Info -->
               <div>
                   <h4 class="text-lg font-bold mb-6">Get In Touch</h4>
                   <div class="space-y-4">
                       <div class="flex items-center space-x-3">
                           <i data-lucide="map-pin" class="w-5 h-5 text-green-400"></i>
                           <span class="">Find Us at Plot 6A2-7B2 Luthuli 5th Close,<br>Bugolobi, Kampala
                               Uganda</span>
                       </div>
                       <div class="flex items-center space-x-3">
                           <i data-lucide="phone" class="w-5 h-5 text-green-400"></i>
                           <span class="">+256 700 521 155</span>
                       </div>
                       <div class="flex items-center space-x-3">
                           <i data-lucide="mail" class="w-5 h-5 text-green-400"></i>
                           <span class="">info.ivf@healingwayafrica.com</span>
                       </div>
                   </div>
               </div>
           </div>

           <div class="border-t border-white mt-12 pt-8 text-center">
               <p>&copy; {{ date('Y') }} HealingWay Fertility Center. All rights reserved.</p>
           </div>

       </div>
   </footer>
