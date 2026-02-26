@if(isset($partners) && $partners->isNotEmpty())
    <section id="partners" class="scroll-mt-12 py-10 bg-white dark:bg-darkmode overflow-hidden">
        <div class="container relative z-10 mb-10">
            <div class="text-center">
                <p class="text-primary font-bold uppercase tracking-widest text-sm mb-2">Partner & Klien Kami</p>
                <h2 class="mb-0">Dipercaya oleh Perusahaan Terkemuka</h2>
            </div>
        </div>

        <!-- Marquee Slider Container -->
        <div class="relative flex overflow-x-hidden group">
            <div class="py-12 animate-marquee flex items-center gap-20 whitespace-nowrap">
                @foreach($partners->concat($partners) as $partner)
                    <div class="flex-shrink-0">
                        <div class="w-48 h-24 flex items-center justify-center p-4 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-500 transform hover:scale-110">
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}"
                                class="max-w-full max-h-full object-contain">
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Second set for seamless loop -->
            <div class="absolute top-0 py-12 animate-marquee2 flex items-center gap-20 whitespace-nowrap">
                @foreach($partners->concat($partners) as $partner)
                    <div class="flex-shrink-0">
                        <div class="w-48 h-24 flex items-center justify-center p-4 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all duration-500 transform hover:scale-110">
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}"
                                class="max-w-full max-h-full object-contain">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <style>
            @keyframes marquee {
                0% { transform: translateX(0%); }
                100% { transform: translateX(-100%); }
            }
            @keyframes marquee2 {
                0% { transform: translateX(100%); }
                100% { transform: translateX(0%); }
            }
            .animate-marquee {
                animation: marquee 40s linear infinite;
            }
            .animate-marquee2 {
                animation: marquee2 40s linear infinite;
            }
            .group:hover .animate-marquee,
            .group:hover .animate-marquee2 {
                animation-play-state: paused;
            }
        </style>
    </section>
@endif
