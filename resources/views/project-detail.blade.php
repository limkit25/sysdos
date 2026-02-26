<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - {{ $site_settings->site_name ?? 'Sysdos Digital' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --main-color:
                {{ $site_settings->theme_color ?? '#2f73f2' }}
            ;
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #ffffff;
            z-index: 99999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s ease-out;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid var(--main-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="antialiased dark:bg-darkmode text-darkblue dark:text-white">

    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <!-- Header -->
    <header id="main-header"
        class="fixed top-0 py-4 z-50 w-full transition-all duration-500 ease-in-out border-b border-transparent">
        <div class="container flex items-center justify-between gap-10">
            <a class="flex items-center gap-2 group" href="{{ route('home') }}">
                @if($site_settings->logo)
                    <img src="{{ asset('storage/' . $site_settings->logo) }}"
                        class="h-10 w-auto object-contain transition-transform group-hover:scale-110"
                        alt="{{ $site_settings->site_name }}">
                @else
                    <div
                        class="w-10 h-10 bg-linear-to-br from-primary to-accent rounded-xl flex items-center justify-center shadow-lg shadow-primary/30 transform group-hover:rotate-12 transition-transform duration-300">
                        <i class="fas fa-rocket text-white"></i>
                    </div>
                    <span
                        class="text-2xl font-bold text-darkblue dark:text-white tracking-tighter uppercase transition-colors">{{ $site_settings->site_name ?? 'Sysdos Digital' }}</span>
                @endif
            </a>

            <nav class="hidden xl:block">
                <ul class="flex items-center gap-8 text-sm font-bold uppercase tracking-widest">
                    <li><a href="{{ route('home') }}" class="hover:text-primary transition-colors">Beranda</a></li>
                    <li><a href="{{ route('home') }}#services" class="hover:text-primary transition-colors">Layanan</a>
                    </li>
                    <li><a href="{{ route('home') }}#portfolio"
                            class="text-primary hover:text-primary transition-colors">Portfolio</a></li>
                    <li><a href="{{ route('home') }}#blog" class="hover:text-primary transition-colors">Artikel</a></li>
                </ul>
            </nav>

            <div class="flex items-center gap-3">
                <button id="theme-toggle"
                    class="p-2.5 glass dark:glass-dark rounded-xl text-darkblue dark:text-white hover:text-primary hover:scale-110 transition-all duration-300">
                    <i class="fas fa-sun hidden dark:block"></i>
                    <i class="fas fa-moon dark:hidden block"></i>
                </button>
                <a href="{{ route('home') }}#contact"
                    class="hidden md:block px-6 py-2.5 bg-linear-to-r from-primary to-primary-dark text-white rounded-xl font-bold shadow-lg shadow-primary/20 hover:-translate-y-0.5 transition-all text-sm">
                    Hubungi Kami
                </a>
                <button id="mobile-menu-toggle" class="xl:hidden p-2 group">
                    <div class="flex flex-col gap-1.5 items-end">
                        <div class="w-8 h-0.5 bg-darkblue dark:bg-white transition-all group-hover:w-6"></div>
                        <div class="w-6 h-0.5 bg-darkblue dark:bg-white transition-all"></div>
                        <div class="w-8 h-0.5 bg-darkblue dark:bg-white transition-all group-hover:w-4"></div>
                    </div>
                </button>
            </div>
        </div>
    </header>

    <!-- Project Hero Section -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('storage/' . $project->image) }}"
                class="w-full h-full object-cover blur-sm opacity-20 dark:opacity-10" alt="Background">
            <div
                class="absolute inset-0 bg-linear-to-b from-white via-white/50 to-white dark:from-darkmode dark:via-darkmode/50 dark:to-darkmode">
            </div>
        </div>

        <div class="container relative z-10">
            <div class="flex flex-col items-center text-center max-w-4xl mx-auto" data-aos="fade-up">
                <a href="{{ route('home') }}#portfolio"
                    class="inline-flex items-center gap-2 px-4 py-2 glass dark:glass-dark rounded-full mb-8 hover:text-primary transition-all group">
                    <i class="fas fa-arrow-left text-xs group-hover:-translate-x-1 transition-transform"></i>
                    <span class="text-xs font-bold uppercase tracking-widest">Kembali ke Portfolio</span>
                </a>

                <h1 class="text-5xl md:text-7xl font-extrabold text-gradient mb-8 leading-tight">
                    {{ $project->title }}
                </h1>

                <div class="flex flex-wrap justify-center gap-3 mb-10">
                    @if($project->tech_stack)
                        @foreach(explode(',', $project->tech_stack) as $tech)
                            <span
                                class="px-5 py-2 glass dark:glass-dark rounded-xl text-sm font-bold text-primary flex items-center gap-2">
                                <i class="fas fa-code text-xs"></i> {{ trim($tech) }}
                            </span>
                        @endforeach
                    @endif
                </div>

                <div class="w-full aspect-video rounded-[40px] overflow-hidden border-8 border-white/20 dark:border-white/5 shadow-2xl skew-y-1 mb-20"
                    data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover"
                        alt="{{ $project->title }}">
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="pb-32 relative">
        <div class="container">
            <div class="grid lg:grid-cols-12 gap-16">
                <!-- Main Content -->
                <div class="lg:col-span-8" data-aos="fade-right">
                    @if($project->link)
                        <div
                            class="mb-12 glass dark:glass-dark p-8 rounded-3xl border border-primary/10 flex flex-col md:flex-row items-center justify-between gap-6">
                            <div>
                                <h4 class="font-bold text-darkblue dark:text-white mb-2">Lihat Hasil Akhir</h4>
                                <p class="text-lightgrey dark:text-slate-400 text-sm m-0">Project ini sudah live dan dapat
                                    diakses publik.</p>
                            </div>
                            <a href="{{ $project->link }}" target="_blank"
                                class="px-8 py-4 bg-linear-to-r from-primary to-accent text-white rounded-2xl font-bold shadow-xl shadow-primary/20 hover:scale-105 transition-transform flex items-center gap-3 whitespace-nowrap">
                                <i class="fas fa-external-link-alt"></i> Kunjungi Demo
                            </a>
                        </div>
                    @endif

                    <div
                        class="prose prose-lg dark:prose-invert max-w-none prose-headings:font-extrabold prose-headings:text-gradient prose-img:rounded-3xl prose-img:shadow-xl text-lightgrey dark:text-slate-300 leading-relaxed">
                        {!! $project->content !!}
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-4" data-aos="fade-left">
                    <div class="sticky top-32 space-y-8">
                        <!-- Project Meta -->
                        <div
                            class="glass dark:glass-dark p-8 rounded-3xl border border-white/10 shadow-xl overflow-hidden relative">
                            <div
                                class="absolute top-0 right-0 w-32 h-32 bg-primary/5 rounded-full blur-3xl -mr-16 -mt-16">
                            </div>

                            <h5 class="font-extrabold text-darkblue dark:text-white mb-6 flex items-center gap-2">
                                <span class="w-2 h-8 bg-primary rounded-full"></span>
                                Detail Proyek
                            </h5>

                            <div class="space-y-6">
                                <div
                                    class="flex items-start gap-4 p-4 rounded-2xl hover:bg-primary/5 transition-colors group">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary flex-shrink-0 group-hover:scale-110 transition-transform">
                                        <i class="far fa-calendar-alt"></i>
                                    </div>
                                    <div>
                                        <p
                                            class="text-xs font-bold uppercase tracking-widest text-lightgrey dark:text-slate-500 mb-1">
                                            Tanggal Selesai</p>
                                        <p class="font-bold text-darkblue dark:text-white">
                                            {{ $project->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>

                                <div
                                    class="flex items-start gap-4 p-4 rounded-2xl hover:bg-primary/5 transition-colors group">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-orange-500/10 flex items-center justify-center text-orange-500 flex-shrink-0 group-hover:scale-110 transition-transform">
                                        <i class="fas fa-tags"></i>
                                    </div>
                                    <div>
                                        <p
                                            class="text-xs font-bold uppercase tracking-widest text-lightgrey dark:text-slate-500 mb-1">
                                            Kategori</p>
                                        <p class="font-bold text-darkblue dark:text-white">Software Development</p>
                                    </div>
                                </div>

                                <div class="p-6 bg-primary/5 rounded-2xl border border-primary/10 mt-8">
                                    <h6 class="font-bold text-primary mb-3">Teknologi yang Digunakan</h6>
                                    <p class="text-sm font-medium text-lightgrey dark:text-slate-400 mb-0">
                                        {{ $project->tech_stack ?? 'Custom Technology' }}
                                    </p>
                                </div>
                            </div>

                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $site_settings->phone) }}?text=Halo,%20saya%20tertarik%20membuat%20proyek%20serupa%20{{ $project->title }}"
                                target="_blank"
                                class="w-full mt-8 px-6 py-5 bg-linear-to-r from-green-500 to-emerald-600 text-white rounded-2xl font-bold shadow-xl shadow-green-500/20 hover:scale-105 transition-all flex items-center justify-center gap-3">
                                <i class="fab fa-whatsapp text-2xl"></i> Pesan Proyek Serupa
                            </a>
                        </div>

                        <!-- CTA Banner -->
                        <div
                            class="bg-linear-to-br from-primary to-accent p-8 rounded-3xl shadow-2xl text-white relative overflow-hidden group">
                            <div
                                class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10">
                            </div>
                            <h4 class="font-extrabold mb-4 relative z-10">Punya Ide Brilian?</h4>
                            <p class="text-white/80 text-sm mb-6 relative z-10 leading-relaxed">Mari wujudkan ide
                                digital Anda menjadi kenyataan bersama tim ahli kami.</p>
                            <a href="{{ route('home') }}#contact"
                                class="px-6 py-3 bg-white text-primary rounded-xl font-bold text-sm inline-block relative z-10 hover:bg-primary hover:text-white transition-all">Konsultasi
                                Gratis</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white dark:bg-darkmode border-t border-black/5 dark:border-white/5 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-px bg-linear-to-r from-transparent via-primary/30 to-transparent">
        </div>
        <div class="container py-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 mb-20">
                <div class="lg:col-span-5">
                    <a class="flex items-center gap-2 mb-8" href="{{ route('home') }}">
                        @if($site_settings->logo)
                            <img src="{{ asset('storage/' . $site_settings->logo) }}" class="h-10 w-auto object-contain"
                                alt="{{ $site_settings->site_name }}">
                        @else
                            <div
                                class="w-10 h-10 bg-linear-to-br from-primary to-accent rounded-xl flex items-center justify-center shadow-lg shadow-primary/20">
                                <i class="fas fa-rocket text-white"></i>
                            </div>
                            <span
                                class="text-2xl font-bold text-darkblue dark:text-white tracking-tighter uppercase">{{ $site_settings->site_name ?? 'Sysdos Digital' }}</span>
                        @endif
                    </a>
                    <p class="text-lightgrey dark:text-slate-400 text-lg max-w-md mb-8">
                        Membantu bisnis bertransformasi di era digital dengan solusi teknologi yang inovatif dan
                        terukur.
                    </p>
                    <div class="flex gap-4">
                        @if($site_settings->instagram)<a href="{{ $site_settings->instagram }}"
                            class="w-11 h-11 flex items-center justify-center glass dark:glass-dark rounded-xl text-darkblue dark:text-white hover:bg-primary transition-all"><i
                        class="fab fa-instagram"></i></a>@endif
                        @if($site_settings->facebook)<a href="{{ $site_settings->facebook }}"
                            class="w-11 h-11 flex items-center justify-center glass dark:glass-dark rounded-xl text-darkblue dark:text-white hover:bg-primary transition-all"><i
                        class="fab fa-facebook-f"></i></a>@endif
                        @if($site_settings->linkedin)<a href="{{ $site_settings->linkedin }}"
                            class="w-11 h-11 flex items-center justify-center glass dark:glass-dark rounded-xl text-darkblue dark:text-white hover:bg-primary transition-all"><i
                        class="fab fa-linkedin-in"></i></a>@endif
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <h5 class="mb-8 dark:text-white">Tautan Cepat</h5>
                    <ul class="flex flex-col gap-4">
                        <li><a href="{{ route('home') }}#services"
                                class="text-lightgrey hover:text-primary transition-colors flex items-center gap-2"><i
                                    class="fas fa-chevron-right text-[10px]"></i> Layanan</a></li>
                        <li><a href="{{ route('home') }}#portfolio"
                                class="text-lightgrey hover:text-primary transition-colors flex items-center gap-2"><i
                                    class="fas fa-chevron-right text-[10px]"></i> Portfolio</a></li>
                        <li><a href="{{ route('home') }}#blog"
                                class="text-lightgrey hover:text-primary transition-colors flex items-center gap-2"><i
                                    class="fas fa-chevron-right text-[10px]"></i> Artikel</a></li>
                    </ul>
                </div>

                <div class="lg:col-span-4">
                    <h5 class="mb-8 dark:text-white">Informasi Kontak</h5>
                    <div class="flex flex-col gap-6">
                        <div class="flex gap-4 items-start">
                            <div
                                class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                                <i class="fas fa-map-marker-alt"></i></div>
                            <p class="text-lightgrey leading-snug">{{ $site_settings->address ?? '-' }}</p>
                        </div>
                        <div class="flex gap-4 items-center">
                            <div
                                class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                                <i class="fas fa-phone-alt"></i></div>
                            <a href="tel:{{ $site_settings->phone }}"
                                class="text-lightgrey hover:text-primary transition-colors">{{ $site_settings->phone ?? '-' }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="pt-8 border-t border-black/5 dark:border-white/5 flex justify-between items-center text-sm text-lightgrey">
                <p>&copy; {{ date('Y') }} {{ $site_settings->site_name ?? 'Sysdos Digital' }}.</p>
                <div class="flex gap-6"><a href="#">Privasi</a><a href="#">Syarat</a></div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 800 });

        window.addEventListener('load', function () {
            var preloader = document.getElementById('preloader');
            if (preloader) {
                preloader.style.opacity = '0';
                setTimeout(function () { preloader.style.display = 'none'; }, 500);
            }
        });

        const header = document.getElementById('main-header');
        const themeToggle = document.getElementById('theme-toggle');
        const html = document.documentElement;

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('sticky', 'shadow-lg', 'bg-white', 'dark:bg-darklight', 'py-3');
                header.classList.remove('py-4');
            } else {
                header.classList.remove('sticky', 'shadow-lg', 'bg-white', 'dark:bg-darklight', 'py-3');
                header.classList.add('py-4');
            }
        });

        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }

        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light';
        });
    </script>
</body>

</html>