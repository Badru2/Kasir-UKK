<x-app-layout>
    <div class="pb-5 flex justify-end">
        <!-- Modal toggle -->
        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
            class="block text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Tambah Produk
        </button>

        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <form action="{{ route('store.produk') }}" method="POST" class="p-5 bg-white space-y-3">
                    <h1 class="text-2xl font-bold">Tambah Produk</h1>
                    @csrf
                    <input type="text" name="NamaProduk" placeholder="Nama" class="w-full">
                    <input type="number" name="Harga" placeholder="Harga" class="w-full">
                    <input type="number" name="Stok" placeholder="Stok" class="w-full">

                    <button class="bg-blue-500 px-4 py-2 rounded-md text-white">Create</button>
                </form>
            </div>
        </div>

    </div>
    <div class="p-5 bg-white shadow-md">
        <table class="w-full">
            <thead>
                <tr class="border-b">
                    <td>Nama</td>
                    <td>Harga</td>
                    <td>Stok</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                @foreach ($produks as $produk)
                    <tr>
                        <td>{{ $produk->NamaProduk }}</td>
                        <td>{{ 'Rp. ' . number_format($produk->Harga, 0, ',', '.') }}</td>
                        <td>{{ $produk->Stok }}</td>
                        <td class="flex space-x-3">
                            <a href="{{ route('edit.produk', $produk->id) }}">Edit</a>
                            <form action="{{ route('delete.produk', $produk->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
