<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function Index()
    {
        $artikels = Article::with('doctor.user')->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.kelola-artikel', compact('artikels'));
    }

    public function showPublic()
    {
        // Untuk halaman user/home
        $articles = Article::with('doctor.user')->latest()->get();
        return view('article', compact('articles'));
    }


    // Simpan artikel baru
    public function store(Request $request)
    {
        // Cek apakah user punya role dokter
        if (!Auth::user() || Auth::user()->role !== 'dokter') {
            return redirect()->back()->withErrors(['Akses ditolak! Hanya dokter yang dapat menambah artikel.']);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('artikel_images', 'public');
        }

        // Ambil doctor_id dari user yang login
        $doctor = Auth::user()->doctor;
        if (!$doctor) {
            return redirect()->back()->withErrors(['Akun Anda belum terdaftar sebagai dokter.']);
        }

        Article::create([
            'doctor_id' => $doctor->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('kelola-artikel')->with('success', 'Artikel berhasil ditambahkan!');
    }

    // Update artikel
    public function update(Request $request, $id)
    {
        $artikel = Article::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($artikel->image) {
                Storage::disk('public')->delete($artikel->image);
            }
            $artikel->image = $request->file('image')->store('artikel_images', 'public');
        }

        $artikel->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $artikel->image,
        ]);

        return redirect()->route('kelola-artikel')->with('success', 'Artikel berhasil diperbarui!');
    }

    // Hapus artikel
    public function destroy($id)
    {
        $artikel = Article::findOrFail($id);
        if ($artikel->image) {
            Storage::disk('public')->delete($artikel->image);
        }
        $artikel->delete();

        return redirect()->route('kelola-artikel')->with('success', 'Artikel berhasil dihapus!');
    }
}
