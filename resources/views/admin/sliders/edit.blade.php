@extends('admin.layout')

@section('header_title', 'Edit Slide')

@section('content')
    <div class="max-w-2xl mx-auto" data-aos="fade-up">
        <div class="glass dark:glass-dark rounded-[2.5rem] p-8 md:p-10 border border-white/20 shadow-2xl">
            <div class="flex items-center gap-4 mb-10">
                <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center text-2xl">
                    <i class="fas fa-images"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-black m-0 tracking-tight text-gradient">Edit Slide</h3>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-widest mt-1">Hero Section Slider</p>
                </div>
            </div>

            <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Gambar Slide</label>
                        <div class="p-6 bg-white/5 border border-white/10 rounded-3xl space-y-4">
                            <img src="{{ asset('storage/' . $slider->image) }}"
                                class="w-full h-48 object-cover rounded-2xl border border-white/10 shadow-lg mb-4">

                            <div class="relative group cursor-pointer">
                                <input type="file" name="image" id="sliderImg"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                <div
                                    class="w-full py-4 bg-white/5 border border-dashed border-white/20 rounded-xl flex flex-col items-center justify-center group-hover:bg-white/10 transition-all">
                                    <i class="fas fa-cloud-upload-alt text-2xl text-primary mb-2"></i>
                                    <span id="fileNameDisplay"
                                        class="text-xs font-bold text-slate-500 uppercase tracking-widest">Ganti
                                        Gambar...</span>
                                </div>
                            </div>
                            <p class="text-[10px] text-slate-500 text-center uppercase tracking-tighter">Biarkan kosong jika
                                tidak ingin mengganti gambar.</p>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Judul
                            (Opsional)</label>
                        <input type="text" name="title" value="{{ old('title', $slider->title) }}"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                            placeholder="Contoh: Promo Spesial">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Deskripsi Singkat
                            (Opsional)</label>
                        <textarea name="description" rows="3"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium resize-none">{{ old('description', $slider->description) }}</textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Urutan</label>
                        <input type="number" name="order" value="{{ old('order', $slider->order) }}"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium">
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-10 flex flex-col sm:flex-row items-center justify-end gap-4 border-t border-white/5">
                    <a href="{{ route('admin.sliders.index') }}"
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

    <script>
        document.getElementById('sliderImg').addEventListener('change', function (e) {
            var fileName = e.target.files[0] ? e.target.files[0].name : "Ganti Gambar...";
            document.getElementById('fileNameDisplay').innerText = fileName;
        });
    </script>
@endsection