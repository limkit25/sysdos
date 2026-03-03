@extends('admin.layout')

@section('header_title', 'Edit Project')

@section('content')
    <div class="glass dark:glass-dark rounded-[2.5rem] p-8 md:p-10 border border-white/20 shadow-2xl" data-aos="fade-up">
        <div class="flex items-center gap-4 mb-10">
            <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center text-2xl">
                <i class="fas fa-edit"></i>
            </div>
            <div>
                <h3 class="text-2xl font-black m-0 tracking-tight text-gradient">Edit Project</h3>
                <p class="text-xs text-slate-500 font-bold uppercase tracking-widest mt-1">{{ $project->title }}</p>
            </div>
        </div>

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Left Column: Main Content -->
                <div class="lg:col-span-8 space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Judul Project</label>
                        <input type="text" name="title" value="{{ old('title', $project->title) }}"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                            required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Teknologi (Tech
                            Stack)</label>
                        <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                            placeholder="Contoh: Laravel, Tailwind CSS, Vue.js">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Konten Lengkap /
                            Studi Kasus</label>
                        <textarea name="content" class="summernote"
                            required>{{ old('content', $project->content) }}</textarea>
                    </div>
                </div>

                <!-- Right Column: Metadata & Image -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Deskripsi
                            Singkat</label>
                        <textarea name="description" rows="4"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium resize-none"
                            required>{{ old('description', $project->description) }}</textarea>
                        <small class="text-[10px] text-slate-500 ml-1">Ringkasan untuk kartu di halaman depan.</small>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Link Demo /
                            Ujicoba</label>
                        <input type="url" name="link" value="{{ old('link', $project->link) }}"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                            placeholder=" https://example.com">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Gambar
                            Project</label>
                        <div class="p-4 bg-white/5 border border-white/10 rounded-3xl space-y-4">
                            <img src="{{ asset('storage/' . $project->image) }}"
                                class="w-full h-48 object-cover rounded-2xl border border-white/10 shadow-lg">

                            <div class="relative group cursor-pointer">
                                <input type="file" name="image" id="editImgInput"
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
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="pt-10 flex flex-col sm:flex-row items-center justify-end gap-4 border-t border-white/5">
                <a href="{{ route('admin.projects.index') }}"
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

    <script>
        document.getElementById('editImgInput').addEventListener('change', function (e) {
            var fileName = e.target.files[0] ? e.target.files[0].name : "Ganti Gambar...";
            document.getElementById('fileNameDisplay').innerText = fileName;
        });
    </script>
@endsection