@extends('admin.layout')

@section('header_title', 'Kelola Paket Harga')

@section('content')
<div class="grid lg:grid-cols-12 gap-10" data-aos="fade-up">
    <!-- Form Section -->
    <div class="lg:col-span-4">
        <div class="glass dark:glass-dark rounded-[2.5rem] p-8 border border-white/20 shadow-2xl sticky top-28">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-xl">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <h3 class="text-xl font-bold m-0 tracking-tight text-gradient">Tambah Paket</h3>
            </div>

            <form action="{{ route('admin.packages.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Nama Paket</label>
                    <input type="text" name="name" class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium" placeholder="Contoh: Basic Plan" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Harga (Angka)</label>
                        <input type="number" name="price" class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium" placeholder="500000" required>
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Siklus</label>
                        <input type="text" name="cycle" class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium" placeholder="/ bulan" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Fitur (Gunakan Enter)</label>
                    <textarea name="features" rows="4" class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium resize-none" placeholder="Fitur per baris..." required></textarea>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Link Tombol (Opsional)</label>
                    <input type="url" name="cta_link" class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium" placeholder="https://wa.me/...">
                </div>

                <div class="flex items-center gap-3 px-4 py-3 bg-white/5 border border-white/10 rounded-2xl">
                    <input type="checkbox" name="is_popular" value="1" id="is_popular" class="w-5 h-5 accent-primary">
                    <label for="is_popular" class="text-sm font-bold text-slate-500 uppercase tracking-widest cursor-pointer">Set Populer (Best Seller)</label>
                </div>

                <button type="submit" class="w-full py-5 bg-linear-to-r from-primary to-primary-dark text-white rounded-2xl font-extrabold shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                    <i class="fas fa-save text-lg"></i>
                    <span>Simpan Paket</span>
                </button>
            </form>
        </div>
    </div>

    <!-- List Section -->
    <div class="lg:col-span-8">
        <div class="glass dark:glass-dark rounded-[2.5rem] p-8 border border-white/20 shadow-2xl">
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-accent/10 text-accent flex items-center justify-center text-xl">
                        <i class="fas fa-tags"></i>
                    </div>
                    <h3 class="text-xl font-bold m-0 tracking-tight">Daftar Paket</h3>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($packages as $p)
                <div class="group relative p-8 bg-white/5 rounded-[2rem] border border-white/5 hover:border-primary/30 transition-all hover:bg-white/10 flex flex-col {{ $p->is_popular ? 'ring-2 ring-primary/50' : '' }}">
                    @if($p->is_popular)
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-4 py-1 bg-primary text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-lg">
                        Best Seller
                    </div>
                    @endif

                    <div class="text-center mb-6">
                        <h4 class="text-xl font-bold text-darkblue dark:text-white mb-2">{{ $p->name }}</h4>
                        <div class="text-2xl font-black text-primary tracking-tighter">Rp {{ number_format($p->price, 0, ',', '.') }} {{ $p->cycle }}</div>
                    </div>

                    <div class="space-y-3 mb-8">
                        @foreach(explode("\n", $p->features) as $f)
                        <div class="flex items-center gap-3 text-sm text-slate-500 font-medium whitespace-nowrap overflow-hidden">
                            <i class="fas fa-check-circle text-primary text-xs"></i>
                            <span class="truncate">{{ trim($f) }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-auto flex gap-2 pt-6 border-t border-white/5">
                        <a href="{{ route('admin.packages.edit', $p->id) }}" class="flex-1 py-3 bg-yellow-500/10 text-yellow-500 hover:bg-yellow-500 hover:text-white rounded-xl transition-all font-bold text-xs text-center" title="Edit">
                            <i class="fas fa-edit mr-2"></i> Edit
                        </a>
                        <form action="{{ route('admin.packages.destroy', $p->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus paket ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full py-3 bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white rounded-xl transition-all font-bold text-xs text-center" title="Hapus">
                                <i class="fas fa-trash mr-2"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection