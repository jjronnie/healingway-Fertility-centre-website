<x-preloader />

<section id="home" x-data="{
    activeSlide: 0,
    slides: [{
            img: '{{ asset('assets/img/3.webp') }}',
            title: 'Building Families,<br> <span class=\'text-hw-green\'>Creating Hope</span>',
            desc: 'East Africa\'s premier IVF & Fertility Centre. We combine advanced reproductive technology with compassionate care.'
        },

        {
            img: '{{ asset('assets/img/4.webp') }}',
            title: 'HealingWay<br> <span class=\'text-hw-green\'>Fertility Centre</span>',
            desc: 'East Africa\'s premier IVF & Fertility Centre. We combine advanced reproductive technology with compassionate care.'
        },

        {
            img: '{{ asset('assets/img/1.webp') }}',
            title: 'Your Journey to <br> <span class=\'text-hw-green\'>Parenthood Starts Here</span>',
            desc: 'With industry-leading success rates and a team of expert specialists, we are dedicated to walking every step  with you.'
        }
    ],
    timer: null,
    init() {
        this.startTimer();
    },
    startTimer() {
        this.timer = setInterval(() => {
            this.next();
        }, 6000);
    },
    resetTimer() {
        clearInterval(this.timer);
        this.startTimer();
    },
    next() {
        this.activeSlide = (this.activeSlide === this.slides.length - 1) ? 0 : this.activeSlide + 1;
    }
}"
    class="relative w-full min-h-screen flex items-center bg-slate-900 overflow-hidden">

    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="activeSlide === index" x-transition:enter="transition-opacity ease-in-out duration-1000"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in-out duration-1000" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="absolute inset-0 z-0">
            <img :src="slide.img" alt="Hero Background"
                class="absolute inset-0 w-full h-full object-cover object-center"
                :fetchpriority="index === 0 ? 'high' : 'auto'">
            <div
                class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/60 to-slate-900/20 sm:to-transparent">
            </div>
            <div class="absolute inset-x-0 bottom-0 h-1/3 bg-gradient-to-t from-slate-900/90 to-transparent lg:hidden">
            </div>
        </div>
    </template>

    <div
        class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen flex flex-col justify-center py-20">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <!-- Left Content -->
            <div class="space-y-6 sm:space-y-8 text-center lg:text-left pt-16 lg:pt-0">

                <template x-for="(slide, index) in slides" :key="index">
                    <div x-show="activeSlide === index" class="space-y-6">
                        <h1 x-show="activeSlide === index"
                            x-transition:enter="transition ease-out duration-700 delay-300"
                            x-transition:enter-start="opacity-0 translate-y-8"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-white leading-tight tracking-tight drop-shadow-sm"
                            x-html="slide.title">
                        </h1>

                        <p x-show="activeSlide === index"
                            x-transition:enter="transition ease-out duration-700 delay-500"
                            x-transition:enter-start="opacity-0 translate-y-8"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="text-base sm:text-lg md:text-xl text-gray-200 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-light"
                            x-text="slide.desc">
                        </p>
                    </div>
                </template>

                <!-- CTAs -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 animate-fade-in-up"
                    style="animation-delay: 0.8s; animation-fill-mode: both;">

                    <a href="{{ route('contact-us') }}"
                        class="w-full sm:w-auto px-8 py-4 bg-hw-green text-hw-blue font-bold rounded-full transition-all duration-300 hover:scale-105 hover:shadow-[0_0_20px_rgba(74,222,128,0.4)] flex items-center justify-center gap-2 group">
                        Talk to a Specialist
                        <i data-lucide="arrow-right" class="w-5 h-5 transition-transform group-hover:translate-x-1"></i>
                    </a>

                    <a href="{{ route('our-services') }}"
                        class="w-full sm:w-auto px-8 py-4 border border-white/30 bg-white/5 text-white font-medium rounded-full backdrop-blur-sm transition-all duration-300 hover:bg-white/20 hover:border-white">
                        Our Services
                    </a>
                </div>
            </div>

            <!-- Right Side Spacer -->
            <div class="hidden lg:block"></div>

        </div>
        <!-- Unified Glass Stats -->
        <div class="mt-10 animate-fade-in-up" style="animation-delay: 1s; animation-fill-mode: both;">

            <div
                class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl p-6 sm:p-8 shadow-[0_8px_30px_rgba(0,0,0,0.15)]">

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">

                    <div>
                        <div class="text-4xl font-extrabold text-hw-green">
                            <span class="counter" data-target="5">0</span>+
                        </div>
                        <div class="text-xs text-gray-300 uppercase tracking-widest mt-1">
                            Years Experience
                        </div>
                    </div>

                    <div>
                        <div class="text-4xl font-extrabold text-hw-green">
                            <span class="counter" data-target="80">0</span>+
                        </div>
                        <div class="text-xs text-gray-300 uppercase tracking-widest mt-1">
                            Happy Families
                        </div>
                    </div>

                    <div>
                        <div class="text-4xl font-extrabold text-hw-green">
                            <span class="counter" data-target="85">0</span>%
                        </div>
                        <div class="text-xs text-gray-300 uppercase tracking-widest mt-1">
                            Success Rate
                        </div>
                    </div>

                    <div>
                        <div class="text-4xl font-extrabold text-hw-green">
                            <span class="counter" data-target="20">0</span>+
                        </div>
                        <div class="text-xs text-gray-300 uppercase tracking-widest mt-1">
                            Specialists
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</section>

<div class="hidden lg:block h-32 bg-gray-50"></div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Only run animation if element is visible
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = +counter.getAttribute('data-target');
                    const duration = 2000; // 2 seconds animation
                    const start = 0;
                    const startTime = performance.now();

                    const updateCount = (currentTime) => {
                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);

                        // Ease out quart function for smooth slowing down
                        const ease = 1 - Math.pow(1 - progress, 4);

                        counter.innerText = Math.floor(ease * target);

                        if (progress < 1) {
                            requestAnimationFrame(updateCount);
                        } else {
                            counter.innerText = target; // Ensure exact final number
                        }
                    };

                    requestAnimationFrame(updateCount);
                    observer.unobserve(counter);
                }
            });
        }, {
            threshold: 0.5
        });

        document.querySelectorAll('.counter').forEach(c => observer.observe(c));
    });
</script>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translate3d(0, 30px, 0);
        }

        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }

    .animate-fade-in-up {
        opacity: 0;
        animation-name: fadeInUp;
        animation-duration: 0.8s;
        animation-fill-mode: both;
    }
</style>
