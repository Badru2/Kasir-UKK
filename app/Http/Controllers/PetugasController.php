<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PetugasController extends Controller
{
    public function create()
    {
        $petugas = User::where('level', 'petugas')->get();

        return view('pages.petugas.create-petugas', compact('petugas'));
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
            'level' => 'petugas',
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $petugas = User::find($id);

        return view('paegs.petugas.edit-petugas', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $petugas = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $petugas->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('index.petugas');
    }
}
