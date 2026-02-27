@extends('admin.layout')

@section('header_title', 'Tulis Artikel Baru')

@section('content')
    <div class="max-w-4xl mx-auto" data-aos="fade-up">
        <div class="glass dark:glass-dark rounded-[2.5rem] p-10 border border-white/20 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 blur-3xl -mr-32 -mt-32 rounded-full"></div>

            <div class="flex items-center gap-4 mb-10 relative">
                <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center text-2xl">
                    <i class="fas fa-pen-nib"></i>
                </div>
                <h3 class="text-2xl font-black m-0 tracking-tight text-gradient">Buat Postingan Baru</h3>
            </div>

            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-8 relative">
                @csrf

                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Judul Artikel</label>
                    <input type="text" name="title"
                        class="w-full px-6 py-5 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary outline-none text-lg font-bold text-darkblue dark:text-white"
                        placeholder="Masukkan judul yang menarik..." required>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Gambar Utama
                        (Cover)</label>
                    <div class="relative group cursor-pointer">
                        <input type="file" name="image" id="imgInput"
                            class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer" required>
                        <div
                            class="w-full px-6 py-10 bg-white/5 border-2 border-dashed border-white/10 rounded-3xl flex flex-col items-center justify-center gap-3 group-hover:bg-white/10 group-hover:border-primary/50 transition-all text-center">
                            <i class="fas fa-cloud-upload-alt text-4xl text-slate-500 group-hover:text-primary"></i>
                            <span id="fileNameDisplay" class="text-sm font-medium text-slate-500">Pilih gambar resolusi
                                tinggi (JPG/PNG)</span>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Konten Artikel</label>
                    <textarea name="content" rows="12"
                        class="w-full px-6 py-6 bg-white/5 border border-white/10 rounded-3xl focus:ring-2 focus:ring-primary outline-none text-slate-600 dark:text-slate-300 leading-relaxed font-medium"
                        placeholder="Tuliskan isi artikel Anda di sini..." required></textarea>
                    <p class="text-[10px] text-slate-500 italic ml-1">* Gunakan format teks standar. Editor visual
                        (Summernote) dinonaktifkan untuk konsistensi desain.</p>
                </div>

                <div class="flex flex-col md:flex-row gap-4 pt-6">
                    <a href="{{ route('admin.blogs.index') }}"
                        class="flex-1 py-5 bg-white/5 border border-white/10 text-slate-500 rounded-2xl font-bold text-center hover:bg-white/10 transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="flex-[2] py-5 bg-linear-to-r from-primary to-primary-dark text-white rounded-2xl font-extrabold shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                        <i class="fas fa-paper-plane"></i>
                        <span>Terbitkan Sekarang</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('imgInput').addEventListener('change', function (e) {
            var fileName = this.files[0].name;
            document.getElementById('fileNameDisplay').innerText = fileName;
            document.getElementById('fileNameDisplay').classList.add('text-primary', 'font-bold');
        });
    </script>
@endsection