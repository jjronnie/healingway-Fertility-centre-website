<x-guest-layout>

    {{-- nav --}}
    @include('frontend.layouts.page-title')

    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Heading -->
            <p class="text-lg text-center text-gray-600 mb-12 md:mb-16 max-w-3xl mx-auto">
                Access a wealth of information to support your health journey. Explore our videos, download helpful
                documents, and read our latest blog posts for valuable insights and tips.
            </p>

            <!-- Resources Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                <!-- Videos Section -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 flex flex-col items-center text-center">
                    <div class="bg-blue-100 text-blue-600 rounded-full p-4 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Educational Videos</h3>
                    <p class="text-gray-600 mb-6 flex-grow">Watch our informative videos on various health topics,
                        procedures, and wellness tips from our experts.</p>
                    <div class="w-full grid grid-cols-1 gap-6">
                        <div class="relative pt-[56.25%] w-full rounded-lg overflow-hidden shadow-md">
                            <!-- 16:9 Aspect Ratio -->
                            <iframe class="absolute top-0 left-0 w-full h-full"
                                src="https://www.youtube.com/embed/dQw4w9WgXcQ?controls=0" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="Understanding Your Diagnosis"></iframe>
                        </div>
                        <div class="relative pt-[56.25%] w-full rounded-lg overflow-hidden shadow-md">
                            <!-- 16:9 Aspect Ratio -->
                            <iframe class="absolute top-0 left-0 w-full h-full"
                                src="https://www.youtube.com/embed/videoseries?list=PLx0sYbCqOb8SEvUoG6T8S1X3yG0q04g4M"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen title="Healthy Lifestyle Tips"></iframe>
                        </div>
                        <a href="#"
                            class="inline-block mt-4 px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-300">
                            View More Videos
                        </a>
                    </div>
                </div>

                <!-- Documents Section -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 flex flex-col items-center text-center">
                    <div class="bg-green-100 text-green-600 rounded-full p-4 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Downloadable Documents</h3>
                    <p class="text-gray-600 mb-6 flex-grow">Find patient forms, information leaflets, and guides to help
                        you prepare for appointments and understand your care.</p>
                    <ul class="w-full text-left space-y-4">
                        <li>
                            <a href="https://example.com/patient-intake-form.pdf" download
                                class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-300 shadow-sm">
                                <span class="text-gray-800 font-medium">Patient Intake Form</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://example.com/medication-guide.pdf" download
                                class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-300 shadow-sm">
                                <span class="text-gray-800 font-medium">Medication Guide</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://example.com/post-procedure-care.pdf" download
                                class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-300 shadow-sm">
                                <span class="text-gray-800 font-medium">Post-Procedure Care</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <a href="#"
                        class="inline-block mt-8 px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-colors duration-300">
                        Browse All Documents
                    </a>
                </div>

                <!-- Blog Posts Section -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 flex flex-col items-center text-center">
                    <div class="bg-purple-100 text-purple-600 rounded-full p-4 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-3m-2 2l-4-4m5 0l4 4" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Latest Blog Posts</h3>
                    <p class="text-gray-600 mb-6 flex-grow">Stay informed with our blog, featuring articles on health
                        trends, wellness tips, and clinic news.</p>
                    <div class="w-full space-y-6">
                        <div
                            class="text-left bg-gray-50 rounded-lg p-4 shadow-sm hover:bg-gray-100 transition-colors duration-300">
                            <h4 class="text-lg font-semibold text-gray-800 mb-1">Understanding Diabetes Management</h4>
                            <p class="text-sm text-gray-600 mb-2">Learn about effective strategies for managing diabetes
                                and living a healthy life.</p>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Read More
                                &rarr;</a>
                        </div>
                        <div
                            class="text-left bg-gray-50 rounded-lg p-4 shadow-sm hover:bg-gray-100 transition-colors duration-300">
                            <h4 class="text-lg font-semibold text-gray-800 mb-1">Benefits of Regular Exercise</h4>
                            <p class="text-sm text-gray-600 mb-2">Discover how a consistent exercise routine can boost
                                your overall well-being.</p>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Read More
                                &rarr;</a>
                        </div>
                        <div
                            class="text-left bg-gray-50 rounded-lg p-4 shadow-sm hover:bg-gray-100 transition-colors duration-300">
                            <h4 class="text-lg font-semibold text-gray-800 mb-1">New Advancements in Cancer Treatment
                            </h4>
                            <p class="text-sm text-gray-600 mb-2">An overview of the latest breakthroughs in oncology
                                and patient care.</p>
                            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Read More
                                &rarr;</a>
                        </div>
                        <a href="#"
                            class="inline-block mt-4 px-6 py-3 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition-colors duration-300">
                            View All Blog Posts
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Main Grid for Blog Post and Sidebar -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

      <!-- Main Blog Post Content -->
      <article class="lg:col-span-2 bg-white rounded-xl shadow-lg p-6 md:p-8">
        <header class="mb-8">
          <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
            Understanding the Benefits of a Balanced Diet for Optimal Health
          </h1>
          <div class="flex items-center text-gray-600 text-sm md:text-base">
            <span class="mr-4">By <a href="#" class="font-medium text-blue-600 hover:underline">Dr. Emily White</a></span>
            <span>Published on October 26, 2025</span>
          </div>
        </header>

        <figure class="mb-8 rounded-lg overflow-hidden shadow-md">
          <img src="https://placehold.co/1200x600/E5E7EB/000000?text=Healthy+Eating" alt="A vibrant, balanced meal" class="w-full h-auto object-cover">
          <figcaption class="sr-only">A balanced meal with fresh vegetables and lean protein.</figcaption>
        </figure>

        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
          <p class="mb-6">
            In today's fast-paced world, maintaining a **balanced diet** is more crucial than ever for overall health and well-being. What we consume directly impacts our energy levels, mood, cognitive function, and long-term health. A truly balanced diet isn't about strict limitations or deprivation; it's about consuming a variety of foods in appropriate proportions to provide the body with essential nutrients.
          </p>
          <h2 class="text-3xl font-bold text-gray-800 mb-4 mt-8">The Pillars of a Healthy Plate</h2>
          <p class="mb-6">
            When we talk about balance, we're typically referring to the macro-nutrients: **carbohydrates, proteins, and fats**, alongside micro-nutrients like vitamins and minerals.
          </p>
          <ul class="list-disc list-inside space-y-2 mb-6 ml-4">
            <li>
              <strong>Complex Carbohydrates:</strong> These are your body's primary source of energy. Think whole grains, oats, brown rice, fruits, and vegetables. They provide sustained energy and fiber.
            </li>
            <li>
              <strong>Lean Proteins:</strong> Essential for building and repairing tissues, hormones, and enzymes. Sources include lean meats, fish, poultry, beans, lentils, and tofu.
            </li>
            <li>
              <strong>Healthy Fats:</strong> Crucial for brain function, hormone production, and nutrient absorption. Avocados, nuts, seeds, and olive oil are excellent choices.
            </li>
          </ul>
          <p class="mb-6">
            Beyond these, an abundance of **fruits and vegetables** should form a significant portion of your daily intake, offering a spectrum of vitamins, minerals, and antioxidants that protect your cells from damage.
          </p>

          <h2 class="text-3xl font-bold text-gray-800 mb-4 mt-8">Long-Term Health Benefits</h2>
          <p class="mb-6">
            The advantages of a balanced diet extend far beyond just feeling good in the short term. Consistently nourishing your body correctly can:
          </p>
          <ul class="list-disc list-inside space-y-2 mb-6 ml-4">
            <li>
              <strong>Reduce Risk of Chronic Diseases:</strong> A healthy diet is a powerful weapon against conditions like heart disease, type 2 diabetes, certain cancers, and obesity.
            </li>
            <li>
              <strong>Boost Immune Function:</strong> Nutrients from varied foods strengthen your immune system, helping your body fight off infections and illnesses.
            </li>
            <li>
              <strong>Improve Mental Well-being:</strong> Research increasingly links diet to mental health. Foods rich in omega-3 fatty acids, vitamins, and minerals can positively impact mood and cognitive function.
            </li>
            <li>
              <strong>Enhance Energy Levels:</strong> Say goodbye to energy slumps! A steady supply of nutrients keeps your energy consistent throughout the day.
            </li>
          </ul>
          <p class="mb-6">
            Making small, sustainable changes to your eating habits can lead to significant improvements in your quality of life. Start by incorporating more whole foods, reducing processed items, and listening to your body's hunger and fullness cues. Consult with a healthcare professional or a registered dietitian for personalized advice.
          </p>
        </div>
      </article>

      <!-- Sidebar -->
      <aside class="lg:col-span-1 space-y-10">

        <!-- Related Posts Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
          <h3 class="text-2xl font-bold text-gray-800 mb-6">Related Posts</h3>
          <ul class="space-y-5">
            <li>
              <a href="#" class="block hover:bg-gray-50 rounded-lg p-3 -mx-3 transition-colors duration-200">
                <h4 class="text-lg font-semibold text-gray-800 leading-snug">The Importance of Hydration for Your Body</h4>
                <p class="text-sm text-gray-600 mt-1">Discover how proper water intake affects your energy and focus.</p>
              </a>
            </li>
            <li>
              <a href="#" class="block hover:bg-gray-50 rounded-lg p-3 -mx-3 transition-colors duration-200">
                <h4 class="text-lg font-semibold text-gray-800 leading-snug">Simple Exercises You Can Do at Home</h4>
                <p class="text-sm text-gray-600 mt-1">Easy fitness routines to keep you active without leaving the house.</p>
              </a>
            </li>
            <li>
              <a href="#" class="block hover:bg-gray-50 rounded-lg p-3 -mx-3 transition-colors duration-200">
                <h4 class="text-lg font-semibold text-gray-800 leading-snug">Managing Stress for Better Sleep</h4>
                <p class="text-sm text-gray-600 mt-1">Tips and techniques to reduce stress and improve your sleep quality.</p>
              </a>
            </li>
          </ul>
        </div>

        <!-- Other Resources Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
          <h3 class="text-2xl font-bold text-gray-800 mb-6">Other Patient Resources</h3>
          <ul class="space-y-5">
            <li>
              <a href="#" class="block hover:bg-gray-50 rounded-lg p-3 -mx-3 transition-colors duration-200">
                <h4 class="text-lg font-semibold text-blue-600 leading-snug">Download Our Wellness Guide (PDF)</h4>
                <p class="text-sm text-gray-600 mt-1">A comprehensive guide to holistic well-being.</p>
              </a>
            </li>
            <li>
              <a href="#" class="block hover:bg-gray-50 rounded-lg p-3 -mx-3 transition-colors duration-200">
                <h4 class="text-lg font-semibold text-blue-600 leading-snug">Watch Our Video on Preventive Care</h4>
                <p class="text-sm text-gray-600 mt-1">Expert advice on staying healthy year-round.</p>
              </a>
            </li>
            <li>
              <a href="#" class="block hover:bg-gray-50 rounded-lg p-3 -mx-3 transition-colors duration-200">
                <h4 class="text-lg font-semibold text-blue-600 leading-snug">Schedule a Consultation</h4>
                <p class="text-sm text-gray-600 mt-1">Book an appointment with one of our specialists.</p>
              </a>
            </li>
          </ul>
        </div>

      </aside>

    </div>
  </div>
</section>






</x-guest-layout>
