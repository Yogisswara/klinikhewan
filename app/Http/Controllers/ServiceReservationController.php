<?php

namespace App\Http\Controllers;

use App\Models\ServiceReservation;

use Illuminate\Http\Request;

class ServiceReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'jenis_layanan' => 'required|string',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        ServiceReservation::create([
            'user_id' => auth()->id(),
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'jenis_layanan' => $request->jenis_layanan,
            'tanggal' => $request->tanggal,
            'catatan' => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Reservasi berhasil dikirim!');
    }
    public function index()
    {
        $reservations = ServiceReservation::with('user')->paginate(5);
        return view('admin.kelola-layanan', compact('reservations'));
    }
}
