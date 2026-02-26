<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order')->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'logo' => 'required|image|max:1024', // Maks 1MB
            'order' => 'nullable|integer',
        ]);

        $logoPath = $request->file('logo')->store('partners', 'public');

        Partner::create([
            'name' => $request->name,
            'logo' => $logoPath,
            'order' => $request->order ?? 0,
        ]);

        return back()->with('success', 'Logo Partner berhasil ditambahkan.');
    }

    public function destroy(Partner $partner)
    {
        // Hapus file logo dari storage
        Storage::disk('public')->delete($partner->logo);
        
        // Hapus data dari database
        $partner->delete();

        return back()->with('success', 'Logo Partner berhasil dihapus.');
    }
    // ... method index, store, destroy biarkan ...

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'logo' => 'nullable|image|max:1024', // Logo tidak wajib saat update
            'order' => 'nullable|integer',
        ]);

        $partner = Partner::findOrFail($id);
        $data = [
            'name' => $request->name,
            'order' => $request->order ?? 0,
        ];

        if ($request->hasFile('logo')) {
            // Hapus logo lama
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            // Simpan logo baru
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil diperbarui!');
    }
}