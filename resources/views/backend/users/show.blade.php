<x-app-layout>
    <div class="max-w-5xl mx-auto py-8 px-4">

        <a href="{{ route($user->hasRole('admin') ? 'admin.users.admins' : 'admin.users.patients') }}" class="btn-gray mb-4">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-1"></i>

            Back</a>

        <a href="{{ route('admin.users.edit', $user) }}" class="btn">
            <i data-lucide="edit" class="w-4 h-4 mr-1"></i> Edit
        </a>

        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-6">User Details</h2>

            {{-- Basic info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-gray-500">Name</p>
                    <p class="font-medium">{{ $user->name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="font-medium">{{ $user->email }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Signup Method</p>
                    <p class="font-medium capitalize">{{ $user->signup_method }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Account Status</p>
                    <span
                        class="inline-flex px-2 py-1 rounded text-xs font-semibold
                        {{ $user->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ ucfirst($user->status) }}
                    </span>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Email Verified</p>
                    <p class="font-medium">
                        {{ $user->email_verified_at ? $user->email_verified_at->format('d M Y, H:i') : 'Not verified' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-500">Registered On</p>
                    <p class="font-medium">{{ $user->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>

        @if ($user->hasRole('user'))
            <div class="bg-white shadow rounded-lg p-6 mt-6">
                <h3 class="text-lg font-semibold mb-4">Patient Details</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-sm text-gray-500">Phone</p>
                        <p class="font-medium">{{ $user->patientDetail?->phone ?? '—' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Gender</p>
                        <p class="font-medium capitalize">{{ $user->patientDetail?->gender ?? '—' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Date of Birth</p>
                        <p class="font-medium">
                            {{ $user->patientDetail?->date_of_birth?->format('d M Y') ?? '—' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Marital Status</p>
                        <p class="font-medium">{{ $user->patientDetail?->marital_status ?? '—' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Occupation</p>
                        <p class="font-medium">{{ $user->patientDetail?->occupation ?? '—' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Blood Group</p>
                        <p class="font-medium">{{ $user->patientDetail?->blood_group ?? '—' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Address</p>
                        <p class="font-medium">{{ $user->patientDetail?->address ?? '—' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">City</p>
                        <p class="font-medium">{{ $user->patientDetail?->city ?? '—' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Country</p>
                        <p class="font-medium">{{ $user->patientDetail?->country ?? '—' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Emergency Contact Name</p>
                        <p class="font-medium">{{ $user->patientDetail?->emergency_contact_name ?? '—' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Emergency Contact Phone</p>
                        <p class="font-medium">{{ $user->patientDetail?->emergency_contact_phone ?? '—' }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div>
                        <p class="text-sm text-gray-500">Allergies</p>
                        <p class="font-medium">{{ $user->patientDetail?->allergies ?? '—' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Medical History</p>
                        <p class="font-medium">{{ $user->patientDetail?->medical_history ?? '—' }}</p>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-sm text-gray-500">Notes</p>
                    <p class="font-medium">{{ $user->patientDetail?->notes ?? '—' }}</p>
                </div>
            </div>
        @endif

        {{-- Roles --}}
        <div class="bg-white shadow rounded-lg p-6 mt-6">
            <h3 class="text-lg font-semibold mb-4">Roles</h3>

            @if ($user->roles->isEmpty())
                <p class="text-gray-500 text-sm">No roles assigned</p>
            @else
                <div class="flex flex-wrap gap-2">
                    @foreach ($user->roles as $role)
                        <span class="px-3 py-1 text-sm rounded bg-blue-100 text-blue-700">
                            {{ ucfirst($role->name) }}
                        </span>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Permissions --}}
        <div class="bg-white shadow rounded-lg p-6 mt-6">
            <h3 class="text-lg font-semibold mb-4">Permissions</h3>

            @if ($user->permissions->isEmpty())
                <p class="text-gray-500 text-sm">No direct permissions</p>
            @else
                <div class="flex flex-wrap gap-2">
                    @foreach ($user->permissions as $permission)
                        <span class="px-3 py-1 text-xs rounded bg-gray-100 text-gray-700">
                            {{ $permission->name }}
                        </span>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</x-app-layout>
