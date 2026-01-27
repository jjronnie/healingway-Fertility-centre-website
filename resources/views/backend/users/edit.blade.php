<x-app-layout>
    <div class="max-w-6xl mx-auto py-8 px-4">

        <form method="POST" action="{{ route('admin.users.update', $user) }}"
            class="bg-white shadow rounded-lg p-6 space-y-6">
            @csrf
            @method('PUT')

            <h2 class="text-xl font-semibold">Edit User: {{ $user->name }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">


                {{-- Name --}}
                <div>
                    <label class="label">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="input">
                    @error('name')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="label">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="input">
                    @error('email')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status --}}
                <div>
                    <label class="label">Status</label>
                    <select name="status"
                        class="input mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                        @foreach (['active',  'suspended'] as $status)
                            <option value="{{ $status }}" @selected(old('status', $user->status) === $status)>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

            {{-- Role --}}
            <div>
                <label class="label">Role</label>

                <select name="role" class="w-full border rounded px-3 py-2 input focus:outline-none focus:ring" required>

                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" @selected($user->roles->first()?->name === $role->name)>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>

                @error('role')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>
            </div>
 @if ($user->hasRole('admin'))

            {{-- Permissions --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Direct Permissions</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                    @foreach ($permissions as $permission)
                        <label class="flex items-center gap-2 text-xs">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                @checked($user->hasDirectPermission($permission->name))>
                            {{ucfirst( $permission->name )}}
                        </label>
                    @endforeach
                </div>
            </div>

            @endif

            {{-- Patient Details --}}

            @if ($user->hasRole('user'))
                <div class="border-t pt-6">
                    <h3 class="text-lg font-semibold mb-4">Patient Details</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="label">Phone</label>
                            <input type="text" name="patient_phone"
                                value="{{ old('patient_phone', $user->patientDetail?->phone) }}" class="input">
                            @error('patient_phone')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Gender</label>
                            <select name="patient_gender" class="input mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                                <option value="">Select</option>
                                @foreach (['female' => 'Female', 'male' => 'Male'] as $value => $label)
                                    <option value="{{ $value }}" @selected(old('patient_gender', $user->patientDetail?->gender) === $value)>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('patient_gender')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Date of Birth</label>
                            <input type="date" name="patient_date_of_birth"
                                value="{{ old('patient_date_of_birth') ?? ($user->patientDetail?->date_of_birth?->format('Y-m-d') ?? '') }}"
                                max="{{ date('Y-m-d') }}"
                                class="input">
                            @error('patient_date_of_birth')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Marital Status</label>
                            <select name="patient_marital_status" class="input mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                                <option value="">Select</option>
                                @foreach (['single' => 'Single', 'married' => 'Married', 'divorced' => 'Divorced', 'widowed' => 'Widowed'] as $value => $label)
                                    <option value="{{ $value }}" @selected(old('patient_marital_status', $user->patientDetail?->marital_status) === $value)>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('patient_marital_status')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Occupation</label>
                            <input type="text" name="patient_occupation"
                                value="{{ old('patient_occupation', $user->patientDetail?->occupation) }}" class="input">
                            @error('patient_occupation')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Blood Group</label>
                            <select name="patient_blood_group" class="input mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                                <option value="">Select</option>
                                @foreach (['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'] as $group)
                                    <option value="{{ $group }}" @selected(old('patient_blood_group', $user->patientDetail?->blood_group) === $group)>
                                        {{ $group }}
                                    </option>
                                @endforeach
                            </select>
                            @error('patient_blood_group')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Address</label>
                            <input type="text" name="patient_address"
                                value="{{ old('patient_address', $user->patientDetail?->address) }}" class="input">
                            @error('patient_address')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">City</label>
                            <input type="text" name="patient_city"
                                value="{{ old('patient_city', $user->patientDetail?->city) }}" class="input">
                            @error('patient_city')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Country</label>
                            <input type="text" name="patient_country"
                                value="{{ old('patient_country', $user->patientDetail?->country) }}" class="input">
                            @error('patient_country')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Emergency Contact Name</label>
                            <input type="text" name="patient_emergency_contact_name"
                                value="{{ old('patient_emergency_contact_name', $user->patientDetail?->emergency_contact_name) }}" class="input">
                            @error('patient_emergency_contact_name')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Emergency Contact Phone</label>
                            <input type="text" name="patient_emergency_contact_phone"
                                value="{{ old('patient_emergency_contact_phone', $user->patientDetail?->emergency_contact_phone) }}" class="input">
                            @error('patient_emergency_contact_phone')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="label">Allergies</label>
                            <textarea name="patient_allergies" rows="3" class="input">{{ old('patient_allergies', $user->patientDetail?->allergies) }}</textarea>
                            @error('patient_allergies')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Medical History</label>
                            <textarea name="patient_medical_history" rows="3" class="input">{{ old('patient_medical_history', $user->patientDetail?->medical_history) }}</textarea>
                            @error('patient_medical_history')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="label">Notes</label>
                        <textarea name="patient_notes" rows="3" class="input">{{ old('patient_notes', $user->patientDetail?->notes) }}</textarea>
                        @error('patient_notes')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            @endif

            {{-- Actions --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route($user->hasRole('admin') ? 'admin.users.admins' : 'admin.users.patients') }}" class="btn-gray">
                    Cancel
                </a>
              

            <x-loading-button text=" Update User" class="btn" />

            </div>

        </form>
    </div>
</x-app-layout>
