<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Article;


class HomeController extends Controller
{
    public function index()
    {
        $dokters = User::where('role', 'dokter')->with('doctor')->get();
        $artikels = Article::latest()->take(6)->get();
        return view('home', compact('dokters', 'artikels'));
    }    //
}
