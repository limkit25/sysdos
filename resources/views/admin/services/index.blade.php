@extends('admin.layout')

@section('header_title', 'Kelola Layanan')

@section('content')
    <div class="grid lg:grid-cols-12 gap-10" data-aos="fade-up">
        <!-- Form Section -->
        <div class="lg:col-span-4">
            <div class="glass dark:glass-dark rounded-[2.5rem] p-8 border border-white/20 shadow-2xl sticky top-28">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-xl">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <h3 class="text-xl font-bold m-0 tracking-tight text-gradient">Tambah Layanan</h3>
                </div>

                <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Nama Layanan</label>
                        <input type="text" name="title"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                            placeholder="Contoh: Web Development" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Ikon
                            (FontAwesome)</label>
                        <input type="text" name="icon"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                            placeholder="Contoh: fas fa-rocket" required>
                        <small class="text-[10px] text-slate-500 ml-1">Cari di <a href="https://fontawesome.com/icons"
                                target="_blank" class="text-primary hover:underline">fontawesome.com</a></small>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Deskripsi
                            Singkat</label>
                        <textarea name="short_desc" rows="4"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium resize-none"
                            placeholder="Jelaskan layanan Anda secara ringkas..." required></textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Urutan</label>
                        <input type="number" name="order" value="0"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                            required>
                    </div>

                    <button type="submit"
                        class="w-full py-5 bg-linear-to-r from-primary to-primary-dark text-white rounded-2xl font-extrabold shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                        <i class="fas fa-save text-lg"></i>
                        <span>Simpan Layanan</span>
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
                            <i class="fas fa-concierge-bell"></i>
                        </div>
                        <h3 class="text-xl font-bold m-0 tracking-tight">Daftar Layanan</h3>
                    </div>
                    <span
                        class="text-xs font-bold bg-white/5 border border-white/10 px-4 py-2 rounded-full text-slate-500 uppercase tracking-widest">
                        {{ $services->count() }} Layanan
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($services as $item)
                        <div
                            class="group relative p-8 bg-white/5 rounded-[2rem] border border-white/5 hover:border-primary/30 transition-all hover:bg-white/10 flex flex-col items-center text-center">
                            <!-- Order -->
                            <div
                                class="absolute top-4 right-4 text-[10px] font-black text-white/10 group-hover:text-primary transition-colors">
                                #{{ $item->order }}
                            </div>

                            <!-- Icon -->
                            <div
                                class="w-16 h-16 rounded-2xl bg-primary/10 text-primary flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform group-hover:bg-primary group-hover:text-white shadow-lg">
                                <i class="{{ $item->icon }}"></i>
                            </div>

                            <!-- Content -->
                            <h4 class="text-xl font-bold text-darkblue dark:text-white mb-3">{{ $item->title }}</h4>
                            <p class="text-sm text-slate-500 leading-relaxed mb-6 line-clamp-3">
                                {{ $item->short_desc }}
                            </p>

                            <!-- Actions -->
                            <div class="mt-auto flex gap-2 pt-6 border-t border-white/5 w-full justify-center">
                                <a href="{{ route('admin.services.edit', $item->id) }}"
                                    class="flex-1 py-3 bg-yellow-500/10 text-yellow-500 hover:bg-yellow-500 hover:text-white rounded-xl transition-all font-bold text-xs"
                                    title="Edit">
                                    <i class="fas fa-edit mr-2"></i> Edit
                                </a>
                                <form action="{{ route('admin.services.destroy', $item->id) }}" method="POST" class="flex-1"
                                    onsubmit="return confirm('Hapus layanan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full py-3 bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white rounded-xl transition-all font-bold text-xs"
                                        title="Hapus">
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