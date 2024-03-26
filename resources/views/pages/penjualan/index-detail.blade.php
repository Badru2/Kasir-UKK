<x-app-layout>
    <div class="p-5 flex justify-between space-x-3">
        <div class="space-y-3">
            <div class="bg-white shadow-md p-5">
                <p>Nama : {{ $Penjualan->pelanggan->name }}</p>
                <p>Email : {{ $Penjualan->pelanggan->email }}</p>
            </div>
            <div class="bg-white shadow-md p-5">
                <form action="{{ route('store.detail') }}" method="POST" class="space-y-3">
                    @csrf
                    <select name="produk_id" id="" class="w-full">
                        <option>Pilih Produk</option>
                        @foreach ($produks as $produk)
                            <option value="{{ $produk->id }}">
                                {{ $produk->NamaProduk . ' ' . 'Rp. ' . number_format($produk->Harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="penjualan_id" value="{{ $Penjualan->id }}" id="">
                    <input type="number" name="Jumlah" placeholder="Jumlah" class="w-full">

                    <button>Masukan</button>
                </form>

            </div>
        </div>

        <div class="space-y-3 w-full">
            <div class="bg-white shadow-md p-5">
                <table class="w-full">
                    <thead>
                        <tr>
                            <td>Nama</td>
                            <td>Jumlah</td>
                            <td>Sub Total</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($details as $detail)
                            @if ($detail->produk_id != null)
                                <tr>
                                    <td>{{ optional($detail->produk)->NamaProduk }}</td>
                                    <td>{{ $detail->JumlahProduk }}</td>
                                    <td>{{ number_format($detail->Subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div>
                <form action="{{ route('bayar', $Penjualan->id) }}" method="POST"
                    class="bg-white shadow-md p-5 space-y-3">
                    @csrf
                    <input type="number" disabled value="{{ $Penjualan->TotalHarga }}" placeholder="Total Harga"
                        class="w-full">
                    <input type="number" name="TotalPembayaran" id="" placeholder="Total Pembayaran"
                        class="w-full">

                    <div>
                        Kembalian
                        <b>
                            {{ 'Rp. ' . number_format($Penjualan->Kembalian, 0, ',', '.') }}
                        </b>
                    </div>

                    <button>Bayar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
