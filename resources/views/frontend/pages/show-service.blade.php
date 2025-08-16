<x-guest-layout>



<div class="max-w-3xl mx-auto p-6 py-24 mt-[80px] overflow-hidden">
    <h1 class="text-3xl font-bold text-healingway-blue mb-4">{{ $service->title }}</h1>

    <div class="prose max-w-full">
        {!! $service->body !!} {{-- CKEditor content --}}
    </div>

    <a href="{{ route('services.index') }}" class="text-green-500 hover:underline mt-4 inline-block">Back to Services</a>
</div>



</x-guest-layout>