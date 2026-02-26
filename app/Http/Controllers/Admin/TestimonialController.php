<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('testimonials', 'public');
        }

        Testimonial::create($data);

        return back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        if ($testimonial->photo) {
            Storage::disk('public')->delete($testimonial->photo);
        }
        
        $testimonial->delete();
        return back()->with('success', 'Testimoni dihapus!');
    }
    
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image|max:2048', // Photo tidak wajib saat update
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $data = $request->all();

        // Logika Ganti Foto
        if ($request->hasFile('photo')) {
            // 1. Hapus foto lama jika ada
            if ($testimonial->photo) {
                Storage::disk('public')->delete($testimonial->photo);
            }
            // 2. Upload foto baru
            $data['photo'] = $request->file('photo')->store('testimonials', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni diperbarui!');
    }
    // Fitur Edit Sederhana (Opsional, nanti bisa ditambahkan view edit terpisah jika mau)
}
