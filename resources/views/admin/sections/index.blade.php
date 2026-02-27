@extends('admin.layout')

@section('header_title', 'Urutan Section Landing Page')

@section('content')
<div class="glass dark:glass-dark rounded-[2.5rem] p-10 border border-white/20 shadow-2xl" data-aos="fade-up">
    <div class="flex flex-col md:flex-row items-center justify-between gap-6 mb-12">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center text-2xl">
                <i class="fas fa-layer-group"></i>
            </div>
            <div>
                <h3 class="text-2xl font-black m-0 tracking-tight text-gradient">Posisi Tampilan</h3>
                <p class="text-xs text-slate-500 font-bold uppercase tracking-widest mt-1">Ubah angka urutan (1 = Paling Atas)</p>
            </div>
        </div>
        <div class="px-6 py-3 bg-white/5 rounded-2xl border border-white/10 flex items-center gap-3">
            <i class="fas fa-info-circle text-primary"></i>
            <span class="text-xs font-bold text-slate-500 uppercase tracking-widest">Section Aktif: {{ $sections->where('is_visible', 1)->count() }}</span>
        </div>
    </div>

    <form action="{{ route('admin.sections.update') }}" method="POST">
        @csrf
        
        <div class="space-y-4">
            @foreach($sections as $section)
            <div class="group relative flex items-center gap-6 p-6 bg-white/5 rounded-[2rem] border border-white/5 hover:border-white/20 hover:bg-white/10 transition-all">
                <!-- Order Input -->
                <div class="w-20">
                    <input type="number" name="sections[{{ $section->id }}][order]" value="{{ $section->order }}" class="w-full bg-white/5 border border-white/10 rounded-xl px-2 py-3 text-center text-sm font-black text-primary transition-all focus:ring-2 focus:ring-primary outline-none">
                </div>

                <!-- Section Info -->
                <div class="flex-1">
                    <h4 class="text-lg font-bold text-darkblue dark:text-white m-0 tracking-tight">{{ $section->label }}</h4>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mt-1">Sistem ID: {{ $section->id }}</p>
                </div>

                <!-- Visibility Toggle -->
                <div class="flex items-center gap-4">
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] {{ $section->is_visible ? 'text-green-500' : 'text-red-500' }}">
                        {{ $section->is_visible ? 'Visible' : 'Hidden' }}
                    </span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="sections[{{ $section->id }}][is_visible]" value="1" {{ $section->is_visible ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-white/10 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                    </label>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-12 flex justify-end gap-4">
            <button type="submit" class="w-full md:w-auto px-10 py-5 bg-linear-to-r from-primary to-primary-dark text-white rounded-[1.5rem] font-black shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all uppercase tracking-[0.2em] text-xs">
                <i class="fas fa-save mr-3"></i> Simpan Konfigurasi
            </button>
        </div>
    </form>
</div>
@endsection