<section id="blog" class="scroll-mt-12 bg-white dark:bg-darkmode">
    <div class="container relative">
        <div class="text-center mb-12">
            <h2 class="mb-6">Artikel Terbaru</h2>
            <p class="text-lg font-normal max-w-2xl mx-auto text-lightgrey">
                Wawasan terbaru seputar teknologi dan perkembangan dunia digital.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative z-10">
            @forelse($blogs as $key => $blog)
                <div class="bg-white dark:bg-darkmode rounded-lg overflow-hidden border border-black/10 dark:border-white/10 shadow-sm hover:shadow-xl transition-all duration-300 group"
                    data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                    <div class="overflow-hidden aspect-[400/250]">
                        <a href="{{ route('blog.show', $blog->slug) }}">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <span
                                class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full uppercase">Technology</span>
                            <span class="text-xs text-lightgrey">{{ $blog->created_at->format('M d, Y') }}</span>
                        </div>
                        <h4 class="text-xl font-bold mb-4 line-clamp-2">
                            <a href="{{ route('blog.show', $blog->slug) }}"
                                class="text-darkblue dark:text-white hover:text-primary transition-colors">
                                {{ $blog->title }}
                            </a>
                        </h4>
                        <p class="text-base text-lightgrey mb-6 line-clamp-3">
                            {{ $blog->excerpt }}
                        </p>
                        <a href="{{ route('blog.show', $blog->slug) }}"
                            class="inline-flex items-center gap-2 font-bold text-primary group-hover:translate-x-2 transition-transform">
                            Baca Selengkapnya <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20 bg-secondary dark:bg-darklight rounded-lg">
                    <p class="text-lightgrey">Belum ada artikel terbaru.</p>
                </div>
            @endforelse
        </div>

        <!-- Floating Images (Deco) -->
        <div class="absolute -top-20 -right-10 dark:opacity-5 pointer-events-none">
            <img src="{{ asset('images/banner/pattern1.svg') }}" alt="pattern" width="141" height="141"
                onerror="this.style.display='none'">
        </div>
    </div>
</section>