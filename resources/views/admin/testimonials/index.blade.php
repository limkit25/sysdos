@extends('admin.layout')

@section('header_title', 'Kelola Testimoni')

@section('content')
<div class="grid lg:grid-cols-12 gap-10" data-aos="fade-up">
    <!-- Form Section -->
    <div class="lg:col-span-4">
        <div class="glass dark:glass-dark rounded-[2.5rem] p-8 border border-white/20 shadow-2xl sticky top-28">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-xl">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <h3 class="text-xl font-bold m-0 tracking-tight text-gradient">Tambah Testimoni</h3>
            </div>

            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Nama Klien</label>
                    <input type="text" name="name" class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium" placeholder="Nama Lengkap" required>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Jabatan / Usaha</label>
                    <input type="text" name="position" class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium" placeholder="Contoh: CEO Sysdos" required>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Ulasan / Testimoni</label>
                    <textarea name="content" rows="4" class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium resize-none" placeholder="Apa kata mereka tentang Anda?" required></textarea>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Foto Klien (Opsional)</label>
                    <div class="relative group cursor-pointer">
                        <input type="file" name="photo" id="imgInput" class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer">
                        <div class="w-full px-5 py-6 bg-white/5 border-2 border-dashed border-white/10 rounded-2xl flex flex-col items-center justify-center gap-2 group-hover:bg-white/10 group-hover:border-primary/50 transition-all text-center">
                            <i class="fas fa-user-circle text-2xl text-slate-500 group-hover:text-primary"></i>
                            <span id="fileNameDisplay" class="text-[10px] font-medium text-slate-500 uppercase tracking-widest">Pilih Foto</span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full py-5 bg-linear-to-r from-primary to-primary-dark text-white rounded-2xl font-extrabold shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                    <i class="fas fa-save text-lg"></i>
                    <span>Simpan Testimoni</span>
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
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3 class="text-xl font-bold m-0 tracking-tight">Daftar Testimoni</h3>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($testimonials as $t)
                <div class="group relative p-8 bg-white/5 rounded-[2rem] border border-white/5 hover:border-primary/30 transition-all hover:bg-white/10 flex flex-col items-center text-center">
                    <!-- Message -->
                    <p class="text-sm italic text-slate-500 leading-relaxed mb-6 line-clamp-4 font-medium">
                        "{{ $t->content }}"
                    </p>

                    <!-- Client Info -->
                    <div class="mt-auto flex flex-col items-center gap-3 pt-6 border-t border-white/5 w-full">
                        <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-primary/20 p-1">
                            <img src="{{ $t->photo ? asset('storage/' . $t->photo) : 'https://ui-avatars.com/api/?name='.urlencode($t->name).'&background=random' }}" class="w-full h-full rounded-full object-cover">
                        </div>
                        <div>
                            <h4 class="text-sm font-extrabold text-darkblue dark:text-white m-0 tracking-tight">{{ $t->name }}</h4>
                            <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest m-0">{{ $t->position }}</p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="absolute top-4 right-4 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                        <a href="{{ route('admin.testimonials.edit', $t->id) }}" class="w-8 h-8 flex items-center justify-center bg-yellow-500/10 text-yellow-500 hover:bg-yellow-500 hover:text-white rounded-lg transition-all text-xs" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-8 h-8 flex items-center justify-center bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all text-xs" title="Hapus">
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
    document.getElementById('imgInput').addEventListener('change', function(e){
        var fileName = this.files[0].name;
        document.getElementById('fileNameDisplay').innerText = fileName;
        document.getElementById('fileNameDisplay').classList.add('text-primary');
    });
</script>
@endsection