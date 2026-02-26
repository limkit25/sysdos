<section id="portfolio" class="scroll-mt-12 bg-secondary dark:bg-darklight overflow-hidden">
    <div class="container relative">
        <div class="mb-4">
            <h2 class="text-center">Proyek Terbaru Kami</h2>
        </div>
        <div class="md:max-w-45 mx-auto mb-8 text-center">
            <p class="text-xl font-normal leading-8">
                Menghadirkan desain dan solusi digital terbaik. Berkreasi, berinovasi, dan berkembang bersama kami.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative z-20">
            @forelse($projects as $key => $project)
                <div class="p-5 bg-white dark:bg-lightdarkblue rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 group"
                    data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                    <div class="w-full mb-4 overflow-hidden rounded-lg">
                        <a href="{{ route('project.show', $project->id) }}">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                                class="w-full aspect-[234/236] object-cover group-hover:scale-105 transition-transform duration-500">
                        </a>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
                            <i class="fas fa-laptop-code text-primary text-xs"></i>
                        </div>
                        <h5 class="text-base font-medium text-darkblue dark:text-white mb-0">
                            {{ $project->title }}
                        </h5>
                    </div>
                </div>
            @empty
                <div
                    class="col-span-full text-center py-20 bg-white dark:bg-lightdarkblue rounded-lg border border-dashed dark:border-white/10">
                    <p class="text-lightgrey">Belum ada project yang ditampilkan saat ini.</p>
                </div>
            @endforelse
        </div>

        <!-- Floating Images (Deco) -->
        <div class="absolute top-28 -left-9 dark:opacity-5 pointer-events-none">
            <img src="{{ asset('images/banner/pattern1.svg') }}" alt="pattern" width="141" height="141"
                onerror="this.style.display='none'">
        </div>
        <div class="absolute -bottom-7 -right-7 dark:opacity-5 z-10 pointer-events-none">
            <img src="{{ asset('images/banner/pattern2.svg') }}" alt="pattern" width="141" height="141"
                onerror="this.style.display='none'">
        </div>
    </div>
</section>