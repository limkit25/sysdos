@extends('admin.layout')

@section('header_title', 'Kelola Partner & Klien')

@section('content')
    <div class="grid lg:grid-cols-12 gap-10" data-aos="fade-up">
        <!-- Form Section -->
        <div class="lg:col-span-4">
            <div class="glass dark:glass-dark rounded-[2.5rem] p-8 border border-white/20 shadow-2xl sticky top-28">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-xl">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <h3 class="text-xl font-bold m-0 tracking-tight text-gradient">Tambah Partner</h3>
                </div>

                <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Nama Partner</label>
                        <input type="text" name="name"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium"
                            placeholder="Nama Perusahaan" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Logo Partner</label>
                        <div class="relative group cursor-pointer">
                            <input type="file" name="logo" id="imgInput"
                                class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer" required>
                            <div
                                class="w-full px-5 py-8 bg-white/5 border-2 border-dashed border-white/10 rounded-2xl flex flex-col items-center justify-center gap-3 group-hover:bg-white/10 group-hover:border-primary/50 transition-all text-center">
                                <i class="fas fa-cloud-upload-alt text-3xl text-slate-500 group-hover:text-primary"></i>
                                <span id="fileNameDisplay" class="text-xs font-medium text-slate-500">PNG Transparan
                                    disarankan</span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-500 uppercase tracking-widest ml-1">Urutan</label>
                        <input type="number" name="order" value="0"
                            class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-2xl focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none text-darkblue dark:text-white font-medium">
                    </div>

                    <button type="submit"
                        class="w-full py-5 bg-linear-to-r from-primary to-primary-dark text-white rounded-2xl font-extrabold shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                        <i class="fas fa-save text-lg"></i>
                        <span>Simpan Partner</span>
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
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3 class="text-xl font-bold m-0 tracking-tight">Daftar Partner</h3>
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
                    @foreach($partners as $partner)
                        <div
                            class="group relative p-6 bg-white/5 rounded-3xl border border-white/5 hover:border-primary/30 transition-all hover:bg-white/10 flex flex-col items-center text-center">
                            <!-- Logo -->
                            <div class="w-full aspect-square flex items-center justify-center p-4">
                                <img src="{{ asset('storage/' . $partner->logo) }}"
                                    class="max-w-full max-h-full object-contain filter grayscale dark:invert brightness-0 group-hover:grayscale-0 group-hover:brightness-100 transition-all duration-500"
                                    alt="Partner">
                            </div>

                            <!-- Name -->
                            <h4 class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-4">{{ $partner->name }}
                            </h4>

                            <!-- Actions -->
                            <div class="absolute top-2 right-2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('admin.partners.edit', $partner->id) }}"
                                    class="w-8 h-8 flex items-center justify-center bg-yellow-500/10 text-yellow-500 hover:bg-yellow-500 hover:text-white rounded-lg transition-all text-xs"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus partner ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-8 h-8 flex items-center justify-center bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all text-xs"
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
        document.getElementById('imgInput').addEventListener('change', function (e) {
            var fileName = this.files[0].name;
            document.getElementById('fileNameDisplay').innerText = fileName;
            document.getElementById('fileNameDisplay').classList.add('text-primary');
        });
    </script>
@endsection