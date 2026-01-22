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

            {{-- Actions --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.users.index') }}" class="btn-gray">
                    Cancel
                </a>
              

            <x-loading-button text=" Update User" class="btn" />

            </div>

        </form>
    </div>
</x-app-layout>
