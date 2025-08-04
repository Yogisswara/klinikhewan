<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Doctor;

class DokterController extends Controller
{
    public function index()
    {
        // Ambil semua user dengan role 'dokter'
        $dokters = User::where('role', 'dokter')->with('doctor')->paginate(5);
        return view('admin.kelola-dokter', compact('dokters'));
    }

    public function showPublic()
    {
        // Untuk halaman user/home
        $dokters = User::where('role', 'dokter')->with('doctor')->get();
        return view('doctor', compact('dokters'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20|unique:users,phone',
            'password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'specialist' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('dokter_images', 'public');
        }
        // ⬇ Simpan dulu ke tabel users
        $user = User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'dokter',
            'image' => $imagePath,
        ]);
        // ⬇ Simpan juga ke tabel doctors
        Doctor::create([
            'user_id' => $user->id,
            'specialization' => $request->specialist,
            'description' => $request->description,
        ]);
        return redirect()->route('kelola-dokter')->with('success', 'Dokter berhasil ditambahkan!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:20|unique:users,phone,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'specialist' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $dokter = User::findOrFail($id);
        $dokter->name = $request->full_name;
        $dokter->email = $request->email;
        $dokter->phone = $request->phone;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('dokter_images', 'public');
            $dokter->image = $imagePath;
        }
        if ($dokter->doctor) {
            $dokter->doctor->update([
                'specialization' => $request->specialist,
                'description' => $request->description,
            ]);
        } else {
            // Jika belum ada, buat baru
            Doctor::create([
                'user_id' => $dokter->id,
                'specialization' => $request->specialist,
                'description' => $request->description,
            ]);
        }
        $dokter->save();
        return redirect()->route('kelola-dokter')->with('success', 'Data dokter berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $dokter = User::findOrFail($id);
        // Pastikan hanya user dengan role dokter yang dihapus
        if ($dokter->role !== 'dokter') {
            abort(403, 'Akses ditolak');
        }
        // Hapus gambar jika ada
        if ($dokter->image && Storage::disk('public')->exists($dokter->image)) {
            Storage::disk('public')->delete($dokter->image);
        }
        $dokter->delete();
        return redirect()->route('kelola-dokter')->with('success', 'Dokter berhasil dihapus!');
    }
}
