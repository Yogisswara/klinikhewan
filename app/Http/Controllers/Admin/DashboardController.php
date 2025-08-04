<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ServiceReservation;
use App\Models\Article;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahDokter = User::where('role', 'dokter')->count();
        $jumlahLayanan = ServiceReservation::count();
        $jumlahArtikel = Article::count();
        $jumlahPengguna = User::count();

        // Contoh aktivitas terbaru (bisa diganti dengan data dari tabel aktivitas jika sudah ada)
        $aktivitas = [
            ['deskripsi' => 'Admin menambahkan artikel baru', 'waktu' => '2 jam lalu'],
            ['deskripsi' => 'Dokter Budi memperbarui jadwal', 'waktu' => '5 jam lalu'],
            ['deskripsi' => 'Pengguna baru mendaftar', 'waktu' => '1 hari lalu'],
        ];

        return view('admin.dashboard', compact(
            'jumlahDokter',
            'jumlahLayanan',
            'jumlahArtikel',
            'jumlahPengguna',
            'aktivitas'
        ));
    }
}
