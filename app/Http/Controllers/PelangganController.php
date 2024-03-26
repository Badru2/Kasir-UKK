<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = User::where('level', 'pelanggan')->get();

        return view('pages.pelanggan.index-pelanggan', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'pelanggan',
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->back();
    }
}
