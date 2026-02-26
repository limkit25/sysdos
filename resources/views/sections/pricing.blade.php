<section id="pricing" class="relative py-24 overflow-hidden">
    <div class="absolute bottom-0 left-0 w-1/3 h-1/3 bg-accent/5 blur-[120px] -z-10"></div>
    <div class="container">
        <div class="text-center mb-16" data-aos="fade-up">
            <div
                class="inline-block px-4 py-1.5 glass dark:glass-dark rounded-full text-xs font-bold uppercase tracking-widest text-primary mb-6">
                Investasi Cerdas
            </div>
            <h2 class="mb-6 text-gradient">Paket Harga Transparan</h2>
            <p class="text-xl font-medium max-w-2xl mx-auto text-lightgrey dark:text-slate-400">
                Pilih paket yang paling sesuai dengan kebutuhan transformasi digital bisnis Anda. No hidden fees.
            </p>
        </div>

        <!-- Toggle Button -->
        <div class="mb-16 flex justify-center" data-aos="fade-up" data-aos-delay="100">
            <div class="glass dark:glass-dark flex p-2 rounded-2xl border border-white/20 dark:border-white/5">
                <button
                    class="pricing-toggle active text-lg font-extrabold cursor-pointer py-3 px-10 rounded-xl transition-all duration-300"
                    data-type="monthly">
                    Bulanan
                </button>
                <button
                    class="pricing-toggle text-lg font-extrabold cursor-pointer py-3 px-10 rounded-xl transition-all duration-300 text-darkblue dark:text-white hover:text-primary"
                    data-type="yearly">
                    Tahunan <span
                        class="ml-2 text-[10px] bg-green-500 text-white px-2 py-0.5 rounded-full uppercase">-20%</span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Info Card -->
            <div class="bg-linear-to-br from-primary to-accent rounded-[40px] p-10 flex flex-col justify-between text-white overflow-hidden relative min-h-[450px] shadow-2xl shadow-primary/30"
                data-aos="fade-right">
                <div class="relative z-10">
                    <h3 class="text-4xl font-extrabold leading-tight mb-8">
                        Hemat hingga <span class="bg-white text-primary px-3 py-1 rounded-2xl">35%</span> dengan Paket
                        Tahunan
                    </h3>
                    <p class="text-white/80 text-lg font-medium">
                        Optimalkan biaya operasional Anda dengan komitmen jangka panjang. Dapatkan fitur eksklusif dan
                        dukungan prioritas.
                    </p>
                </div>
                <div class="relative z-10 mt-10">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center text-2xl">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <p class="font-bold m-0 uppercase tracking-widest text-sm">Enterprise Ready</p>
                    </div>
                </div>
                <div class="absolute bottom-[-10%] right-[-10%] w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                <!-- Deco Icon -->
                <i
                    class="fas fa-gem text-[18rem] opacity-5 absolute -bottom-10 -right-10 leading-none pointer-events-none"></i>
            </div>

            <!-- Packages -->
            @foreach($packages as $key => $pkg)
                <div class="glass dark:glass-dark rounded-[40px] border border-white/20 dark:border-white/5 p-10 shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group {{ $pkg->is_popular ? 'ring-2 ring-primary relative' : '' }}"
                    data-aos="fade-up" data-aos-delay="{{ ($key + 1) * 100 }}">

                    @if($pkg->is_popular)
                        <div
                            class="absolute -top-5 left-1/2 -translate-x-1/2 px-6 py-2 bg-linear-to-r from-primary to-accent text-white text-xs font-black rounded-full shadow-lg shadow-primary/30 uppercase tracking-widest">
                            Most Popular
                        </div>
                    @endif

                    <div class="mb-10 pb-10 border-b border-black/5 dark:border-white/5">
                        <p
                            class="text-xl font-black text-primary uppercase tracking-widest mb-4 group-hover:scale-110 transition-transform origin-left">
                            {{ $pkg->name }}</p>
                        <div class="flex items-end gap-2">
                            <span class="text-5xl font-black text-darkblue dark:text-white tracking-tighter">
                                Rp {{ number_format($pkg->price / 1000, 0) }}k
                            </span>
                            <span class="text-lg font-bold text-lightgrey/50 lowercase mb-1">/{{ $pkg->cycle }}</span>
                        </div>
                    </div>

                    <ul class="flex flex-col gap-5 mb-12">
                        @foreach(explode("\r\n", $pkg->features) as $feature)
                            <li class="flex items-center gap-4">
                                <div
                                    class="w-7 h-7 rounded-full bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all shadow-sm">
                                    <i class="fas fa-check text-[10px]"></i>
                                </div>
                                <p class="text-lg font-medium text-lightgrey dark:text-slate-400 mb-0">{{ $feature }}</p>
                            </li>
                        @endforeach
                    </ul>

                    <a href="{{ $pkg->cta_link ?? '#contact' }}"
                        class="block text-center py-5 w-full rounded-2xl font-black text-lg shadow-xl transition-all duration-300 {{ $pkg->is_popular ? 'bg-linear-to-r from-primary to-accent text-white hover:shadow-primary/40' : 'glass dark:glass-dark text-darkblue dark:text-white hover:bg-primary hover:text-white' }}">
                        Mulai Sekarang
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .pricing-toggle.active {
            @apply bg-primary text-white shadow-lg shadow-primary/30;
        }
    </style>

    <script>
        document.querySelectorAll('.pricing-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.pricing-toggle').forEach(b => {
                    b.classList.remove('active', 'bg-primary', 'text-white', 'shadow-lg', 'shadow-primary/30');
                    b.classList.add('text-darkblue', 'dark:text-white');
                });
                btn.classList.add('active', 'bg-primary', 'text-white', 'shadow-lg', 'shadow-primary/30');
                btn.classList.remove('text-darkblue', 'dark:text-white');
            });
        });
    </script>
</section>