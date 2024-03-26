<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::orderBy('NamaProduk', 'asc')->get();

        return view('pages.produk.index-produk', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaProduk' => 'required',
            'Harga' => 'required|numeric',
            'Stok' => 'required|numeric|min:1',
        ]);

        Produk::create([
            'NamaProduk' => $request->NamaProduk,
            'Harga' => $request->Harga,
            'Stok' => $request->Stok,
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        $produk = Produk::find($id);

        return view('pages.produk.edit-produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        $request->validate([
            'NamaProduk' => 'required',
            'Harga' => 'required|numeric',
            'Stok' => 'required|numeric',
        ]);

        $produk->update([
            'NamaProduk' => $request->NamaProduk,
            'Harga' => $request->Harga,
            'Stok' => $request->Stok,
        ]);

        return redirect()->route('index.produk');
    }

    public function destroy($id)
    {
        Produk::find($id)->delete();

        return redirect()->back();
    }
}
