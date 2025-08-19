<x-guest-layout>
    <div class="max-w-6xl mx-auto p-6 py-24 mt-[80px]">
        <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8">
            {{-- Service Image --}}
            @if ($service->photo)
                <div class="flex-shrink-0 w-full lg:w-1/3">
                    <img src="{{ asset('storage/' . $service->photo) }}" 
                         alt="{{ $service->name }}" 
                         class="w-full rounded-lg shadow-lg object-cover">
                </div>
            @endif

            {{-- Service Content --}}
            <div class="flex-1">
                {{-- Service Title --}}
                <h1 class="text-3xl sm:text-4xl font-bold text-healingway-blue mb-4">
                    {{ $service->name }}
                </h1>

                {{-- Service Description --}}
                @if ($service->desc)
                    <p class="text-gray-700 mb-6">
                        {{ $service->desc }}
                    </p>
                @endif

                {{-- CKEditor Body --}}
                <div class="prose prose-lg sm:prose-xl max-w-full mb-6">
                    {!! $service->body !!}
                </div>

                {{-- Back Link --}}
                <a href="{{ route('our-services') }}" 
                   class="text-healingway-green font-medium hover:underline transition-colors">
                    &larr; Back to Services
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
