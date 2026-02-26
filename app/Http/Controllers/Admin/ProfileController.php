<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function update(Request $request)
    {
        $user = Auth::user(); // Ambil data user yang sedang login

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id, // Email tidak boleh sama dengan orang lain, kecuali punya sendiri
        ]);

        // 1. Update Nama & Email
        $user->name = $request->name;
        $user->email = $request->email;

        // 2. Cek apakah user mau ganti password?
        if ($request->filled('current_password') || $request->filled('new_password')) {
            
            $request->validate([
                'current_password' => 'required',
                'new_password'     => 'required|min:6|confirmed', // confirmed artinya harus sama dengan field new_password_confirmation
            ]);

            // Cek Password Lama Benar/Salah
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password lama tidak sesuai!']);
            }

            // Update Password
            $user->password = Hash::make($request->new_password);
        }

        $user->save(); // Simpan ke database

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
