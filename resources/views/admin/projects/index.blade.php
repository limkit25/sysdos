@extends('admin.layout')

@section('header_title', 'Kelola Proyek')

@section('content')
    <div class="grid lg:grid-cols-12 gap-10" data-aos="fade-up">
        <!-- Form Section -->
        <div class="lg:col-span-5">
            <div class="glass dark:glass-dark rounded-[2.5rem] p-8 border border-white/20 shadow-2xl sticky top-28">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-xl">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <h3 class="text-xl font-bold m-0 tracking-tight text-gradient">Tambah Proyek</h3>
                </div>

                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Judul Proyek</label>
                        <input type="text" name="title"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                            placeholder="Nama Proyek Baru" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Teknologi (Tech
                            Stack)</label>
                        <input type="text" name="tech_stack"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                            placeholder="Contoh: Laravel 12, Tailwind CSS, MySQL">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Deskripsi
                            Singkat</label>
                        <textarea name="description" rows="3"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium resize-none"
                            placeholder="Ringkasan pendek untuk kartu..." required></textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Konten
                            Lengkap</label>
                        <div class="rounded-2xl overflow-hidden border border-white/10">
                            <textarea name="content" class="summernote" required></textarea>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Link Demo
                            (Opsional)</label>
                        <input type="url" name="link"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                            placeholder="https://...">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Gambar
                            Project</label>
                        <div class="relative group cursor-pointer">
                            <input type="file" name="image" id="imgInput"
                                class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer" required>
                            <div
                                class="w-full px-5 py-8 bg-white/5 border-2 border-dashed border-white/10 rounded-2xl flex flex-col items-center justify-center gap-3 group-hover:bg-white/10 group-hover:border-primary/50 transition-all">
                                <i class="fas fa-cloud-upload-alt text-3xl text-slate-500 group-hover:text-primary"></i>
                                <span id="fileNameDisplay" class="text-sm font-medium text-slate-500">Klik atau geser gambar
                                    ke sini</span>
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-5 bg-linear-to-r from-primary to-primary-dark text-white rounded-2xl font-extrabold shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                        <i class="fas fa-save text-lg"></i>
                        <span>Simpan Proyek</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- List Section -->
        <div class="lg:col-span-7">
            <div class="glass dark:glass-dark rounded-[2.5rem] p-8 border border-white/20 shadow-2xl">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-accent/10 text-accent flex items-center justify-center text-xl">
                            <i class="fas fa-list-ul"></i>
                        </div>
                        <h3 class="text-xl font-bold m-0 tracking-tight">Daftar Proyek</h3>
                    </div>
                    <span
                        class="text-xs font-bold bg-white/5 border border-white/10 px-4 py-2 rounded-full text-slate-500 uppercase tracking-widest">
                        {{ $projects->count() }} Data
                    </span>
                </div>

                <div class="space-y-6">
                    @foreach($projects as $project)
                        <div
                            class="group relative flex flex-col md:flex-row items-center gap-6 p-6 bg-white/5 rounded-3xl border border-white/5 hover:border-white/10 transition-all hover:bg-white/10">
                            <!-- Image -->
                            <div
                                class="w-full md:w-32 aspect-video md:aspect-square flex-shrink-0 rounded-2xl overflow-hidden shadow-lg border border-white/10">
                                <img src="{{ asset('storage/' . $project->image) }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    alt="Project">
                            </div>

                            <!-- Info -->
                            <div class="flex-1 text-center md:text-start min-w-0">
                                <h4 class="text-lg font-bold text-darkblue dark:text-white mb-1 truncate">{{ $project->title }}
                                </h4>
                                <div class="flex flex-wrap justify-center md:justify-start gap-4 mb-3">
                                    <span
                                        class="text-[10px] font-bold text-primary uppercase tracking-widest flex items-center gap-1">
                                        <i class="fas fa-code text-[8px]"></i>
                                        {{ $project->tech_stack ?? '-' }}
                                    </span>
                                </div>
                                <p class="text-sm text-slate-500 m-0 line-clamp-2 leading-relaxed">
                                    {{ $project->description }}
                                </p>
                            </div>

                            <!-- Actions -->
                            <div class="flex md:flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('admin.projects.edit', $project->id) }}"
                                    class="p-3 bg-yellow-500/10 text-yellow-500 hover:bg-yellow-500 hover:text-white rounded-xl transition-all shadow-lg"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus proyek ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="p-3 bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white rounded-xl transition-all shadow-lg"
                                        title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        // File upload display name
        document.getElementById('imgInput').addEventListener('change', function (e) {
            var fileName = this.files[0].name;
            document.getElementById('fileNameDisplay').innerText = fileName;
            document.getElementById('fileNameDisplay').classList.add('text-primary');
        });
    </script>
@endsection