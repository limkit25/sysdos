<section id="contact" class="scroll-mt-12">
    <div class="container">
        <div class="relative">
            <h2 class="mb-10 text-center">Hubungi Kami</h2>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Form Side -->
                <div class="lg:col-span-8">
                    <div
                        class="relative border px-8 py-10 rounded-lg border-black/10 dark:border-white/10 shadow-sm bg-white dark:bg-darklight">
                        @if(session('success'))
                            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg flex items-center gap-3">
                                <i class="fas fa-check-circle"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST"
                            class="flex flex-wrap w-full m-auto justify-between">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full mb-6">
                                <div class="flex flex-col gap-2">
                                    <label for="name" class="text-base font-medium dark:text-white">Nama Lengkap</label>
                                    <input id="name" type="text" name="name" placeholder="Nama Anda" required
                                        class="w-full text-base px-4 py-3 rounded-lg border-black/10 dark:border-white/10 border transition-all duration-300 focus:border-primary outline-0 dark:bg-darkmode dark:text-white">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="email" class="text-base font-medium dark:text-white">Alamat
                                        Email</label>
                                    <input id="email" type="email" name="email" placeholder="contoh@email.com" required
                                        class="w-full text-base px-4 py-3 rounded-lg border-black/10 dark:border-white/10 border transition-all duration-300 focus:border-primary outline-0 dark:bg-darkmode dark:text-white">
                                </div>
                            </div>

                            <div class="w-full mb-8">
                                <label for="message"
                                    class="text-base font-medium dark:text-white mb-2 block">Pesan</label>
                                <textarea id="message" name="message" rows="5"
                                    placeholder="Ceritakan kebutuhan proyek Anda..." required
                                    class="w-full px-5 py-4 rounded-lg border-black/10 dark:border-white/10 border transition-all duration-300 focus:border-primary outline-0 dark:bg-darkmode dark:text-white"></textarea>
                            </div>

                            <button type="submit"
                                class="bg-primary border border-primary px-10 py-4 rounded-lg text-white text-lg font-bold hover:bg-transparent hover:text-primary transition-all duration-300 cursor-pointer">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Info Side -->
                <div class="lg:col-span-4 flex flex-col gap-10 justify-center">
                    <div class="flex gap-5">
                        <div
                            class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-xl flex-shrink-0">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h5 class="text-xl font-bold mb-2 dark:text-white">Alamat Kami</h5>
                            <p class="text-lightgrey leading-relaxed">
                                {!! nl2br(e($site_settings->address ?? '925 Filbert Street Pennsylvania 18072')) !!}
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div
                            class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-xl flex-shrink-0">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h5 class="text-xl font-bold mb-2 dark:text-white">Nomor Telepon</h5>
                            <p class="text-lightgrey">
                                {{ $site_settings->phone ?? '+ 45 34 11 44 11' }}
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div
                            class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary text-xl flex-shrink-0">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h5 class="text-xl font-bold mb-2 dark:text-white">Alamat Email</h5>
                            <p class="text-lightgrey">
                                {{ $site_settings->email ?? 'info@gmail.com' }}
                            </p>
                        </div>
                    </div>

                    <div class="pt-6 border-t dark:border-white/10">
                        <h6 class="text-lg font-bold mb-5 dark:text-white">Ikuti Kami</h6>
                        <div class="flex gap-4">
                            @if(isset($site_settings->facebook))
                                <a href="{{ $site_settings->facebook }}"
                                    class="w-10 h-10 rounded-full bg-darkmode/5 dark:bg-white/10 flex items-center justify-center text-darkblue dark:text-white hover:text-primary transition-all">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                            @if(isset($site_settings->instagram))
                                <a href="{{ $site_settings->instagram }}"
                                    class="w-10 h-10 rounded-full bg-darkmode/5 dark:bg-white/10 flex items-center justify-center text-darkblue dark:text-white hover:text-primary transition-all">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                            @if(isset($site_settings->twitter))
                                <a href="{{ $site_settings->twitter }}"
                                    class="w-10 h-10 rounded-full bg-darkmode/5 dark:bg-white/10 flex items-center justify-center text-darkblue dark:text-white hover:text-primary transition-all">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>