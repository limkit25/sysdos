@extends('admin.layout')

@section('header_title', 'Edit Artikel')

@section('content')
    <div class="max-w-4xl mx-auto" data-aos="fade-up">
        <div
            class="glass dark:glass-dark rounded-[2.5rem] p-8 md:p-10 border border-white/20 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 blur-3xl -mr-32 -mt-32 rounded-full"></div>

            <div class="flex items-center gap-4 mb-10 relative">
                <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center text-2xl">
                    <i class="fas fa-edit"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-black m-0 tracking-tight text-gradient">Edit Artikel</h3>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-widest mt-1">{{ $blog->title }}</p>
                </div>
            </div>

            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-8 relative">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Judul Artikel</label>
                    <input type="text" name="title" value="{{ old('title', $blog->title) }}"
                        class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                        required>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Gambar Saat
                            Ini</label>
                        <div class="h-48 rounded-2xl overflow-hidden border border-white/10 shadow-lg">
                            <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-widest ml-1">Ganti Gambar
                            (Opsional)</label>
                        <div class="relative group h-48 cursor-pointer">
                            <input type="file" name="image" id="imgInput"
                                class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer">
                            <div
                                class="w-full h-full px-6 py-10 bg-white/5 border-2 border-dashed border-white/10 rounded-2xl flex flex-col items-center justify-center gap-3 group-hover:bg-white/10 group-hover:border-primary/50 transition-all text-center">
                                <i
                                    class="fas fa-cloud-upload-alt text-3xl text-primary group-hover:scale-110 transition-transform"></i>
                                <span id="fileNameDisplay"
                                    class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Klik atau geser
                                    gambar baru</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Konten Artikel</label>
                    <textarea name="content" class="summernote" required>{{ old('content', $blog->content) }}</textarea>
                </div>

                <!-- Action Buttons -->
                <div class="pt-10 flex flex-col sm:flex-row items-center justify-end gap-4 border-t border-white/5">
                    <a href="{{ route('admin.blogs.index') }}"
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
        document.getElementById('imgInput').addEventListener('change', function (e) {
            var fileName = this.files[0] ? this.files[0].name : "Klik atau geser gambar baru";
            document.getElementById('fileNameDisplay').innerText = fileName;
            document.getElementById('fileNameDisplay').classList.add('text-primary');
        });
    </script>
@endsection