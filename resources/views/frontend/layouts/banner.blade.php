  <section id="home"
      class="relative min-h-screen flex flex-col justify-center items-center overflow-hidden bg-gradient-to-br from-gray-900 to-blue-950 text-white">

      <!-- Background Slideshow -->
      <div class="absolute inset-0 z-0">
          <div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 ease-in-out slideshow-image">
          </div>
          <div class="absolute inset-0 bg-gradient-to-b from-black/80 to-black/50"></div>
      </div>

      <!-- Hero Content -->
      <div
          class="relative z-10 flex flex-col justify-center items-center w-full px-4 sm:px-6 lg:px-8 min-h-screen lg:min-h-[80vh]">
          <div
              class="flex flex-col justify-center items-center lg:items-start text-center lg:text-left max-w-6xl space-y-6 lg:space-y-8">

              <!-- Animated Headings -->
              <h1 id="hero-title"
                  class="text-5xl  md:text-6xl lg:text-5xl font-extrabold opacity-0 transform -translate-y-12 transition-all duration-700 ease-out w-full lg:w-4/5 ">
                  <small class="text-2xl sm:text-3xl text-white/80">Welcome to</small><br>
                  <span class="text-green-400 bg-clip-text bg-gradient-to-r from-green-400 to-blue-300">HealingWay
                      Fertility Centre</span>
              </h1>

              <p id="hero-desc" class="font-bold text-1xl"></p>



              <!-- Buttons -->
              <div id="hero-buttons"
                  class="flex flex-col sm:flex-row items-center sm:items-start gap-4 opacity-0 transform translate-y-6 transition-all duration-700 ease-out w-full sm:w-auto">
                  <button
                      class="w-full sm:w-auto bg-gradient-to-r from-hw-blue to-hw-green  hover:from-green-500 hover:to-blue-600 text-white py-3 px-8 rounded-full font-semibold text-base sm:text-lg flex items-center justify-center gap-2 shadow-lg hover:shadow-xl transition-all duration-300">
                      Talk to a Specialist
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                          </path>
                      </svg>
                  </button>
                  <button
                      class="w-full sm:w-auto border-2 border-white/80 hover:bg-white/10 text-white py-3 px-8 rounded-full font-semibold text-base sm:text-lg flex items-center justify-center gap-2 transition-all duration-300">
                      Our Services
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 7l5 5-5 5M6 7l5 5-5 5"></path>
                      </svg>
                  </button>
              </div>
          </div>
      </div>

      <!-- Stats Cards -->
      <div
          class="relative z-10 grid grid-cols-2 sm:grid-cols-4 gap-4 sm:gap-6 px-4 sm:px-6 lg:px-8 w-full max-w-6xl mb-8">
          <div
              class="bg-white/10 backdrop-blur-lg p-6 rounded-2xl text-center transform transition duration-500 hover:scale-105 hover:bg-white/20 shadow-md">
              <div class="text-4xl font-bold counter text-hw-green" data-target="5" data-suffix="+">0</div>
              <div class="text-white/80 text-sm sm:text-base mt-2">Years Experience</div>
          </div>
          <div
              class="bg-white/10 backdrop-blur-lg p-6 rounded-2xl text-center transform transition duration-500 hover:scale-105 hover:bg-white/20 shadow-md">
              <div class="text-4xl font-bold counter text-hw-green" data-target="100" data-suffix="+">0</div>
              <div class="text-white/80 text-sm sm:text-base mt-2">Happy Families</div>
          </div>
          <div
              class="bg-white/10 backdrop-blur-lg p-6 rounded-2xl text-center transform transition duration-500 hover:scale-105 hover:bg-white/20 shadow-md">
              <div class="text-4xl font-bold counter text-hw-green" data-target="85" data-suffix="%">0</div>
              <div class="text-white/80 text-sm sm:text-base mt-2">Success Rate</div>
          </div>
          <div
              class="bg-white/10 backdrop-blur-lg p-6 rounded-2xl text-center transform transition duration-500 hover:scale-105 hover:bg-white/20 shadow-md">
              <div class="text-4xl font-bold counter text-hw-green" data-target="20" data-suffix="+">0</div>
              <div class="text-white/80 text-sm sm:text-base mt-2">Expert Doctors</div>
          </div>
      </div>

      <script>
          // Banner slides
          const slides = [{
                  title: "<span class='text-lg'> Welcome to: </span><br><span class='text-hw-green'> Healing<span class='text-white'>Way</span> Fertility Centre</span>",
                  desc: "Premier IVF & Fertility Centre in East Africa, offering reproductive technology to help you build your family.",
                  image: "assets/img/home_banner.png"
              },
              {
                  title: "<small >Your Journey to Parenthood <span class='text-hw-green'>Starts Here </small></span>",
                  desc: "Helping families grow with proven success rates and compassionate care.",
                  image: "assets/img/main-banner-5.png"
              }
          ];


          let currentSlide = 0;
          const titleEl = document.getElementById('hero-title');
          const descEl = document.getElementById('hero-desc');
          const buttonsEl = document.getElementById('hero-buttons');
          const bgEl = document.querySelector('.slideshow-image');

          // Show slide
          function showSlide(index, instant = false) {
              titleEl.innerHTML = slides[index].title;
              descEl.textContent = slides[index].desc;
              bgEl.style.backgroundImage = `url('${slides[index].image}')`;

              if (instant) {
                  bgEl.style.opacity = 1;
                  titleEl.style.opacity = 1;
                  titleEl.style.transform = 'translateY(0)';
                  descEl.style.opacity = 1;
                  descEl.style.transform = 'translateY(0)';
                  buttonsEl.style.opacity = 1;
                  buttonsEl.style.transform = 'translateY(0)';
              } else {
                  setTimeout(() => {
                      bgEl.style.opacity = 1;
                      titleEl.style.opacity = 1;
                      titleEl.style.transform = 'translateY(0)';
                      descEl.style.opacity = 1;
                      descEl.style.transform = 'translateY(0)';
                      buttonsEl.style.opacity = 1;
                      buttonsEl.style.transform = 'translateY(0)';
                  }, 50);
              }
          }

          // Slide transition
          function changeSlide() {
              titleEl.style.opacity = 0;
              titleEl.style.transform = 'translateY(-12px)';
              descEl.style.opacity = 0;
              descEl.style.transform = 'translateY(-6px)';
              buttonsEl.style.opacity = 0;
              buttonsEl.style.transform = 'translateY(6px)';
              bgEl.style.opacity = 0;

              setTimeout(() => {
                  currentSlide = (currentSlide + 1) % slides.length;
                  showSlide(currentSlide);
              }, 700);
          }

          // Initialize
          showSlide(currentSlide, true);
          setInterval(changeSlide, 10000);


          const counters = document.querySelectorAll('.counter');

          const animateCounter = (counter) => {
              const target = +counter.getAttribute('data-target');
              const prefix = counter.getAttribute('data-prefix') || '';
              const suffix = counter.getAttribute('data-suffix') || '';
              const speed = 100;
              const increment = Math.ceil(target / speed);

              const updateCount = () => {
                  let current = +counter.innerText.replace(/[^0-9]/g, '');
                  if (current < target) {
                      current = Math.min(current + increment, target);
                      counter.innerText = `${prefix}${current}${suffix}`;
                      setTimeout(updateCount, 20);
                  } else {
                      counter.innerText = `${prefix}${target}${suffix}`;
                  }
              };

              updateCount();
          };

          const observer = new IntersectionObserver((entries, observer) => {
              entries.forEach(entry => {
                  if (entry.isIntersecting) {
                      const counter = entry.target;
                      animateCounter(counter);
                      observer.unobserve(counter); // Run once per counter
                  }
              });
          }, {
              threshold: 0.6 // Adjust how much of the counter needs to be visible
          });

          counters.forEach(counter => observer.observe(counter));
      </script>
  </section>
