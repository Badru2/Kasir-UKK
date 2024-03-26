<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::latest()->get();
        $pelanggans = User::where('level', 'pelanggan')->get();

        return view('pages.penjualan.index-penjualan', compact('penjualans', 'pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
        ]);

        $penjualan = Penjualan::create([
            'pelanggan_id' => $request->pelanggan_id,
        ]);

        DetailPenjualan::create([
            'penjualan_id' => $penjualan->id,
        ]);

        return redirect()->route('detail.penjualan', $penjualan->id);
    }

    public function destroy($id)
    {
        Penjualan::find($id)->delete();

        return redirect()->back();
    }
}
