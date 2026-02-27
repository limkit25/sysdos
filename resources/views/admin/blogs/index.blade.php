@extends('admin.layout')

@section('header_title', 'Daftar Artikel Blog')

@section('content')
    <div class="space-y-8" data-aos="fade-up">
        <!-- Header Action -->
        <div
            class="flex flex-col md:flex-row items-center justify-between gap-6 glass dark:glass-dark rounded-[2rem] p-6 border border-white/20 shadow-xl">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-xl">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold m-0 tracking-tight">Katalog Artikel</h3>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-widest m-0">{{ $blogs->count() }}
                        Postingan Terbit</p>
                </div>
            </div>
            <a href="{{ route('admin.blogs.create') }}"
                class="w-full md:w-auto px-8 py-4 bg-linear-to-r from-primary to-primary-dark text-white rounded-2xl font-extrabold shadow-lg shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-1 transition-all flex items-center justify-center gap-3">
                <i class="fas fa-plus"></i>
                <span>Tulis Artikel Baru</span>
            </a>
        </div>

        <!-- Blogs Grid/List -->
        <div class="glass dark:glass-dark rounded-[2.5rem] p-8 border border-white/20 shadow-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-white/10">
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-[0.2em]">Thumbnail</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-[0.2em]">Informasi
                                Artikel</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-[0.2em]">Tanggal</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-[0.2em] text-center">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($blogs as $blog)
                            <tr class="group hover:bg-white/5 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="w-20 h-14 rounded-xl overflow-hidden shadow-lg border border-white/10">
                                        <img src="{{ asset('storage/' . $blog->image) }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <h4 class="text-sm font-bold text-darkblue dark:text-white mb-1 tracking-tight">
                                        {{ $blog->title }}</h4>
                                    <span
                                        class="text-[10px] bg-primary/10 text-primary px-2 py-0.5 rounded-full font-bold uppercase tracking-tighter">Published</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span
                                            class="text-sm font-bold text-darkblue dark:text-white">{{ $blog->created_at->format('d M Y') }}</span>
                                        <span
                                            class="text-[10px] text-slate-500 uppercase font-medium">{{ $blog->created_at->diffForHumans() }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                            class="p-3 bg-yellow-500/10 text-yellow-500 hover:bg-yellow-500 hover:text-white rounded-xl transition-all shadow-lg"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus artikel ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-3 bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white rounded-xl transition-all shadow-lg"
                                                title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection