<x-app-layout>
    <div class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6" x-data="galleryUploadForm()">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-900">Upload Gallery Images</h1>
                <a href="{{ route('admin.gallery.images.index') }}" class="btn-gray">Back</a>
            </div>

            <form x-ref="form" action="{{ route('admin.gallery.images.store') }}" method="POST"
                enctype="multipart/form-data" class="space-y-6" @submit.prevent="submit">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-[2fr,1fr] gap-6">
                    <div class="space-y-6">
                        <div>
                            <label for="title" class="label">Title <x-required-mark /></label>
                            <input type="text" name="title" id="title" class="input" x-model="title" required>
                            <p class="text-xs text-gray-500 mt-1">This title will be applied to all uploaded images.</p>
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="label">Description</label>
                            <textarea name="description" id="description" rows="4" class="input"
                                x-model="description"></textarea>
                            <p class="text-xs text-gray-500 mt-1">Optional description applied to all images.</p>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="label">Categories</label>
                        @if ($categories->isEmpty())
                            <p class="text-sm text-gray-500">No categories yet. Create one first.</p>
                        @else
                            <div class="space-y-2">
                                @foreach ($categories as $category)
                                    <label class="flex items-center gap-2 text-sm text-gray-700">
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                            x-model="selectedCategories"
                                            class="rounded border-gray-300 text-hw-blue focus:ring-hw-blue"
                                            {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                        <span>{{ $category->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div>
                    <label class="label">Gallery Images <x-required-mark /></label>
                    <div class="flex flex-wrap items-center gap-4">
                        <button type="button" class="btn-success" @click="$refs.fileInput.click()">
                            <span x-text="files.length ? 'Add More Images' : 'Choose Gallery Images'"></span>
                        </button>
                        <span class="text-sm text-gray-600"
                            x-text="files.length ? `${files.length} file(s) selected` : 'No files selected'"></span>
                    </div>
                    <input type="file" name="photos[]" id="photos" multiple
                        accept="image/jpeg,image/png,image/webp" class="hidden" x-ref="fileInput"
                        @change="handleFiles">
                    <p class="text-xs text-gray-500 mt-2">Up to 20 images, max 10MB each. JPG, PNG, or WebP.</p>

                    <div class="text-sm text-red-600 mt-2 space-y-1" x-show="errors.length" x-cloak>
                        <template x-for="message in errors" :key="message">
                            <p x-text="message"></p>
                        </template>
                    </div>

                    <template x-if="files.length">
                        <div class="border border-gray-200 rounded-lg mt-4 bg-white">
                            <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200">
                                <span class="text-sm font-semibold text-gray-800">
                                    Preview (<span x-text="files.length"></span> images)
                                </span>
                                <button type="button" class="text-sm text-red-600 hover:underline" @click="clearAll">
                                    Clear All
                                </button>
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-3 p-4">
                                <template x-for="(file, index) in files" :key="file.id">
                                    <div class="group relative border border-gray-200 bg-white overflow-hidden">
                                        <img :src="file.preview" class="w-full h-24 object-cover" :alt="file.name">
                                        <button type="button"
                                            class="absolute inset-0 flex items-center justify-center bg-black/40 opacity-0 group-hover:opacity-100 transition"
                                            @click.stop="removeFile(index)" title="Remove image">
                                            <span class="bg-red-600 text-white rounded-full p-2 shadow">
                                                <i data-lucide="x" class="w-4 h-4"></i>
                                            </span>
                                        </button>
                                        <div class="px-2 py-2 text-xs text-gray-700">
                                            <div class="font-semibold truncate" x-text="file.name"></div>
                                            <div class="text-gray-500" x-text="file.sizeLabel"></div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="space-y-2" x-show="uploading" x-cloak>
                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-hw-blue rounded-full transition-all duration-150"
                            :style="`width: ${progress}%`"></div>
                    </div>
                    <p class="text-sm text-gray-600">Uploading... <span x-text="progress"></span>%</p>
                </div>

                <div class="text-sm text-gray-600" x-show="processing" x-cloak>
                    Processing images...
                </div>

                <p class="text-xs text-gray-500">
                    Conversions are queued. Make sure the database queue worker is running.
                </p>

                <div class="text-sm text-red-600" x-show="error" x-text="error" x-cloak></div>

                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('admin.gallery.images.index') }}" class="btn-gray">Cancel</a>
                    <button type="submit" class="btn" :disabled="uploading">Upload Images</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function galleryUploadForm() {
            return {
                title: @js(old('title', '')),
                description: @js(old('description', '')),
                selectedCategories: @js(old('categories', [])),
                files: [],
                errors: [],
                maxFiles: 20,
                maxSize: 10 * 1024 * 1024,
                allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
                progress: 0,
                uploading: false,
                processing: false,
                error: null,
                handleFiles(event) {
                    const selected = Array.from(event.target.files || []);
                    if (!selected.length) return;

                    this.errors = [];

                    for (const file of selected) {
                        if (this.files.length >= this.maxFiles) {
                            this.errors.push('You can only upload up to 5 images.');
                            break;
                        }

                        if (!this.allowedTypes.includes(file.type)) {
                            this.errors.push(`${file.name} is not a supported file type.`);
                            continue;
                        }

                        if (file.size > this.maxSize) {
                            this.errors.push(`${file.name} exceeds the 10MB limit.`);
                            continue;
                        }

                        this.files.push({
                            id: `${file.name}-${file.lastModified}-${Math.random()}`,
                            file,
                            name: file.name,
                            sizeLabel: this.formatBytes(file.size),
                            preview: URL.createObjectURL(file),
                        });
                    }

                    event.target.value = '';
                },
                removeFile(index) {
                    const [removed] = this.files.splice(index, 1);
                    if (removed?.preview) {
                        URL.revokeObjectURL(removed.preview);
                    }
                },
                clearAll() {
                    this.files.forEach((file) => {
                        if (file.preview) {
                            URL.revokeObjectURL(file.preview);
                        }
                    });
                    this.files = [];
                    this.errors = [];
                    if (this.$refs.fileInput) {
                        this.$refs.fileInput.value = '';
                    }
                },
                formatBytes(bytes) {
                    if (bytes === 0) return '0 B';
                    const k = 1024;
                    const sizes = ['B', 'KB', 'MB', 'GB'];
                    const i = Math.min(Math.floor(Math.log(bytes) / Math.log(k)), sizes.length - 1);
                    const size = bytes / Math.pow(k, i);
                    return `${size.toFixed(2)} ${sizes[i]}`;
                },
                submit() {
                    if (this.uploading) return;

                    this.error = null;
                    this.processing = false;
                    this.progress = 0;
                    this.errors = [];

                    if (!this.title.trim()) {
                        this.errors.push('Title is required.');
                    }

                    if (!this.files.length) {
                        this.errors.push('Please select at least one image.');
                    }

                    if (this.errors.length) {
                        return;
                    }

                    const formData = new FormData();
                    formData.append('_token', '{{ csrf_token() }}');
                    formData.append('title', this.title);
                    if (this.description) {
                        formData.append('description', this.description);
                    }
                    this.selectedCategories.forEach((id) => {
                        formData.append('categories[]', id);
                    });
                    this.files.forEach((file) => {
                        formData.append('photos[]', file.file);
                    });

                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', this.$refs.form.action);
                    xhr.setRequestHeader('Accept', 'application/json');

                    xhr.upload.onprogress = (event) => {
                        if (event.lengthComputable) {
                            this.progress = Math.round((event.loaded / event.total) * 100);
                        }
                    };

                    xhr.onload = () => {
                        this.uploading = false;

                        if (xhr.status >= 200 && xhr.status < 300) {
                            this.processing = true;
                            setTimeout(() => {
                                window.location.href = "{{ route('admin.gallery.images.index', ['uploaded' => 1]) }}";
                            }, 500);
                            return;
                        }

                        let payload = {};
                        try {
                            payload = JSON.parse(xhr.responseText || '{}');
                        } catch (error) {
                            payload = {};
                        }
                        this.error = payload.message || 'Upload failed. Please check your inputs and try again.';
                    };

                    xhr.onerror = () => {
                        this.uploading = false;
                        this.error = 'Upload failed. Please try again.';
                    };

                    this.uploading = true;
                    xhr.send(formData);
                },
            }
        }
    </script>
</x-app-layout>
