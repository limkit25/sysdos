@extends('admin.layout')

@section('header_title', 'Dashboard Ringkasan')

@section('content')
    <div class="space-y-10" data-aos="fade-up">
        <!-- Welcome Section -->
        <div class="relative overflow-hidden glass dark:glass-dark rounded-[2.5rem] p-10 border border-white/20 shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary/10 rounded-full blur-[100px] -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-accent/10 rounded-full blur-[100px] -ml-32 -mb-32"></div>

            <div class="relative z-10 flex flex-col md:flex-row items-center gap-10">
                <div
                    class="w-32 h-32 rounded-3xl bg-linear-to-br from-primary to-accent p-1 flex-shrink-0 shadow-2xl rotate-3">
                    <div
                        class="w-full h-full rounded-[20px] bg-white dark:bg-darkmode flex items-center justify-center text-4xl text-primary">
                        <i class="fas fa-hand-sparkles"></i>
                    </div>
                </div>
                <div class="text-center md:text-start">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-darkblue dark:text-white mb-4 tracking-tight">
                        Selamat Datang Kembali, <span class="text-gradient">{{ Auth::user()->name }}</span>!
                    </h1>
                    <p class="text-lg text-slate-500 dark:text-slate-400 max-w-2xl m-0 leading-relaxed font-medium">
                        Senang melihat Anda lagi. Panel administrasi Sysdos kini lebih modern, cepat, dan siap membantu Anda
                        mengelola konten website dengan gaya yang elegan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Quick Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Projects Stat -->
            <a href="{{ route('admin.projects.index') }}"
                class="group relative overflow-hidden glass dark:glass-dark rounded-[2rem] p-8 border border-white/10 hover:border-primary/50 transition-all duration-300 hover:-translate-y-2 shadow-xl">
                <div
                    class="absolute top-0 right-0 w-24 h-24 bg-primary/5 rounded-full blur-3xl group-hover:bg-primary/20 transition-colors">
                </div>
                <div class="relative z-10 space-y-4">
                    <div
                        class="w-14 h-14 rounded-2xl bg-blue-500/10 text-blue-500 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <div>
                        <h4 class="text-4xl font-extrabold text-darkblue dark:text-white mb-1 tracking-tighter">
                            {{ $total_projects }}</h4>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-widest m-0">Total Proyek</p>
                    </div>
                    <div
                        class="flex items-center gap-2 text-xs font-bold text-primary opacity-0 group-hover:opacity-100 transition-opacity">
                        <span>Kelola Proyek</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>

            <!-- Services Stat -->
            <a href="{{ route('admin.services.index') }}"
                class="group relative overflow-hidden glass dark:glass-dark rounded-[2rem] p-8 border border-white/10 hover:border-accent/50 transition-all duration-300 hover:-translate-y-2 shadow-xl">
                <div
                    class="absolute top-0 right-0 w-24 h-24 bg-accent/5 rounded-full blur-3xl group-hover:bg-accent/20 transition-colors">
                </div>
                <div class="relative z-10 space-y-4">
                    <div
                        class="w-14 h-14 rounded-2xl bg-purple-500/10 text-purple-500 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        <i class="fas fa-concierge-bell"></i>
                    </div>
                    <div>
                        <h4 class="text-4xl font-extrabold text-darkblue dark:text-white mb-1 tracking-tighter">
                            {{ $total_services }}</h4>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-widest m-0">Layanan Aktif</p>
                    </div>
                    <div
                        class="flex items-center gap-2 text-xs font-bold text-accent opacity-0 group-hover:opacity-100 transition-opacity">
                        <span>Kelola Layanan</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>

            <!-- Testimonials Stat -->
            <a href="{{ route('admin.testimonials.index') }}"
                class="group relative overflow-hidden glass dark:glass-dark rounded-[2rem] p-8 border border-white/10 hover:border-yellow-500/50 transition-all duration-300 hover:-translate-y-2 shadow-xl">
                <div
                    class="absolute top-0 right-0 w-24 h-24 bg-yellow-500/5 rounded-full blur-3xl group-hover:bg-yellow-500/20 transition-colors">
                </div>
                <div class="relative z-10 space-y-4">
                    <div
                        class="w-14 h-14 rounded-2xl bg-yellow-500/10 text-yellow-500 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div>
                        <h4 class="text-4xl font-extrabold text-darkblue dark:text-white mb-1 tracking-tighter">
                            {{ $total_testimonials }}</h4>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-widest m-0">Testimoni Klien</p>
                    </div>
                    <div
                        class="flex items-center gap-2 text-xs font-bold text-yellow-500 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span>Lihat Testimoni</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>

            <!-- Messages Stat -->
            <a href="{{ route('admin.contacts.index') }}"
                class="group relative overflow-hidden glass dark:glass-dark rounded-[2rem] p-8 border border-white/10 hover:border-red-500/50 transition-all duration-300 hover:-translate-y-2 shadow-xl">
                <div
                    class="absolute top-0 right-0 w-24 h-24 bg-red-500/5 rounded-full blur-3xl group-hover:bg-red-500/20 transition-colors">
                </div>
                <div class="relative z-10 space-y-4">
                    <div
                        class="w-14 h-14 rounded-2xl bg-red-500/10 text-red-500 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h4 class="text-4xl font-extrabold text-darkblue dark:text-white mb-1 tracking-tighter">
                            {{ $total_messages }}</h4>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-widest m-0">Pesan Masuk</p>
                    </div>
                    <div
                        class="flex items-center gap-2 text-xs font-bold text-red-500 opacity-0 group-hover:opacity-100 transition-opacity">
                        <span>Buka Inbox</span>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Additional Info / Help Section -->
        <div class="grid md:grid-cols-3 gap-8">
            <div class="md:col-span-2 glass dark:glass-dark rounded-[2.5rem] p-10 border border-white/10 shadow-2xl">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h3 class="text-xl font-bold m-0 tracking-tight">Status Sistem</h3>
                </div>
                <div class="space-y-6">
                    <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl border border-white/5">
                        <div class="flex items-center gap-4">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="font-medium">Halaman Utama</span>
                        </div>
                        <span class="text-xs font-bold text-green-500 uppercase tracking-widest">Normal</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl border border-white/5">
                        <div class="flex items-center gap-4">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="font-medium">Database Connection</span>
                        </div>
                        <span class="text-xs font-bold text-green-500 uppercase tracking-widest">Connected</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl border border-white/5">
                        <div class="flex items-center gap-4">
                            <div class="w-2 h-2 bg-primary rounded-full animate-pulse"></div>
                            <span class="font-medium">Panel Versi</span>
                        </div>
                        <span class="text-xs font-bold text-primary uppercase tracking-widest">v2.0 Premium</span>
                    </div>
                </div>
            </div>

            <div
                class="glass dark:glass-dark rounded-[2.5rem] p-10 border border-white/10 shadow-2xl flex flex-col items-center justify-center text-center space-y-6">
                <div class="w-20 h-20 rounded-full bg-linear-to-br from-primary to-accent p-1 shadow-2xl">
                    <div
                        class="w-full h-full rounded-full bg-white dark:bg-darkmode flex items-center justify-center text-3xl text-primary">
                        <i class="fas fa-question-circle"></i>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-2 tracking-tight">Butuh Bantuan?</h3>
                    <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed font-medium">
                        Hubungi tim pengembang jika Anda memiliki pertanyaan atau kendala pada sistem.
                    </p>
                </div>
                <a href="mailto:support@sysdos.my.id"
                    class="w-full py-4 bg-linear-to-r from-primary to-primary-dark text-white rounded-2xl font-bold shadow-lg shadow-primary/20 hover:scale-[1.02] transition-transform">
                    Email Support
                </a>
            </div>
        </div>
    </div>
@endsection