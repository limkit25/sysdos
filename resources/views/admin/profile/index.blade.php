@extends('admin.layout')

@section('header_title', 'Biodata & Keamanan Profil')

@section('content')
    <div class="space-y-10" data-aos="fade-up">
        @if ($errors->any())
            <div class="glass border-l-4 border-l-red-500 p-6 rounded-2xl bg-red-500/5">
                <div class="flex items-center gap-3 mb-3 text-red-500">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span class="font-bold uppercase tracking-widest text-xs">Terjadi Kesalahan</span>
                </div>
                <ul class="space-y-1 ml-7">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm text-red-500/80 font-medium">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid lg:grid-cols-2 gap-10">
                <!-- Basic Info -->
                <div
                    class="glass dark:glass-dark rounded-[2.5rem] p-10 border border-white/20 shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 blur-2xl rounded-full -mr-16 -mt-16"></div>

                    <div class="flex items-center gap-4 mb-10 relative">
                        <div
                            class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center text-2xl">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <h3 class="text-2xl font-black m-0 tracking-tight text-gradient">Biodata Admin</h3>
                    </div>

                    <div class="space-y-6 relative">
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Nama
                                Lengkap</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}"
                                class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary outline-none text-darkblue dark:text-white font-bold"
                                required>
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Email
                                Login</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}"
                                class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary outline-none text-darkblue dark:text-white font-bold"
                                required>
                        </div>
                    </div>
                </div>

                <!-- Security Info -->
                <div
                    class="glass dark:glass-dark rounded-[2.5rem] p-10 border border-white/20 shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-red-500/5 blur-2xl rounded-full -mr-16 -mt-16"></div>

                    <div class="flex items-center gap-4 mb-10 relative">
                        <div
                            class="w-12 h-12 rounded-2xl bg-red-500/10 text-red-500 flex items-center justify-center text-2xl">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="text-2xl font-black m-0 tracking-tight text-gradient">Ganti Password</h3>
                    </div>

                    <div class="space-y-6 relative">
                        <div class="p-4 bg-blue-500/5 border border-blue-500/10 rounded-2xl flex gap-4 items-start mb-6">
                            <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                            <p class="text-xs text-blue-500/80 font-medium leading-relaxed">
                                Biarkan kosong jika Anda tidak ingin mengubah password saat ini.
                            </p>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Password
                                Lama</label>
                            <input type="password" name="current_password"
                                class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-red-500 outline-none text-darkblue dark:text-white font-bold"
                                placeholder="••••••••">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Password
                                    Baru</label>
                                <input type="password" name="new_password"
                                    class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-red-500 outline-none text-darkblue dark:text-white font-bold"
                                    placeholder="Min. 6 Karakter">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Konfirmasi</label>
                                <input type="password" name="new_password_confirmation"
                                    class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-red-500 outline-none text-darkblue dark:text-white font-bold"
                                    placeholder="Ulangi Password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit"
                class="w-full mt-10 py-6 bg-linear-to-r from-green-500 to-green-600 text-white rounded-[2rem] font-black shadow-xl shadow-green-500/20 hover:shadow-green-500/40 hover:-translate-y-1 transition-all flex items-center justify-center gap-4 uppercase tracking-[0.2em] text-sm">
                <i class="fas fa-save text-lg"></i>
                <span>Simpan Perubahan Profil</span>
            </button>
        </form>
    </div>
@endsection