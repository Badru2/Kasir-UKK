<x-app-layout>
    <div>
        <form action="{{ route('update.produk', $produk->id) }}" method="POST" class="p-5 space-y-3 bg-white shadow-md">
            @csrf
            @method('PATCH')
            <input type="text" name="NamaProduk" value="{{ $produk->NamaProduk }}" class="w-full" id="">
            <input type="number" name="Harga" value="{{ $produk->Harga }}" class="w-full" id="">
            <input type="number" name="Stok" value="{{ $produk->Stok }}" class="w-full">

            <button>Update</button>
        </form>
    </div>
</x-app-layout>
