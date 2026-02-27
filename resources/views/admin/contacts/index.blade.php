@extends('admin.layout')

@section('header_title', 'Inbox Pesan Masuk')

@section('content')
    <div class="glass dark:glass-dark rounded-[2.5rem] p-8 border border-white/20 shadow-2xl overflow-hidden"
        data-aos="fade-up">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center text-xl">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold m-0 tracking-tight">Kumpulan Pesan</h3>
                    <p class="text-xs text-slate-500 font-bold uppercase tracking-widest m-0">{{ $contacts->count() }} Pesan
                        Masuk</p>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            @forelse($contacts as $contact)
                <div
                    class="group relative bg-white/5 rounded-[2rem] border border-white/5 hover:border-white/10 transition-all hover:bg-white/10 p-8">
                    <div class="flex flex-col md:flex-row justify-between gap-6">
                        <!-- User Info -->
                        <div class="flex items-start gap-4 flex-1">
                            <div
                                class="w-12 h-12 rounded-2xl bg-linear-to-br from-primary to-accent text-white flex items-center justify-center text-lg font-black shadow-lg">
                                {{ substr($contact->name, 0, 1) }}
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-1">
                                    <h4 class="text-lg font-bold text-darkblue dark:text-white m-0 tracking-tight">
                                        {{ $contact->name }}</h4>
                                    <span
                                        class="text-[10px] font-bold text-slate-500 uppercase tracking-widest bg-white/5 px-2 py-0.5 rounded border border-white/10">
                                        {{ $contact->created_at->format('d M Y') }}
                                    </span>
                                </div>
                                <a href="mailto:{{ $contact->email }}"
                                    class="text-xs font-bold text-primary hover:underline flex items-center gap-2 mb-4">
                                    <i class="fas fa-paper-plane text-[10px]"></i>
                                    {{ $contact->email }}
                                </a>
                                <div
                                    class="relative p-6 bg-white/5 rounded-2xl border border-white/5 italic text-sm text-slate-500 leading-relaxed font-medium">
                                    "{{ $contact->message }}"
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex md:flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity self-start">
                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
                                onsubmit="return confirm('Hapus pesan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-12 h-12 flex items-center justify-center bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white rounded-xl transition-all shadow-lg"
                                    title="Hapus Permanen">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-20 bg-white/5 rounded-[2rem] border-2 border-dashed border-white/10">
                    <i class="fas fa-inbox text-5xl text-slate-500/20 mb-4 block"></i>
                    <p class="text-slate-500 font-bold uppercase tracking-widest">Inbox masih kosong</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection