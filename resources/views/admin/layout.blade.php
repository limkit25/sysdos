<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $site_settings->site_name ?? 'Sysdos' }} Admin Panel</title>

  <!-- Google Fonts: DM Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
    rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Summernote (Wait, summernote needs jQuery and Bootstrap, let's keep assets but refactor layout) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css">

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    :root {
      --sidebar-width: 280px;
    }

    body {
      font-family: 'DM Sans', sans-serif;
    }

    .admin-sidebar {
      width: var(--sidebar-width);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @media (max-width: 1024px) {
      .admin-sidebar {
        transform: translateX(-100%);
      }

      .sidebar-open .admin-sidebar {
        transform: translateX(0);
      }

      .sidebar-open .sidebar-overlay {
        display: block;
      }
    }

    .nav-link-admin {
      @apply flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-slate-400 hover:text-white hover:bg-white/10;
    }

    .nav-link-admin.active {
      @apply text-white bg-linear-to-r from-primary to-accent shadow-lg shadow-primary/20;
    }
  </style>
</head>

<body class="bg-surface text-darkblue dark:text-slate-200 transition-colors duration-300 overflow-x-hidden">

  <div class="flex min-h-screen">
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay fixed inset-0 bg-black/50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside
      class="admin-sidebar fixed lg:static inset-y-0 left-0 z-50 glass dark:glass-dark border-r border-white/10 flex flex-col">
      <div class="p-6 text-center">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex flex-col items-center gap-3 group">
          @if(isset($site_settings) && $site_settings->logo)
            <img src="{{ asset('storage/' . $site_settings->logo) }}" alt="Logo"
              class="h-12 w-auto object-contain transition-transform group-hover:scale-110">
          @endif
          <span class="text-xl font-bold text-darkblue dark:text-white tracking-tighter uppercase whitespace-nowrap">
            {{ $site_settings->site_name ?? 'Sysdos' }}
          </span>
          <span
            class="text-[10px] bg-primary/10 text-primary px-3 py-1 rounded-full font-bold tracking-widest uppercase">Admin
            Panel</span>
        </a>
      </div>

      <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto overflow-x-hidden custom-scrollbar">
        <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4">Utama</p>

        <a href="{{ route('admin.dashboard') }}"
          class="nav-link-admin {{ request()->routeIs('admin.dashboard') ? 'nav-link-admin-active' : '' }}">
          <i class="fas fa-tachometer-alt w-5 text-center"></i>
          <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.sliders.index') }}"
          class="nav-link-admin {{ request()->routeIs('admin.sliders.*') ? 'nav-link-admin-active' : '' }}">
          <i class="fas fa-images w-5 text-center"></i>
          <span>Hero Slider</span>
        </a>

        <a href="{{ route('admin.projects.index') }}"
          class="nav-link-admin {{ request()->routeIs('admin.projects.*') ? 'nav-link-admin-active' : '' }}">
          <i class="fas fa-th w-5 text-center"></i>
          <span>Proyek</span>
        </a>

        <a href="{{ route('admin.services.index') }}"
          class="nav-link-admin {{ request()->routeIs('admin.services.*') ? 'nav-link-admin-active' : '' }}">
          <i class="fas fa-concierge-bell w-5 text-center"></i>
          <span>Layanan</span>
        </a>

        <a href="{{ route('admin.packages.index') }}"
          class="nav-link-admin {{ request()->routeIs('admin.packages.*') ? 'nav-link-admin-active' : '' }}">
          <i class="fas fa-tags w-5 text-center"></i>
          <span>Paket Harga</span>
        </a>

        <a href="{{ route('admin.testimonials.index') }}"
          class="nav-link-admin {{ request()->routeIs('admin.testimonials.*') ? 'nav-link-admin-active' : '' }}">
          <i class="fas fa-comments w-5 text-center"></i>
          <span>Testimoni</span>
        </a>

        <a href="{{ route('admin.blogs.index') }}"
          class="nav-link-admin {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
          <i class="fas fa-newspaper w-5 text-center"></i>
          <span>Blog</span>
        </a>

        <a href="{{ route('admin.partners.index') }}"
          class="nav-link-admin {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
          <i class="fas fa-handshake w-5 text-center"></i>
          <span>Partner</span>
        </a>

        <a href="{{ route('admin.contacts.index') }}"
          class="nav-link-admin {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
          <i class="fas fa-envelope w-5 text-center"></i>
          <span>Inbox</span>
        </a>

        <div class="pt-6">
          <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4">Pengaturan</p>

          <a href="{{ route('admin.profile.index') }}"
            class="nav-link-admin {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
            <i class="fas fa-user-cog w-5 text-center"></i>
            <span>Edit Profil</span>
          </a>

          <a href="{{ route('admin.settings.index') }}"
            class="nav-link-admin {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <i class="fas fa-cogs w-5 text-center"></i>
            <span>Settings</span>
          </a>

          <a href="{{ route('admin.sections.index') }}"
            class="nav-link-admin {{ request()->routeIs('admin.sections.*') ? 'active' : '' }}">
            <i class="fas fa-layer-group w-5 text-center"></i>
            <span>Posisi Section</span>
          </a>
        </div>
      </nav>

      <div class="p-6 mt-auto border-t border-white/5">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit"
            class="w-full flex items-center justify-center gap-3 px-4 py-3 rounded-xl bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white transition-all duration-300 font-bold">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
          </button>
        </form>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col min-w-0">
      <!-- Header -->
      <header
        class="glass dark:glass-dark sticky top-0 z-30 px-6 py-4 border-b border-white/5 flex items-center justify-between backdrop-blur-md">
        <div class="flex items-center gap-4">
          <button onclick="toggleSidebar()"
            class="p-2 lg:hidden text-darkblue dark:text-white hover:bg-white/10 rounded-lg">
            <i class="fas fa-bars"></i>
          </button>
          <h2 class="text-xl font-bold m-0 hidden md:block">
            @yield('header_title', 'Admin Dashboard')
          </h2>
        </div>

        <div class="flex items-center gap-6">
          <!-- Live Site Link -->
          <a href="{{ route('home') }}" target="_blank"
            class="hidden sm:flex items-center gap-2 text-sm font-bold text-primary hover:text-accent transition-colors">
            <i class="fas fa-external-link-alt"></i>
            <span>Lihat Web</span>
          </a>

          <!-- Theme Toggle -->
          <button id="theme-toggle"
            class="p-2 bg-white/5 hover:bg-white/10 text-darkblue dark:text-white rounded-xl shadow-lg border border-white/20">
            <i class="fas fa-sun hidden dark:block"></i>
            <i class="fas fa-moon dark:hidden"></i>
          </button>

          <!-- User Profile -->
          <div class="flex items-center gap-3 pl-6 border-l border-white/10">
            <div class="text-end hidden sm:block">
              <p class="text-sm font-bold m-0 text-darkblue dark:text-white">{{ Auth::user()->name ?? 'Administrator' }}
              </p>
              <p class="text-[10px] text-slate-500 m-0 uppercase font-bold tracking-tighter">Superadmin</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-linear-to-br from-primary to-accent p-[2px]">
              <div
                class="w-full h-full rounded-[10px] bg-white dark:bg-darkmode flex items-center justify-center overflow-hidden">
                <img
                  src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'A') }}&background=6366f1&color=fff"
                  alt="User">
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Page Content -->
      <div class="p-4 md:p-8 flex-1">
        <div class="max-w-7xl mx-auto space-y-8">
          @if(session('success'))
            <div class="p-4 bg-green-500/10 border border-green-500/20 text-green-500 rounded-2xl flex items-center gap-3"
              data-aos="fade-down">
              <i class="fas fa-check-circle text-xl"></i>
              <p class="m-0 font-bold">{{ session('success') }}</p>
            </div>
          @endif

          @if ($errors->any())
            <div class="p-4 bg-red-500/10 border border-red-500/20 text-red-500 rounded-2xl" data-aos="fade-down">
              <div class="flex items-center gap-3 mb-2">
                <i class="fas fa-exclamation-circle text-xl"></i>
                <p class="m-0 font-bold uppercase text-xs tracking-widest">Ada Masalah:</p>
              </div>
              <ul class="mb-0 text-sm opacity-90">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          @yield('content')
        </div>
      </div>

      <!-- Footer -->
      <footer class="p-6 text-center border-t border-white/5 opacity-50 text-xs">
        &copy; {{ date('Y') }} {{ $site_settings->site_name ?? 'Sysdos' }} Digital.
        <span class="hidden sm:inline">Built for performance and elegance.</span>
      </footer>
    </main>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

  <script>
    // Init AOS
    AOS.init({ duration: 800, once: true });

    // Sidebar Toggle
    function toggleSidebar() {
      document.body.classList.toggle('sidebar-open');
    }

    // Theme Toggle Logic
    const themeToggleBtn = document.getElementById('theme-toggle');

    if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
    }

    themeToggleBtn.addEventListener('click', () => {
      document.documentElement.classList.toggle('dark');
      localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
    });

    // Init Summernote
    $(document).ready(function () {
      $('.summernote').summernote({
        placeholder: 'Tulis konten Anda di sini...',
        tabsize: 2,
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ],
        styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6']
      });

      // Summernote Custom Styling for Tailwind
      $('.note-editor').addClass('note-custom-editor rounded-2xl border-white/10 overflow-hidden');
      $('.note-toolbar').addClass('glass dark:glass-dark border-none flex flex-wrap gap-1 p-2');
      $('.note-btn').addClass('glass dark:glass-dark border border-white/10 rounded-lg hover:bg-primary hover:text-white transition-all');
    });
  </script>
</body>

</html>