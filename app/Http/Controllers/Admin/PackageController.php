<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.packages.index', compact('packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'cycle' => 'required',
            'features' => 'required',
        ]);

        Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'cycle' => $request->cycle,
            'features' => $request->features,
            'cta_link' => $request->cta_link,
            'is_popular' => $request->has('is_popular'), // Cek checkbox
        ]);

        return back()->with('success', 'Paket harga berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);
        
        $data = $request->all();
        // Handle checkbox: jika dicentang nilainya true, jika tidak false
        $data['is_popular'] = $request->has('is_popular'); 

        $package->update($data);

        return redirect()->route('admin.packages.index')->with('success', 'Paket diperbarui!');
    }

    public function destroy($id)
    {
        Package::findOrFail($id)->delete();
        return back()->with('success', 'Paket dihapus!');
    }
}