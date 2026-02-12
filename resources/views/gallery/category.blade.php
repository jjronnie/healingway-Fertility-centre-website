<x-guest-layout>
    <x-page-header image="assets/img/3.webp" title="{{ $category->name }}"
        description="Explore images from the {{ $category->name }} collection." />

    <section class="-mt-36 pb-6 md:pb-10 px-3 relative z-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="px-4 py-3 sticky top-24 z-20">
                <div class="inline-flex items-center gap-3 bg-white/95 border border-gray-200 shadow-sm rounded-full px-4 py-2">
                    <div class="w-44 sm:w-56">
                        <select class="input w-full bg-transparent border-0 focus:ring-0 focus:border-transparent text-sm py-1"
                            onchange="if (this.value) window.location.href = this.value;">
                            <option value="{{ route('gallery.index') }}">All</option>
                            @foreach (collect([$category])->merge($otherCategories) as $optionCategory)
                                <option value="{{ route('gallery.category', $optionCategory->slug) }}"
                                    {{ $optionCategory->id === $category->id ? 'selected' : '' }}>
                                    {{ $optionCategory->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-16 -mt-3" x-data="galleryGrid({
        initialItems: @js($images->getCollection()->map(fn($image) => [
            'id' => $image->id,
            'title' => $image->title,
            'description' => $image->description,
            'thumb_url' => $image->getFirstMediaUrl('gallery', 'thumb')
                ?: ($image->getFirstMediaUrl('gallery', 'webp') ?: asset('assets/img/1.webp')),
            'webp_url' => $image->getFirstMediaUrl('gallery', 'webp') ?: asset('assets/img/1.webp'),
        ])->values()),
        nextPageUrl: @js($nextPageUrl),
        placeholderUrl: @js(asset('assets/img/1.webp')),
    })" x-init="init()" @keydown.window="handleKeydown($event)">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                <template x-for="(item, index) in items" :key="item.id">
                    <button type="button"
                        class="group relative bg-transparent overflow-hidden shadow-sm hover:shadow-md"
                        @click="open(index)">
                        <div class="h-60 flex items-center justify-center">
                            <img :src="item.thumb_url" :alt="item.title || 'Gallery image'"
                                class="max-h-full max-w-full object-contain transition-transform group-hover:scale-105"
                                loading="lazy">
                        </div>
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition"></div>
                    </button>
                </template>
            </div>

            <div class="text-center py-6 text-sm text-gray-600" x-show="loading">Loading...</div>
            <div class="text-center py-6" x-show="!items.length" x-cloak>
                <x-empty-state icon="image" message="No images available in this category yet." />
            </div>

            <div x-ref="sentinel" class="h-1"></div>
        </div>

        <!-- Modal Viewer -->
        <div x-show="isOpen" x-cloak class="fixed inset-0 z-[9999] bg-black/90 flex items-center justify-center"
            @click.self="close()" role="dialog" aria-modal="true">

            <div class="absolute inset-y-0 left-0 w-1/4 flex items-center justify-start" @click="prev()"
                :class="!hasPrev() ? 'pointer-events-none opacity-30' : ''">
                <button type="button" class="ml-6 text-white bg-white/10 hover:bg-white/20 rounded-full p-3"
                    aria-label="Previous image">
                    <i data-lucide="chevron-left" class="w-6 h-6"></i>
                </button>
            </div>

            <div class="absolute inset-y-0 right-0 w-1/4 flex items-center justify-end" @click="next()"
                :class="!hasNext() ? 'pointer-events-none opacity-30' : ''">
                <button type="button" class="mr-6 text-white bg-white/10 hover:bg-white/20 rounded-full p-3"
                    aria-label="Next image">
                    <i data-lucide="chevron-right" class="w-6 h-6"></i>
                </button>
            </div>

            <div class="absolute top-6 right-6">
                <button type="button" class="text-white bg-white/10 hover:bg-white/20 rounded-full p-2"
                    @click="close()" x-ref="closeBtn" aria-label="Close gallery viewer">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <div class="relative max-w-5xl w-full px-6" tabindex="0" x-ref="modal">
                <img :src="current()?.webp_url" :alt="current()?.title || 'Gallery image'"
                    class="max-h-[80vh] w-full object-contain shadow-2xl">
            </div>

            <template x-if="current() && (current()?.title || current()?.description)">
                <div
                    class="absolute bottom-6 left-1/2 -translate-x-1/2 w-[92%] max-w-3xl bg-black/50 backdrop-blur-md text-white text-sm px-4 py-3 text-center">
                    <p class="font-semibold" x-show="current()?.title" x-text="current()?.title"></p>
                    <p class="text-white/80" x-show="current()?.description" x-text="current()?.description"></p>
                </div>
            </template>
        </div>
    </section>

    @if ($otherCategories->isNotEmpty())
        <section class="pb-16">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Other Categories</h3>
                <div class="flex flex-wrap gap-3 text-sm">
                    @foreach ($otherCategories as $otherCategory)
                        <a href="{{ route('gallery.category', $otherCategory->slug) }}"
                            class="text-hw-blue hover:underline">
                            {{ $otherCategory->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <script>
        function galleryGrid({ initialItems = [], nextPageUrl = null, placeholderUrl = '' }) {
            return {
                items: initialItems,
                nextPageUrl,
                placeholderUrl,
                loading: false,
                isOpen: false,
                activeIndex: 0,
                observer: null,
                init() {
                    this.observer = new IntersectionObserver((entries) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                this.loadMore();
                            }
                        });
                    }, { rootMargin: '200px' });

                    if (this.$refs.sentinel) {
                        this.observer.observe(this.$refs.sentinel);
                    }
                },
                current() {
                    return this.items[this.activeIndex] || null;
                },
                open(index) {
                    this.activeIndex = index;
                    this.isOpen = true;
                    document.body.classList.add('overflow-hidden');
                    this.$nextTick(() => {
                        this.$refs.modal.focus();
                        this.preloadNext();
                    });
                },
                close() {
                    this.isOpen = false;
                    document.body.classList.remove('overflow-hidden');
                },
                hasPrev() {
                    return this.activeIndex > 0;
                },
                hasNext() {
                    return this.activeIndex < this.items.length - 1 || this.nextPageUrl;
                },
                async next() {
                    if (this.activeIndex < this.items.length - 1) {
                        this.activeIndex += 1;
                        this.preloadNext();
                        return;
                    }

                    if (this.nextPageUrl) {
                        await this.loadMore();
                        if (this.activeIndex < this.items.length - 1) {
                            this.activeIndex += 1;
                            this.preloadNext();
                        }
                    }
                },
                prev() {
                    if (this.activeIndex > 0) {
                        this.activeIndex -= 1;
                    }
                },
                preloadNext() {
                    const next = this.items[this.activeIndex + 1];
                    if (next && next.webp_url) {
                        const img = new Image();
                        img.src = next.webp_url;
                    }
                },
                handleKeydown(event) {
                    if (!this.isOpen) return;

                    if (event.key === 'Escape') {
                        this.close();
                    } else if (event.key === 'ArrowRight') {
                        this.next();
                    } else if (event.key === 'ArrowLeft') {
                        this.prev();
                    } else if (event.key === 'Tab') {
                        event.preventDefault();
                        this.$refs.closeBtn.focus();
                    }
                },
                async loadMore() {
                    if (this.loading || !this.nextPageUrl) return;
                    this.loading = true;

                    try {
                        const response = await fetch(this.nextPageUrl, {
                            headers: { 'Accept': 'application/json' },
                        });

                        if (!response.ok) throw new Error('Failed');

                        const data = await response.json();
                        if (Array.isArray(data.items)) {
                            this.items.push(...data.items);
                        }
                        this.nextPageUrl = data.next_page_url;

                        if (!this.nextPageUrl && this.observer) {
                            this.observer.disconnect();
                        }
                    } catch (error) {
                    } finally {
                        this.loading = false;
                    }
                },
            }
        }
    </script>
</x-guest-layout>
