@php
    $site_settings = $site_settings ?? \App\Models\Setting::first();
    $hasSliders = isset($sliders) && $sliders->count() > 0;
@endphp

<section id="hero" class="overflow-hidden pt-32 pb-20 bg-gradient relative">
    <!-- Modern Background Decoration -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full bg-radial-glow z-0"></div>
    <div class="absolute top-[-10%] right-[-5%] w-96 h-96 bg-primary/10 rounded-full blur-[120px] z-0 animate-pulse">
    </div>
    <div class="absolute bottom-[-10%] left-[-5%] w-96 h-96 bg-accent/10 rounded-full blur-[120px] z-0 animate-pulse"
        style="animation-delay: 2s"></div>

    <div class="container relative z-20">
        <div class="relative z-20 grid lg:grid-cols-12 items-center gap-20">
            <!-- Text Content -->
            <div class="lg:col-span-7 {{ $hasSliders ? '' : 'xl:col-span-6' }}">
                <div class="flex flex-col lg:items-start items-center gap-10" data-aos="fade-right">

                    <div class="inline-flex items-center gap-2 px-4 py-2 glass dark:glass-dark rounded-full shadow-sm">
                        <span class="w-2 h-2 bg-primary rounded-full animate-ping"></span>
                        <span
                            class="text-xs font-bold uppercase tracking-widest text-primary">{{ $site_settings->site_name ?? 'Sysdos Digital' }}</span>
                    </div>

                    <h1 class="lg:text-start text-center mb-0 text-gradient leading-[1.1]">
                        @if($hasSliders)
                            {{ $sliders->first()->title }}
                        @else
                            Solusi Digital Inovatif untuk Masa Depan Bisnis Anda
                        @endif
                    </h1>

                    <p
                        class="lg:text-start text-center text-xl font-medium max-w-2xl text-lightgrey dark:text-slate-400">
                        @if($hasSliders)
                            {{ $sliders->first()->description }}
                        @else
                            Kami membantu bisnis Anda bertransformasi dengan teknologi mutakhir, desain yang memukau, dan
                            sistem yang terintegrasi untuk mencapai skalabilitas maksimal.
                        @endif
                    </p>

                    <div class="flex flex-wrap items-center lg:justify-start justify-center gap-6 mt-4">
                        <a href="#contact"
                            class="px-10 py-5 bg-linear-to-r from-primary to-primary-dark text-white rounded-2xl font-extrabold shadow-2xl shadow-primary/30 hover:shadow-primary/50 hover:-translate-y-1 transition-all duration-300 text-lg">
                            Mulai Proyek Sekarang
                        </a>
                        <a href="#portfolio"
                            class="px-10 py-5 glass dark:glass-dark text-darkblue dark:text-white rounded-2xl font-extrabold hover:bg-primary hover:text-white transition-all duration-300 text-lg flex items-center gap-3">
                            <i class="fas fa-play-circle text-2xl text-primary"></i> Lihat Portfolio
                        </a>
                    </div>

                    <!-- Trust Badge -->
                    <div class="flex items-center gap-4 mt-8 pt-8 border-t border-black/5 dark:border-white/5">
                        <div class="flex -space-x-3">
                            @for($i = 1; $i <= 4; $i++)
                                <div
                                    class="w-10 h-10 rounded-full border-2 border-white dark:border-darkmode bg-slate-200 dark:bg-slate-800 flex items-center justify-center overflow-hidden">
                                    <img src="https://i.pravatar.cc/100?img={{$i + 10}}" alt="User">
                                </div>
                            @endfor
                        </div>
                        <div class="text-sm">
                            <div class="flex text-yellow-500 mb-1">
                                @for($i = 0; $i < 5; $i++)<i class="fas fa-star"></i>@endfor
                            </div>
                            <p class="font-bold text-darkblue dark:text-white m-0">Dipercaya oleh 500+ Klien Puas</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Illustration / Slider Column -->
            <div class="lg:col-span-5 relative" data-aos="zoom-in" data-aos-delay="200">
                @if($hasSliders)
                    <div class="relative">
                        <!-- Floating Cards Decoration -->
                        <div
                            class="absolute -top-10 -left-10 glass dark:glass-dark p-6 rounded-3xl shadow-2xl z-20 animate-bounce-slow hidden md:block">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-green-500/20 text-green-500 rounded-full flex items-center justify-center text-xl">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div>
                                    <p
                                        class="text-xs text-lightgrey dark:text-slate-400 font-bold m-0 uppercase tracking-tighter">
                                        Growth</p>
                                    <p class="text-lg font-extrabold text-darkblue dark:text-white m-0">+145%</p>
                                </div>
                            </div>
                        </div>

                        <div class="absolute -bottom-10 -right-10 glass dark:glass-dark p-6 rounded-3xl shadow-2xl z-20 animate-bounce-slow hidden md:block"
                            style="animation-delay: 1s">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 bg-orange-500/20 text-orange-500 rounded-full flex items-center justify-center text-xl">
                                    <i class="fas fa-check-double"></i>
                                </div>
                                <div>
                                    <p
                                        class="text-xs text-lightgrey dark:text-slate-400 font-bold m-0 uppercase tracking-tighter">
                                        Projects</p>
                                    <p class="text-lg font-extrabold text-darkblue dark:text-white m-0">Completed</p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="relative rounded-[40px] overflow-hidden border-8 border-white/20 dark:border-white/5 shadow-2xl group skew-y-3">
                            <div id="heroCarousel" class="carousel slide pointer-events-none" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($sliders as $key => $slider)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <div class="aspect-[600/450] overflow-hidden">
                                                <img src="{{ asset('storage/' . $slider->image) }}"
                                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700"
                                                    alt="{{ $slider->title }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- High-End CSS Animated Illustration -->
                    <div class="relative w-full aspect-square flex items-center justify-center animate-float-slow">
                        <!-- Holographic Rings -->
                        <div class="absolute w-full h-full border-2 border-primary/20 rounded-full animate-spin-slow"></div>
                        <div
                            class="absolute w-[80%] h-[80%] border border-accent/20 rounded-full animate-reverse-spin border-dashed">
                        </div>
                        <div class="absolute w-[60%] h-[60%] border-2 border-primary/10 rounded-full animate-spin-slow"
                            style="animation-duration: 15s"></div>

                        <!-- Core Pulse -->
                        <div
                            class="relative w-40 h-40 bg-linear-to-br from-primary to-accent rounded-full shadow-[0_0_80px_rgba(37,99,235,0.5)] flex items-center justify-center animate-pulse-glow z-10 overflow-hidden">
                            <i class="fas fa-microchip text-7xl text-white/90"></i>
                            <div class="absolute w-full h-full bg-linear-to-t from-white/10 to-transparent"></div>
                        </div>

                        <!-- Orbiting Icons -->
                        <div
                            class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-16 h-16 glass dark:glass-dark rounded-2xl flex items-center justify-center text-2xl text-primary shadow-xl animate-orbit1">
                            <i class="fas fa-code"></i>
                        </div>
                        <div
                            class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2 w-20 h-20 glass dark:glass-dark rounded-3xl flex items-center justify-center text-3xl text-accent shadow-xl animate-orbit2">
                            <i class="fas fa-cloud"></i>
                        </div>
                        <div
                            class="absolute left-0 top-1/2 -translate-x-1/2 -translate-y-1/2 w-14 h-14 glass dark:glass-dark rounded-xl flex items-center justify-center text-xl text-green-500 shadow-xl animate-orbit3">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div
                            class="absolute right-0 top-1/2 translate-x-1/2 -translate-y-1/2 w-18 h-18 glass dark:glass-dark rounded-2xl flex items-center justify-center text-2xl text-orange-500 shadow-xl animate-orbit4">
                            <i class="fas fa-database"></i>
                        </div>

                        <!-- Digital Particles -->
                        <div class="absolute inset-0 pointer-events-none">
                            @for($i = 0; $i < 12; $i++)
                                <div class="absolute w-1 h-1 bg-white rounded-full animate-particle"
                                    style="top: {{ rand(0, 100) }}%; left: {{ rand(0, 100) }}%; animation-delay: {{ $i * 0.5 }}s">
                                </div>
                            @endfor
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes bounce-slow {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    @keyframes spin-slow {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes reverse-spin {
        from {
            transform: rotate(360deg);
        }

        to {
            transform: rotate(0deg);
        }
    }

    @keyframes pulse-glow {

        0%,
        100% {
            transform: scale(1);
            box-shadow: 0 0 80px rgba(37, 99, 235, 0.5);
        }

        50% {
            transform: scale(1.05);
            box-shadow: 0 0 120px rgba(139, 92, 246, 0.6);
        }
    }

    @keyframes float-slow {

        0%,
        100% {
            transform: translateY(0) rotate(0);
        }

        33% {
            transform: translateY(-10px) rotate(1deg);
        }

        66% {
            transform: translateY(5px) rotate(-1deg);
        }
    }

    @keyframes particle {
        0% {
            opacity: 0;
            transform: translateY(0);
        }

        50% {
            opacity: 0.8;
        }

        100% {
            opacity: 0;
            transform: translateY(-40px);
        }
    }

    @keyframes orbit1 {
        0% {
            transform: translate(-50%, -50%) rotate(0deg) translateX(180px) rotate(0deg);
        }

        100% {
            transform: translate(-50%, -50%) rotate(360deg) translateX(180px) rotate(-360deg);
        }
    }

    @keyframes orbit2 {
        0% {
            transform: translate(-50%, 50%) rotate(0deg) translateX(-200px) rotate(0deg);
        }

        100% {
            transform: translate(-50%, 50%) rotate(-360deg) translateX(-200px) rotate(360deg);
        }
    }

    @keyframes orbit3 {
        0% {
            transform: translate(-50%, -50%) rotate(90deg) translateX(150px) rotate(-90deg);
        }

        100% {
            transform: translate(-50%, -50%) rotate(450deg) translateX(150px) rotate(-450deg);
        }
    }

    @keyframes orbit4 {
        0% {
            transform: translate(50%, -50%) rotate(-90deg) translateX(160px) rotate(90deg);
        }

        100% {
            transform: translate(50%, -50%) rotate(270deg) translateX(160px) rotate(-270deg);
        }
    }

    .animate-bounce-slow {
        animation: bounce-slow 4s ease-in-out infinite;
    }

    .animate-spin-slow {
        animation: spin-slow 20s linear infinite;
    }

    .animate-reverse-spin {
        animation: reverse-spin 15s linear infinite;
    }

    .animate-pulse-glow {
        animation: pulse-glow 3s ease-in-out infinite;
    }

    .animate-float-slow {
        animation: float-slow 6s ease-in-out infinite;
    }

    .animate-particle {
        animation: particle 3s linear infinite;
    }

    .animate-orbit1 {
        animation: orbit1 12s linear infinite;
    }

    .animate-orbit2 {
        animation: orbit2 18s linear infinite;
    }

    .animate-orbit3 {
        animation: orbit3 15s linear infinite;
    }

    .animate-orbit4 {
        animation: orbit4 14s linear infinite;
    }
</style>