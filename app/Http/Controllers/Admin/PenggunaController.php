<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = User::paginate(5);
        return view('admin.kelola-pengguna', compact('pengguna'));
    }
}
