<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order', 'asc')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
            'title'       => 'nullable|string|max:100',
            'description' => 'nullable|string|max:255',
            'order'       => 'nullable|integer',
        ]);

        $imagePath = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'image'       => $imagePath,
            'title'       => $request->title,
            'description' => $request->description,
            'order'       => $request->order ?? 0,
        ]);

        return back()->with('success', 'Slide berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image'       => 'nullable|image|mimes:jpeg,png,jpg |max:7000',
            'title'       => 'nullable|string|max:100',
            'description' => 'nullable|string|max:255',
            'order'       => 'nullable|integer',
        ]);

        $slider = Slider::findOrFail($id);
        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            if ($slider->image) Storage::disk('public')->delete($slider->image);
            $data['image'] = $request->file('image')->store('sliders', 'public');
        }

        $slider->update($data);
        return redirect()->route('admin.sliders.index')->with('success', 'Slide diperbarui!');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        if ($slider->image) Storage::disk('public')->delete($slider->image);
        $slider->delete();
        return back()->with('success', 'Slide dihapus!');
    }
}