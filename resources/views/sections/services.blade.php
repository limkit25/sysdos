<section id="services" class="relative py-24 overflow-hidden">
    <div class="absolute top-0 right-0 w-1/3 h-1/3 bg-primary/5 blur-[120px] -z-10"></div>
    <div class="container">
        <div class="text-center mb-20" data-aos="fade-up">
            <div
                class="inline-block px-4 py-1.5 glass dark:glass-dark rounded-full text-xs font-bold uppercase tracking-widest text-primary mb-6">
                Layanan Profesional
            </div>
            <h2 class="mb-6 text-gradient">Keahlian Strategis Kami</h2>
            <p class="text-xl font-medium max-w-2xl mx-auto text-lightgrey dark:text-slate-400">
                Kami merancang solusi digital yang tidak hanya terlihat memukau, tapi juga memberikan hasil nyata untuk
                pertumbuhan bisnis Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $key => $service)
                <div class="glass dark:glass-dark rounded-[32px] p-10 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-primary/20 group border border-white/20 dark:border-white/5"
                    data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">

                    <div class="relative mb-10">
                        <div
                            class="w-20 h-20 rounded-2xl bg-linear-to-br from-primary/10 to-accent/10 flex items-center justify-center group-hover:from-primary group-hover:to-accent transition-all duration-500 shadow-inner">
                            <img src="{{ asset('storage/' . $service->logo) }}" alt="{{ $service->title }}"
                                class="w-10 h-10 object-contain brightness-0 group-hover:brightness-0 group-hover:invert transition-all duration-500">
                        </div>
                        <div
                            class="absolute -top-3 -right-3 w-12 h-12 bg-primary/5 rounded-full blur-xl group-hover:bg-primary/20 transition-all">
                        </div>
                    </div>

                    <div class="relative">
                        <h4
                            class="font-extrabold mb-4 text-darkblue dark:text-white text-2xl tracking-tight group-hover:text-primary transition-colors">
                            {{ $service->title }}
                        </h4>
                        <p class="text-lg leading-relaxed text-lightgrey dark:text-slate-400 font-medium">
                            {{ $service->short_desc }}
                        </p>
                    </div>

                    <div class="mt-8 pt-8 border-t border-black/5 dark:border-white/5 flex items-center justify-between">
                        <span
                            class="text-xs font-bold uppercase tracking-widest text-primary/50 group-hover:text-primary">Learn
                            More</span>
                        <div
                            class="w-8 h-8 rounded-full bg-primary/5 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                            <i class="fas fa-arrow-right text-xs"></i>
                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="col-span-full text-center py-20 glass dark:glass-dark rounded-[32px] border border-dashed border-primary/20">
                    <div
                        class="w-20 h-20 bg-primary/5 rounded-full flex items-center justify-center mx-auto mb-6 text-primary text-3xl">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <p class="text-lightgrey text-xl font-medium">Belum ada layanan yang ditambahkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>