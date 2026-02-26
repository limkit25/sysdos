<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $site_settings->site_name ?? 'SysDev' }} - Digital Solutions</title>

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

        .sticky-header {
            transition: all 0.3s ease;
        }

        .sticky-header.sticky {
            @apply shadow-lg bg-white dark:bg-darklight py-3;
        }
    </style>
</head>

<body class="antialiased dark:bg-darkmode">

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
                <ul class="flex items-center gap-8">
                    <li><a href="{{ route('home') }}"
                            class="text-sm font-semibold text-darkblue dark:text-white hover:text-primary transition-all relative after:content-[''] after:absolute after:bottom-[-4px] after:left-0 after:w-0 after:h-0.5 after:bg-primary hover:after:w-full after:transition-all">Beranda</a>
                    </li>
                    @foreach($sections as $secLink)
                        @if($secLink->key != 'hero' && $secLink->key != 'contact')
                            <li><a href="#{{ $secLink->key }}"
                                    class="text-sm font-semibold text-darkblue dark:text-white hover:text-primary transition-all relative after:content-[''] after:absolute after:bottom-[-4px] after:left-0 after:w-0 after:h-0.5 after:bg-primary hover:after:w-full after:transition-all">{{ $secLink->label }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>

            <div class="flex items-center gap-6">
                <div class="relative hidden xl:block">
                    <input type="text" placeholder="Cari..."
                        class="glass dark:glass-dark rounded-full pl-4 pr-10 py-1.5 text-sm focus:ring-2 ring-primary/50 outline-0 transition-all w-40 focus:w-60">
                    <i class="fas fa-search absolute top-2.5 right-3 text-primary text-xs"></i>
                </div>

                <div class="flex items-center gap-3">
                    <button id="theme-toggle"
                        class="p-2.5 glass dark:glass-dark rounded-xl text-darkblue dark:text-white hover:text-primary hover:scale-110 transition-all duration-300">
                        <i class="fas fa-sun hidden dark:block"></i>
                        <i class="fas fa-moon dark:hidden block"></i>
                    </button>

                    <a href="{{ route('admin.dashboard') }}"
                        class="hidden xl:block text-xs font-bold text-lightgrey dark:text-slate-400 hover:text-primary uppercase tracking-widest transition-colors">
                        Login
                    </a>

                    <a href="#contact"
                        class="hidden xl:block px-6 py-2.5 bg-linear-to-r from-primary to-primary-dark text-white rounded-xl hover:shadow-xl hover:shadow-primary/40 hover:-translate-y-0.5 transition-all duration-300 text-sm font-bold">
                        Hubungi Kami
                    </a>
                </div>

                <button id="mobile-menu-toggle" class="xl:hidden p-2 group">
                    <div class="flex flex-col gap-1.5 items-end">
                        <div class="w-8 h-0.5 bg-darkblue dark:bg-white transition-all group-hover:w-6"></div>
                        <div class="w-6 h-0.5 bg-darkblue dark:bg-white transition-all"></div>
                        <div class="w-8 h-0.5 bg-darkblue dark:bg-white transition-all group-hover:w-4"></div>
                    </div>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu-overlay"
            class="fixed inset-0 bg-darkmode/60 backdrop-blur-sm z-40 hidden opacity-0 transition-all duration-500">
        </div>

        <!-- Mobile Menu Panel -->
        <div id="mobile-menu-panel"
            class="fixed top-0 right-0 h-full w-80 bg-white/95 dark:bg-darkmode/95 backdrop-blur-xl shadow-2xl z-50 translate-x-full transition-transform duration-500 xl:hidden">
            <div class="flex items-center justify-between p-6 border-b border-black/5 dark:border-white/5">
                <span
                    class="text-xl font-bold text-gradient tracking-tighter">{{ $site_settings->site_name ?? 'Sysdos Digital' }}</span>
                <button id="mobile-menu-close"
                    class="w-10 h-10 rounded-full flex items-center justify-center hover:bg-black/5 dark:hover:bg-white/5 text-darkblue dark:text-white">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <nav class="p-8">
                <ul class="flex flex-col gap-8">
                    <li><a href="{{ route('home') }}"
                            class="text-lg font-bold text-darkblue dark:text-white hover:text-primary transition-colors flex items-center justify-between group">Beranda
                            <i
                                class="fas fa-chevron-right text-xs opacity-0 group-hover:opacity-100 transition-all"></i></a>
                    </li>
                    @foreach($sections as $secLink)
                        @if($secLink->key != 'hero' && $secLink->key != 'contact')
                            <li><a href="#{{ $secLink->key }}"
                                    class="text-lg font-bold text-darkblue dark:text-white hover:text-primary transition-colors flex items-center justify-between group">{{ $secLink->label }}
                                    <i
                                        class="fas fa-chevron-right text-xs opacity-0 group-hover:opacity-100 transition-all"></i></a>
                            </li>
                        @endif
                    @endforeach
                    <li><a href="{{ route('admin.dashboard') }}"
                            class="text-lg font-bold text-darkblue dark:text-white hover:text-primary transition-colors flex items-center justify-between group">Login
                            Admin <i
                                class="fas fa-lock text-xs opacity-0 group-hover:opacity-100 transition-all"></i></a>
                    </li>
                    <li class="mt-8">
                        <a href="#contact"
                            class="block text-center px-6 py-4 bg-linear-to-r from-primary to-accent text-white rounded-2xl font-bold shadow-xl shadow-primary/20 hover:scale-105 transition-transform">Hubungi
                            Kami</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    @foreach($sections as $section)
        @include($section->blade_file)
    @endforeach

    <footer class="bg-white dark:bg-darkmode border-t border-black/5 dark:border-white/5 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-px bg-linear-to-r from-transparent via-primary/30 to-transparent">
        </div>
        <div class="container py-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 mb-20">
                <div class="lg:col-span-5">
                    <a class="flex items-center gap-2 mb-8" href="{{ route('home') }}">
                        @if($site_settings->logo)
                            <img src="{{ asset('storage/' . $site_settings->logo) }}"
                                class="h-10 w-auto object-contain transition-transform group-hover:scale-110"
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
                        @if($site_settings->instagram)
                            <a href="{{ $site_settings->instagram }}"
                                class="w-11 h-11 flex items-center justify-center glass dark:glass-dark rounded-xl text-darkblue dark:text-white hover:bg-primary hover:text-white transition-all shadow-sm">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                        @endif
                        @if($site_settings->facebook)
                            <a href="{{ $site_settings->facebook }}"
                                class="w-11 h-11 flex items-center justify-center glass dark:glass-dark rounded-xl text-darkblue dark:text-white hover:bg-primary hover:text-white transition-all shadow-sm">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>
                        @endif
                        @if($site_settings->twitter)
                            <a href="{{ $site_settings->twitter }}"
                                class="w-11 h-11 flex items-center justify-center glass dark:glass-dark rounded-xl text-darkblue dark:text-white hover:bg-primary hover:text-white transition-all shadow-sm">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <h5 class="mb-8 dark:text-white">Tautan Cepat</h5>
                    <ul class="flex flex-col gap-4">
                        <li><a href="#services"
                                class="group flex items-center gap-2 text-lightgrey hover:text-primary transition-all"><i
                                    class="fas fa-chevron-right text-[10px] transform group-hover:translate-x-1 transition-transform"></i>
                                Layanan</a></li>
                        <li><a href="#portfolio"
                                class="group flex items-center gap-2 text-lightgrey hover:text-primary transition-all"><i
                                    class="fas fa-chevron-right text-[10px] transform group-hover:translate-x-1 transition-transform"></i>
                                Portfolio</a></li>
                        <li><a href="#pricing"
                                class="group flex items-center gap-2 text-lightgrey hover:text-primary transition-all"><i
                                    class="fas fa-chevron-right text-[10px] transform group-hover:translate-x-1 transition-transform"></i>
                                Harga</a></li>
                        <li><a href="#blog"
                                class="group flex items-center gap-2 text-lightgrey hover:text-primary transition-all"><i
                                    class="fas fa-chevron-right text-[10px] transform group-hover:translate-x-1 transition-transform"></i>
                                Artikel</a></li>
                    </ul>
                </div>

                <div class="lg:col-span-4">
                    <h5 class="mb-8 dark:text-white">Informasi Kontak</h5>
                    <div class="flex flex-col gap-6">
                        <div class="flex gap-4 items-start">
                            <div
                                class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <p class="text-lightgrey leading-snug">{{ $site_settings->address ?? '-' }}</p>
                        </div>
                        <div class="flex gap-4 items-center">
                            <div
                                class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <a href="tel:{{ $site_settings->phone }}"
                                class="text-lightgrey hover:text-primary transition-colors">{{ $site_settings->phone ?? '-' }}</a>
                        </div>
                        <div class="flex gap-4 items-center">
                            <div
                                class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <a href="mailto:{{ $site_settings->email }}"
                                class="text-lightgrey hover:text-primary transition-colors">{{ $site_settings->email ?? '-' }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="pt-8 border-t border-black/5 dark:border-white/5 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-lightgrey text-sm">&copy; {{ date('Y') }}
                    {{ $site_settings->site_name ?? 'Sysdos Digital' }}. Seluruh Hak Cipta Dilindungi.
                </p>
                <div class="flex gap-6">
                    <a href="#" class="text-sm text-lightgrey hover:text-primary">Kebijakan Privasi</a>
                    <a href="#" class="text-sm text-lightgrey hover:text-primary">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    @php $wa_number = preg_replace('/[^0-9]/', '', $site_settings->phone ?? ''); @endphp
    @if($wa_number)
        <a href="https://wa.me/{{ $wa_number }}?text=Halo%20Admin,%20saya%20tertarik%20dengan%20jasa%20SysDev."
            class="fixed bottom-8 right-8 w-16 h-16 bg-[#25d366] text-white flex items-center justify-center rounded-full text-3xl shadow-xl hover:scale-110 transition-transform z-[1000]"
            target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
    @endif

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Init AOS
        AOS.init({ once: true, duration: 800 });

        // Preloader
        window.addEventListener('load', function () {
            var preloader = document.getElementById('preloader');
            if (preloader) {
                preloader.style.opacity = '0';
                setTimeout(function () { preloader.style.display = 'none'; }, 500);
            }
        });

        // Sticky Header & Theme Toggle Logic
        const header = document.getElementById('main-header');
        const themeToggle = document.getElementById('theme-toggle');
        const html = document.documentElement;

        window.addEventListener('scroll', () => {
            if (window.scrollY > 80) {
                header.classList.add('sticky', 'shadow-lg', 'bg-white', 'dark:bg-darklight', 'py-3');
                header.classList.remove('bg-transparent', 'py-4');
            } else {
                header.classList.remove('sticky', 'shadow-lg', 'bg-white', 'dark:bg-darklight', 'py-3');
                header.classList.add('bg-transparent', 'py-4');
            }
        });

        // Dark Mode Logic
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }

        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light';
        });

        // Mobile Menu Logic
        const mobileToggle = document.getElementById('mobile-menu-toggle');
        const mobileClose = document.getElementById('mobile-menu-close');
        const mobilePanel = document.getElementById('mobile-menu-panel');
        const mobileOverlay = document.getElementById('mobile-menu-overlay');

        function toggleMobileMenu() {
            mobilePanel.classList.toggle('translate-x-full');
            mobileOverlay.classList.toggle('hidden');
            setTimeout(() => {
                mobileOverlay.classList.toggle('opacity-0');
            }, 10);
            document.body.classList.toggle('overflow-hidden');
        }

        mobileToggle.addEventListener('click', toggleMobileMenu);
        mobileClose.addEventListener('click', toggleMobileMenu);
        mobileOverlay.addEventListener('click', toggleMobileMenu);
    </script>
</body>

</html>