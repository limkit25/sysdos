<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|max:2048',
            'content' => 'required',
        ]);

        $imagePath = $request->file('image')->store('blogs', 'public');

        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $imagePath,
            'excerpt' => Str::limit(strip_tags($request->content), 100), // Ambil 100 huruf pertama
            'content' => $request->content,
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Artikel berhasil diterbitkan!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|max:2048',
            'content' => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => \Illuminate\Support\Str::slug($request->title), // Update slug jika judul berubah
            'excerpt' => \Illuminate\Support\Str::limit(strip_tags($request->content), 100),
            'content' => $request->content,
        ];

        if ($request->hasFile('image')) {
            if ($blog->image) Storage::disk('public')->delete($blog->image);
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);
        return redirect()->route('admin.blogs.index')->with('success', 'Artikel diperbarui!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->image) Storage::disk('public')->delete($blog->image);
        $blog->delete();
        return back()->with('success', 'Artikel dihapus!');
    }
    

}
