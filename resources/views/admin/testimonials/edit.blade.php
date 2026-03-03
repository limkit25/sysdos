@extends('admin.layout')

@section('header_title', 'Edit Testimoni')

@section('content')
    <div class="max-w-2xl mx-auto" data-aos="fade-up">
        <div class="glass dark:glass-dark rounded-[2.5rem] p-8 md:p-10 border border-white/20 shadow-2xl">
            <div class="flex items-center gap-4 mb-10">
                <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center text-2xl">
                    <i class="fas fa-comments"></i>
                </div>
                <div>
                    <h3 class="text-2xl font-black m-0 tracking-tight text-gradient">Edit Testimoni</h3>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-widest mt-1">{{ $testimonial->name }}</p>
                </div>
            </div>

            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST"
                enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Nama
                                Klien</label>
                            <input type="text" name="name" value="{{ old('name', $testimonial->name) }}"
                                class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                                required>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Jabatan /
                                Perusahaan</label>
                            <input type="text" name="position" value="{{ old('position', $testimonial->position) }}"
                                class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                                required>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Isi Testimoni</label>
                        <textarea name="content" rows="4"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium resize-none"
                            required>{{ old('content', $testimonial->content) }}</textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Foto Klien</label>
                        <div class="p-6 bg-white/5 border border-white/10 rounded-3xl space-y-4">
                            <div class="flex items-center gap-6">
                                <div
                                    class="w-20 h-20 rounded-full overflow-hidden border-2 border-primary/20 shadow-lg flex-shrink-0">
                                    @if($testimonial->photo)
                                        <img src="{{ asset('storage/' . $testimonial->photo) }}"
                                            class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary">
                                            <i class="fas fa-user text-2xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 space-y-3">
                                    <div class="relative group cursor-pointer">
                                        <input type="file" name="photo" id="photoInput"
                                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                        <div
                                            class="w-full py-3 bg-white/5 border border-dashed border-white/20 rounded-xl flex items-center justify-center gap-3 group-hover:bg-white/10 transition-all">
                                            <i class="fas fa-camera text-primary"></i>
                                            <span id="fileNameDisplay"
                                                class="text-xs font-bold text-slate-500 uppercase tracking-widest">Ganti
                                                Foto...</span>
                                        </div>
                                    </div>
                                    <p class="text-[10px] text-slate-500 uppercase tracking-tighter">Biarkan kosong jika
                                        tidak ingin mengganti foto.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-10 flex flex-col sm:flex-row items-center justify-end gap-4 border-t border-white/5">
                    <a href="{{ route('admin.testimonials.index') }}"
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
        document.getElementById('photoInput').addEventListener('change', function (e) {
            var fileName = e.target.files[0] ? e.target.files[0].name : "Ganti Foto...";
            document.getElementById('fileNameDisplay').innerText = fileName;
        });
    </script>
@endsection