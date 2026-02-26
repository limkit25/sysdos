<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        // Ambil data diurutkan berdasarkan 'order'
        $sections = Section::orderBy('order', 'asc')->get();
        return view('admin.sections.index', compact('sections'));
    }

    public function update(Request $request)
    {
        // Validasi array input
        $request->validate([
            'sections' => 'required|array',
            'sections.*.order' => 'required|integer',
        ]);

        foreach ($request->sections as $id => $data) {
            $section = Section::findOrFail($id);
            $section->update([
                'order' => $data['order'],
                // Cek apakah checkbox dicentang (visibility)
                'is_visible' => isset($data['is_visible']) ? 1 : 0
            ]);
        }

        return back()->with('success', 'Urutan dan status section berhasil disimpan!');
    }
}