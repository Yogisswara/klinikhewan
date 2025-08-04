<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function profil()
    {
        $user = auth()->user();
        return view('profil', compact('user'));
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profil', compact('user'));
    }
    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20|unique:users,phone,' . $user->id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('avatars', 'public');
            $user->image = $path;
        }
        $user->save();
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
