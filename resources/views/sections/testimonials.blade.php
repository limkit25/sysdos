<section id="testimonials" class="scroll-mt-12 bg-secondary dark:bg-darklight overflow-hidden">
    <div class="container relative">
        <div class="text-center mb-12">
            <h2 class="mb-6">Apa Kata Mereka?</h2>
            <p class="text-lg font-normal max-w-2xl mx-auto text-lightgrey">
                Dengarkan pengalaman langsung dari klien-klien kami yang telah mempercayakan proyek mereka kepada kami.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 relative z-10">
            @forelse($testimonials as $key => $testi)
                <div class="bg-white dark:bg-darkmode rounded-lg p-8 shadow-sm hover:shadow-xl transition-all duration-300 group"
                    data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                    <div class="flex items-center gap-1 mb-6 text-primary">
                        @for($i = 0; $i < 5; $i++)
                            <i class="fas fa-star text-sm"></i>
                        @endfor
                    </div>
                    <p class="text-base font-normal mb-8 text-lightgrey leading-relaxed">
                        "{{ $testi->content }}"
                    </p>
                    <div class="flex items-center gap-4">
                        <img src="{{ $testi->photo ? asset('storage/' . $testi->photo) : 'https://ui-avatars.com/api/?background=random&name=' . urlencode($testi->name) }}"
                            alt="{{ $testi->name }}" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h6 class="font-bold text-darkblue dark:text-white mb-0">{{ $testi->name }}</h6>
                            <p class="text-sm text-lightgrey mb-0">{{ $testi->position }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20 bg-white dark:bg-darkmode rounded-lg">
                    <p class="text-lightgrey">Belum ada testimoni.</p>
                </div>
            @endforelse
        </div>

        <!-- Floating Images (Deco) -->
        <div class="absolute -top-20 -left-10 dark:opacity-5 pointer-events-none">
            <img src="{{ asset('images/banner/pattern1.svg') }}" alt="pattern" width="141" height="141"
                onerror="this.style.display='none'">
        </div>
        <div class="absolute -bottom-10 -right-10 dark:opacity-5 z-10 pointer-events-none">
            <img src="{{ asset('images/banner/pattern2.svg') }}" alt="pattern" width="141" height="141"
                onerror="this.style.display='none'">
        </div>
    </div>
</section>