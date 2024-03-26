<x-app-layout>
    <div class="w-full grid grid-cols-2 gap-5">
        <a href="{{ route('index.petugas') }}">
            <div class="bg-blue-600 w-full p-6 text-white rounded-md shadow-md">
                <p class="text-2xl">Petugas</p>
                <div class="text-4xl">{{ $petugas->count() }}</div>
            </div>
        </a>

        <a href="{{ route('index.pelanggan') }}">
            <div class="bg-blue-600 w-full p-6 text-white rounded-md shadow-md">
                <p class="text-2xl">Pelanggan</p>
                <div class="text-4xl">{{ $pelanggans->count() }}</div>
            </div>
        </a>

        <a href="{{ route('index.produk') }}">
            <div class="bg-blue-600 w-full p-6 text-white rounded-md shadow-md">
                <p class="text-2xl">Produk</p>
                <div class="text-4xl">{{ $produks->count() }}</div>
            </div>
        </a>

        <a href="{{ route('index.penjualan') }}">
            <div class="bg-blue-600 w-full p-6 text-white rounded-md shadow-md">
                <p class="text-2xl">Transaksi</p>
                <div class="text-4xl">{{ $penjualans->count() }}</div>
            </div>
        </a>
    </div>
</x-app-layout>
