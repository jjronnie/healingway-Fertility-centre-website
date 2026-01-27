<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <x-page-title title="Edit Appointment" />
                    <a href="{{ route('user.appointments.index') }}" class="btn-gray">
                        Back to Activity
                    </a>
                </div>

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('user.appointments.update', $appointment) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    @include('backend.appointments.user.partials.form', ['appointment' => $appointment])

                    <x-loading-button text="Update Appointment" class="btn" />
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
