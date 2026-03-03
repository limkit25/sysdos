@extends('admin.layout')

@section('header_title', 'Edit Paket Harga')

@section('content')
    <div class="max-w-2xl mx-auto" data-aos="fade-up">
        <div class="glass dark:glass-dark rounded-[2.5rem] p-8 md:p-10 border border-white/20 shadow-2xl">
            <div class="flex items-center gap-4 mb-10">
                <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center text-2xl">
                    <i class="fas fa-tags"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-black m-0 tracking-tight text-gradient">Edit Paket</h3>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-widest mt-1">{{ $package->name }}</p>
                </div>
            </div>

            <form action="{{ route('admin.packages.update', $package->id) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Nama Paket</label>
                        <input type="text" name="name" value="{{ old('name', $package->name) }}"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                            required>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Harga
                                (Rp)</label>
                            <input type="number" name="price" value="{{ old('price', $package->price) }}"
                                class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                                required>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Siklus</label>
                            <input type="text" name="cycle" value="{{ old('cycle', $package->cycle) }}"
                                class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                                placeholder="Contoh: / bulan" required>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Fitur (Satu per
                            baris)</label>
                        <textarea name="features" rows="6"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium resize-none"
                            required>{{ old('features', $package->features) }}</textarea>
                        <small class="text-[10px] text-slate-500 ml-1">Tekan ENTER untuk memisahkan setiap fitur.</small>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Link Tombol
                            (Opsional)</label>
                        <input type="url" name="cta_link" value="{{ old('cta_link', $package->cta_link) }}"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                            placeholder="https://...">
                    </div>

                    <div class="flex items-center gap-3 p-4 bg-white/5 border border-white/10 rounded-2xl">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_popular" value="1" {{ $package->is_popular ? 'checked' : '' }}
                                class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Set sebagai Paket Populer
                            (Best Seller)</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-10 flex flex-col sm:flex-row items-center justify-end gap-4 border-t border-white/5">
                    <a href="{{ route('admin.packages.index') }}"
                        class="w-full sm:w-auto px-8 py-4 bg-white/5 hover:bg-white/10 text-slate-400 hover:text-white rounded-2xl font-bold transition-all text-sm flex items-center justify-center gap-2">
                        <i class="fas fa-times"></i>
                        <span>Batal</span>
                    </a>
                    <button type="submit"
                        class="w-full sm:w-auto px-10 py-4 bg-linear-to-r from-primary to-primary-dark text-white rounded-2xl font-black shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                        <i class="fas fa-save text-lg"></i>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection