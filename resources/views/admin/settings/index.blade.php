@extends('admin.layout')

@section('header_title', 'Pengaturan Website')

@section('content')
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" data-aos="fade-up">
        @csrf
        @method('PUT')

        <div class="grid lg:grid-cols-12 gap-10">
            <!-- Main Settings -->
            <div class="lg:col-span-8 space-y-10">
                <!-- Identity Section -->
                <div
                    class="glass dark:glass-dark rounded-[2.5rem] p-10 border border-white/20 shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 blur-3xl -mr-32 -mt-32 rounded-full"></div>

                    <div class="flex items-center gap-4 mb-10 relative">
                        <div
                            class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center text-2xl">
                            <i class="fas fa-fingerprint"></i>
                        </div>
                        <h3 class="text-2xl font-black m-0 tracking-tight text-gradient">Identitas Brand</h3>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8 relative">
                        <div class="space-y-4">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Logo
                                Website</label>
                            <div
                                class="flex flex-col items-center gap-6 p-8 bg-white/5 rounded-[2rem] border border-white/10 group cursor-pointer hover:border-primary/30 transition-all">
                                @if($setting->logo)
                                    <div class="p-4 bg-white/5 rounded-2xl shadow-inner border border-white/5">
                                        <img src="{{ asset('storage/' . $setting->logo) }}"
                                            class="h-10 object-contain dark:invert brightness-0">
                                    </div>
                                @endif
                                <div class="relative w-full">
                                    <input type="file" name="logo"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                    <div
                                        class="w-full py-3 bg-primary text-white text-[10px] font-black uppercase tracking-widest text-center rounded-xl shadow-lg shadow-primary/20">
                                        Ganti Logo</div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Nama
                                    Situs</label>
                                <input type="text" name="site_name" value="{{ $setting->site_name }}"
                                    class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none text-darkblue dark:text-white font-bold"
                                    required>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Email
                                    Kontak</label>
                                <input type="email" name="email" value="{{ $setting->email }}"
                                    class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none text-darkblue dark:text-white font-bold"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact & UI Section -->
                <div class="glass dark:glass-dark rounded-[2.5rem] p-10 border border-white/20 shadow-2xl">
                    <div class="flex items-center gap-4 mb-10">
                        <div
                            class="w-12 h-12 rounded-2xl bg-accent/10 text-accent flex items-center justify-center text-2xl">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <h3 class="text-2xl font-black m-0 tracking-tight text-gradient">Kontak & Estetika</h3>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">WhatsApp /
                                    Phone</label>
                                <input type="text" name="phone" value="{{ $setting->phone }}"
                                    class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none text-darkblue dark:text-white font-bold"
                                    required>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Alamat
                                    Kantor</label>
                                <textarea name="address" rows="4"
                                    class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none text-darkblue dark:text-white font-medium resize-none"
                                    required>{{ $setting->address }}</textarea>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Warna
                                    Aksen</label>
                                <div class="flex items-center gap-4 p-4 bg-white/5 border border-white/10 rounded-2xl">
                                    <input type="color" name="theme_color" value="{{ $setting->theme_color ?? '#4dabf7' }}"
                                        class="w-12 h-12 p-1 bg-transparent border-none cursor-pointer">
                                    <span
                                        class="text-sm font-bold text-slate-500 font-mono tracking-widest uppercase">{{ $setting->theme_color ?? '#4dabf7' }}</span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Hero
                                    Background</label>
                                <div class="relative group h-32 rounded-2xl overflow-hidden border border-white/10">
                                    <img src="{{ asset('storage/' . $setting->hero_image) }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                        <input type="file" name="hero_image"
                                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                        <span class="text-[10px] font-black uppercase text-white tracking-[0.2em]">Ganti
                                            Background</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar / Socials -->
            <div class="lg:col-span-4 space-y-10">
                <div class="glass dark:glass-dark rounded-[2.5rem] p-8 border border-white/20 shadow-2xl sticky top-28">
                    <div class="flex items-center gap-4 mb-8">
                        <div
                            class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-500 flex items-center justify-center text-xl">
                            <i class="fab fa-facebook-messenger"></i>
                        </div>
                        <h3 class="text-xl font-black m-0 tracking-tight">Social Media</h3>
                    </div>

                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label
                                class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Facebook</label>
                            <div class="relative">
                                <i class="fab fa-facebook absolute left-5 top-1/2 -translate-y-1/2 text-primary"></i>
                                <input type="url" name="facebook" value="{{ $setting->facebook }}"
                                    class="w-full pl-12 pr-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary outline-none text-xs font-bold">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label
                                class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Instagram</label>
                            <div class="relative">
                                <i class="fab fa-instagram absolute left-5 top-1/2 -translate-y-1/2 text-pink-500"></i>
                                <input type="url" name="instagram" value="{{ $setting->instagram }}"
                                    class="w-full pl-12 pr-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary outline-none text-xs font-bold">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label
                                class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">LinkedIn</label>
                            <div class="relative">
                                <i class="fab fa-linkedin absolute left-5 top-1/2 -translate-y-1/2 text-blue-400"></i>
                                <input type="url" name="linkedin" value="{{ $setting->linkedin }}"
                                    class="w-full pl-12 pr-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary outline-none text-xs font-bold">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold text-slate-500 uppercase tracking-widest ml-1">Twitter /
                                X</label>
                            <div class="relative">
                                <i class="fab fa-twitter absolute left-5 top-1/2 -translate-y-1/2 text-sky-400"></i>
                                <input type="url" name="twitter" value="{{ $setting->twitter }}"
                                    class="w-full pl-12 pr-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary outline-none text-xs font-bold">
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full mt-10 py-5 bg-linear-to-r from-primary to-primary-dark text-white rounded-2xl font-extrabold shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                        <i class="fas fa-save text-lg"></i>
                        <span>Simpan Settings</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection