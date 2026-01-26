<x-app-layout>
    {{-- Global error list --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="bg-white rounded p-6 m-6">

        <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Title -->
                <div>
                    <label for="title" class="label">Event Title <x-required-mark /></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}"
                        required class="input @error('title') border-red-500 @enderror" placeholder="Enter event title">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Venue -->
                <div>
                    <label for="venue" class="label">Venue</label>
                    <input type="text" name="venue" id="venue" value="{{ old('venue', $event->venue) }}"
                        class="input @error('venue') border-red-500 @enderror" placeholder="Enter venue">
                    @error('venue')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                @php
                    $today = now()->toDateString();

                    // Ensure the value is Y-m-d for the date input
                    $eventDateValue = old(
                        'event_date',
                        optional($event->event_date)->format('Y-m-d') ?? $event->event_date,
                    );

                    // Ensure the value is H:i for the time input
                    $eventTimeValue = old('event_time', \Carbon\Carbon::parse($event->event_time)->format('H:i'));

                    // min date should be today, unless the existing event is already in the past, then allow showing it
                    $minDate = $eventDateValue && $eventDateValue < $today ? $eventDateValue : $today;
                @endphp

                <!-- Event Date -->
                <div>
                    <label for="event_date" class="label">Event Date</label>
                    <input type="date" name="event_date" id="event_date" min="{{ $minDate }}"
                        value="{{ $eventDateValue }}" class="input @error('event_date') border-red-500 @enderror">
                    @error('event_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Event Time -->
                <div>
                    <label for="event_time" class="label">Event Time</label>
                    <input type="time" name="event_time" id="event_time" value="{{ $eventTimeValue }}"
                        class="input @error('event_time') border-red-500 @enderror">
                    @error('event_time')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>



                @php
                    $today = now()->toDateString();

                    // Ensure the value is Y-m-d for the date input
                    $endDateValue = old('end_date', optional($event->end_date)->format('Y-m-d') ?? $event->end_date);

                    // Ensure the value is H:i for the time input
                    $eventTimeValue = old('end_time', \Carbon\Carbon::parse($event->end_time)->format('H:i'));

                    // min date should be today, unless the existing event is already in the past, then allow showing it
                $minDate = $endDateValue && $endDateValue < $today ? $endDateValue : $today; @endphp <!-- Event Date -->
                <div>
                    <label for="end_date" class="label">Event End Date</label>
                    <input type="date" name="end_date" id="end_date" min="{{ $minDate }}"
                        value="{{ $endDateValue }}" class="input @error('end_date') border-red-500 @enderror">
                    @error('end_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Event Time -->
                <div>
                    <label for="end_time" class="label">Event End Time</label>
                    <input type="time" name="end_time" id="end_time" value="{{ $eventTimeValue }}"
                        class="input @error('end_time') border-red-500 @enderror">
                    @error('end_time')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>




                <!-- Status -->
                <div>
                    <label for="status" class="label">Status <x-required-mark /></label>
                    <select name="status" id="status" required
                        class="input p-2 @error('status') border-red-500 @enderror">
                        <option value="draft" {{ old('status', $event->status) == 'draft' ? 'selected' : '' }}>Draft
                        </option>
                        <option value="published" {{ old('status', $event->status) == 'published' ? 'selected' : '' }}>
                            Published</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- Summary -->
            <div class="mt-4">
                <label for="summary" class="block text-sm label font-medium text-gray-700 mb-1">
                    Event Summary <x-required-mark /> </label>
                <textarea name="summary" required id="summary" rows="3"
                    class="w-full px-4 input py-2 border @error('summary') border-red-500 @enderror rounded-lg focus:ring-2 focus:ring-hw-green focus:border-hw-green">{{ old('summary', $event->summary) }}</textarea>
                @error('summary')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Body (CKEditor) -->
            <div class="md:col-span-2 m-4">
                <label for="body" class="label">Full Details <x-required-mark /></label>
                <textarea name="body" id="body" class="input ckeditor @error('body') border-red-500 @enderror" rows="10"
                    placeholder="Enter full event details">{{ old('body', $event->body) }}</textarea>
                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Featured Image -->
            <div class="mt-4">
                <x-image-upload name="featured_image" label="Featured Image" :preview="$event->featured_image ? 'storage/' . $event->featured_image : null" />
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Update Event</button>
            </div>
        </form>

    </div>

    @include('backend.layouts.ckeditor')





</x-app-layout>
