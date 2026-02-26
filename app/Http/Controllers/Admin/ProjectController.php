<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Menampilkan daftar project
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Menyimpan project baru ke database
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'title'       => 'required|max:255',
            'tech_stack'  => 'nullable|string|max:255', // <--- Baru (Teknologi)
            'description' => 'required',                // Deskripsi Singkat
            'content'     => 'required',                // <--- Baru (Konten Lengkap/Summernote)
            'link'        => 'nullable|url',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Maks 2MB
        ]);

        // 2. Upload Gambar
        $imagePath = $request->file('image')->store('projects', 'public');

        // 3. Simpan ke Database
        Project::create([
            'title'       => $request->title,
            'tech_stack'  => $request->tech_stack,
            'description' => $request->description,
            'content'     => $request->content,
            'link'        => $request->link,
            'image'       => $imagePath,
        ]);

        return back()->with('success', 'Project berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update data project
     */
    public function update(Request $request, $id)
    {
        // 1. Validasi Input
        $request->validate([
            'title'       => 'required|max:255',
            'tech_stack'  => 'nullable|string|max:255',
            'description' => 'required',
            'content'     => 'required',
            'link'        => 'nullable|url',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image tidak wajib saat update
        ]);

        $project = Project::findOrFail($id);
        
        // Siapkan data untuk diupdate
        $data = [
            'title'       => $request->title,
            'tech_stack'  => $request->tech_stack,
            'description' => $request->description,
            'content'     => $request->content,
            'link'        => $request->link,
        ];

        // 2. Cek apakah user mengupload gambar baru?
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari penyimpanan agar server tidak penuh
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            // Upload gambar baru
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        // 3. Update Database
        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui!');
    }

    /**
     * Hapus project
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Hapus gambar dari folder storage
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return back()->with('success', 'Project berhasil dihapus!');
    }
}