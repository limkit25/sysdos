<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'logo' => 'required|image|max:1024', // <-- Validasi File Gambar (BARU)
            'short_desc' => 'required|max:255',
            'order' => 'nullable|integer',
        ]);

        $logoPath = $request->file('logo')->store('service_logos', 'public'); // <-- Upload File

        Service::create([
            'title' => $request->title,
            'logo' => $logoPath, // <-- Simpan Path Logo
            'short_desc' => $request->short_desc,
            'order' => $request->order ?? 0,
        ]);

        return back()->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'logo' => 'nullable|image|max:1024', // <-- Logo tidak wajib di update
            'short_desc' => 'required|max:255',
            'order' => 'nullable|integer',
        ]);

        $service = Service::findOrFail($id);
        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('logo')) {
            // Hapus logo lama
            if ($service->logo) {
                Storage::disk('public')->delete($service->logo);
            }
            // Upload logo baru
            $data['logo'] = $request->file('logo')->store('service_logos', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        return back()->with('success', 'Layanan dihapus!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }


}
