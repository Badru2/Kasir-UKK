<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $pelanggans = User::where('level', 'pelanggan')->get();
        $petugas = User::where('level', 'petugas')->get();
        $produks = Produk::get();
        $penjualans = Penjualan::get();

        return view('dashboard', compact('pelanggans', 'petugas', 'produks', 'penjualans'));
    }
}
