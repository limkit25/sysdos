<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil pengaturan pertama
        $setting = Setting::first(); 
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        // 1. Validasi
        $request->validate([
            'site_name'   => 'required|string|max:255',
            'email'       => 'required|email',
            'phone'       => 'required',
            'address'     => 'required',
            'theme_color' => 'required',
            'logo'        => 'nullable|image|max:1024', // Max 1MB
            'hero_image'  => 'nullable|image|max:2048', // Max 2MB
        ]);

        $setting = Setting::first();
        $data = $request->all();

        // 2. LOGIKA VISIBILITY (CHECKBOX)
        // Checkbox HTML jika tidak dicentang = tidak dikirim.
        // Maka kita cek manual: jika ada di request = 1 (true), jika tidak = 0 (false).
        $data['show_hero']         = $request->has('show_hero');
        $data['show_partners']     = $request->has('show_partners');
        $data['show_services']     = $request->has('show_services');
        $data['show_pricing']      = $request->has('show_pricing');
        $data['show_portfolio']    = $request->has('show_portfolio');
        $data['show_testimonials'] = $request->has('show_testimonials');
        $data['show_contact']      = $request->has('show_contact');

        // 3. LOGIKA UPLOAD LOGO
        if ($request->hasFile('logo')) {
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }
            $data['logo'] = $request->file('logo')->store('settings', 'public');
        }

        // 4. LOGIKA UPLOAD HERO IMAGE
        if ($request->hasFile('hero_image')) {
            if ($setting->hero_image) {
                Storage::disk('public')->delete($setting->hero_image);
            }
            $data['hero_image'] = $request->file('hero_image')->store('settings', 'public');
        }

        // 5. Update Database
        $setting->update($data);

        return back()->with('success', 'Pengaturan website berhasil diperbarui!');
    }
}