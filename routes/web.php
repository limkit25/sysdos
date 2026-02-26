<?php

// --- routes/web.php (Bagian Atas File) ---
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController; // Untuk Login
use App\Http\Controllers\ContactController; // Untuk Kirim Pesan Public

// CONTROLLERS ADMIN
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PartnerController; // <-- INI YANG PALING PENTING!



// 1. Halaman Depan (Bisa diakses siapa saja)
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// DETAIL PROJECT (INI YANG KURANG)
Route::get('/project/{id}', [HomeController::class, 'showProject'])->name('project.show');

Route::get('/blog/{slug}', [\App\Http\Controllers\HomeController::class, 'showBlog'])->name('blog.show');

// 2. Route Login & Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/clear-all', function() {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return "Cache berhasil dibersihkan!";
});

// 3. Group Admin (DILINDUNGI PASSWORD)
// Kita tambahkan middleware 'auth' di sini
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 1. Projects
    Route::resource('projects', ProjectController::class);

    // 2. Inbox / Contacts
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::delete('/contacts/{id}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // 3. Testimonials
    Route::resource('testimonials', TestimonialController::class);

    // 4. Services
    Route::resource('services', ServiceController::class);

    // 5. Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // 6. Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

   Route::resource('packages', \App\Http\Controllers\Admin\PackageController::class);
   
Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
Route::get('/sections', [\App\Http\Controllers\Admin\SectionController::class, 'index'])->name('sections.index');
Route::post('/sections', [\App\Http\Controllers\Admin\SectionController::class, 'update'])->name('sections.update');
Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);


    // 7. Partners / Logo Partner <-- INI YANG ERROR
    Route::resource('partners', PartnerController::class, [
        'names' => [
        'index' => 'partners.index',
        'create' => 'partners.create',
        'store' => 'partners.store',
        'show' => 'partners.show',
        'edit' => 'partners.edit',
        'update' => 'partners.update',
        'destroy' => 'partners.destroy',
    ],
        'parameters' => ['partners' => 'partner']
    ]);
});
