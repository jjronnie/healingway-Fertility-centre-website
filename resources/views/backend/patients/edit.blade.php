<x-app-layout>
    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <x-page-title title="Patient Details" subtitle="Update your personal and medical details." />
                    <a href="{{ route('dashboard') }}" class="btn-gray">Back to Dashboard</a>
                </div>

                @if (session('success'))
                    <div class="mt-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mt-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('user.patient-details.update') }}" method="POST" class="space-y-6 mt-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="label">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $detail?->phone) }}" class="input">
                            @error('phone')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Gender</label>
                            <select name="gender" class="input mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                                <option value="">Select</option>
                                @foreach (['female' => 'Female', 'male' => 'Male'] as $value => $label)
                                    <option value="{{ $value }}" @selected(old('gender', $detail?->gender) === $value)>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('gender')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Date of Birth</label>
                            <input type="date" name="date_of_birth"
                                value="{{ old('date_of_birth') ?? ($detail?->date_of_birth?->format('Y-m-d') ?? '') }}"
                                max="{{ date('Y-m-d') }}"
                                class="input">
                            @error('date_of_birth')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Marital Status</label>
                            <select name="marital_status" class="input mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                                <option value="">Select</option>
                                @foreach (['single' => 'Single', 'married' => 'Married', 'divorced' => 'Divorced', 'widowed' => 'Widowed'] as $value => $label)
                                    <option value="{{ $value }}" @selected(old('marital_status', $detail?->marital_status) === $value)>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('marital_status')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Occupation</label>
                            <input type="text" name="occupation" value="{{ old('occupation', $detail?->occupation) }}" class="input">
                            @error('occupation')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Blood Group</label>
                            <select name="blood_group" class="input mt-1 w-full border rounded px-3 py-2 focus:outline-none focus:ring">
                                <option value="">Select</option>
                                @foreach (['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'] as $group)
                                    <option value="{{ $group }}" @selected(old('blood_group', $detail?->blood_group) === $group)>
                                        {{ $group }}
                                    </option>
                                @endforeach
                            </select>
                            @error('blood_group')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Address</label>
                            <input type="text" name="address" value="{{ old('address', $detail?->address) }}" class="input">
                            @error('address')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">City</label>
                            <input type="text" name="city" value="{{ old('city', $detail?->city) }}" class="input">
                            @error('city')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Country</label>
                            <input type="text" name="country" value="{{ old('country', $detail?->country) }}" class="input">
                            @error('country')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Emergency Contact Name</label>
                            <input type="text" name="emergency_contact_name"
                                value="{{ old('emergency_contact_name', $detail?->emergency_contact_name) }}" class="input">
                            @error('emergency_contact_name')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Emergency Contact Phone</label>
                            <input type="text" name="emergency_contact_phone"
                                value="{{ old('emergency_contact_phone', $detail?->emergency_contact_phone) }}" class="input">
                            @error('emergency_contact_phone')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="label">Allergies</label>
                            <textarea name="allergies" rows="3" class="input">{{ old('allergies', $detail?->allergies) }}</textarea>
                            @error('allergies')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Medical History</label>
                            <textarea name="medical_history" rows="3" class="input">{{ old('medical_history', $detail?->medical_history) }}</textarea>
                            @error('medical_history')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="label">Notes</label>
                        <textarea name="notes" rows="3" class="input">{{ old('notes', $detail?->notes) }}</textarea>
                        @error('notes')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-loading-button text="Save Details" class="btn" />
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
