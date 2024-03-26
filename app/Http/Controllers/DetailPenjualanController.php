<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    public function index($id)
    {
        $Penjualan = Penjualan::find($id);
        $produks = Produk::get();
        $details = DetailPenjualan::with('produk')->where('penjualan_id', $id)->get();
        $total = DetailPenjualan::where('penjualan_id', $id)->sum('Subtotal');

        return view('pages.penjualan.index-detail', compact('Penjualan', 'details', 'produks'));
    }

    public function store(Request $request)
    {
        $produk = Produk::find($request->produk_id);
        $penjualan = Penjualan::find($request->penjualan_id);

        $request->validate([
            'penjualan_id' => 'required',
            'produk_id' => 'required',
            'Jumlah' => 'required|numeric|max:' . $produk->Stok,
        ]);

        $detailPenjualan = DetailPenjualan::where('produk_id', $request->produk_id)
            ->where('penjualan_id', $request->penjualan_id)
            ->first();

        if ($detailPenjualan) {
            $detailPenjualan->update([
                'JumlahProduk' => $request->Jumlah,
            ]);

            $subTotal = $detailPenjualan->JumlahProduk * $detailPenjualan->produk->Harga;

            $detailPenjualan->Subtotal = $subTotal;
            $detailPenjualan->save();
        } else {
            $detailPenjualan = DetailPenjualan::create([
                'penjualan_id' => $request->penjualan_id,
                'produk_id' => $request->produk_id,
                'JumlahProduk' => $request->Jumlah,
            ]);

            $subTotal = $detailPenjualan->JumlahProduk * $detailPenjualan->produk->Harga;

            $detailPenjualan->Subtotal = $subTotal;
            $detailPenjualan->save();
        }

        $penjualan->update([
            'TotalHarga' => $detailPenjualan->where('penjualan_id', $penjualan->id)->sum('Subtotal'),
        ]);

        return redirect()->back();
    }

    public function bayar(Request $request, $id)
    {
        $penjualan = Penjualan::find($id);

        $request->validate([
            'TotalPembayaran' => 'required|numeric',
        ]);
        $kembalian = $request->TotalPembayaran - $penjualan->TotalHarga;

        $penjualan->update(['TotalPembayaran' => $request->TotalPembayaran, 'Kembalian' => $kembalian]);

        $detailPenjualan = DetailPenjualan::where('penjualan_id', $id)->get();

        foreach ($detailPenjualan as $detail) {
            $produk = Produk::find($detail->produk_id);
            if ($produk) {
                $produk->decrement('Stok', $detail->JumlahProduk);
            }
        }

        return redirect()->back();
    }
}
