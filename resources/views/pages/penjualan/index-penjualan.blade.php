<x-app-layout>
    <div class="pb-5 flex justify-end">
        <!-- Modal toggle -->
        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
            class="block text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Tambah Transaksi
        </button>

        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <form action="{{ route('store.penjualan') }}" method="POST" class="p-5 bg-white space-y-3">
                    <h1 class="text-2xl font-bold">Tambah Transaksi</h1>
                    @csrf
                    <select name="pelanggan_id" id="" class="w-full">
                        @foreach ($pelanggans as $pelanggan)
                            <option value="{{ $pelanggan->id }}">{{ $pelanggan->name }}</option>
                        @endforeach
                    </select>

                    <button class="bg-blue-500 px-4 py-2 rounded-md text-white">Create</button>
                </form>
            </div>
        </div>
    </div>

    <div class="p-5 bg-white shadow-md">
        <table class="w-full">
            <thead>
                <tr class="border-b">
                    <td>ID</td>
                    <td>Pelanggan</td>
                    <td>Tanggal Transaksi</td>
                    <td>Pembayaran</td>
                    <td>Kembalian</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                @foreach ($penjualans as $penjualan)
                    <tr>
                        <td>{{ $penjualan->id }}</td>
                        <td>{{ $penjualan->pelanggan->name }}</td>
                        <td>{{ $penjualan->created_at->format('d-m-y') }}</td>
                        <td> {{ 'Rp. ' . number_format($penjualan->TotalPembayaran, 0, ',', '.') }}</td>
                        <td> {{ 'Rp. ' . number_format($penjualan->Kembalian, 0, ',', '.') }}</td>
                        <td class="flex space-x-3">
                            <a href="{{ route('detail.penjualan', $penjualan->id) }}">Show</a>
                            <form action="{{ route('delete.penjualan', $penjualan->id) }}" method="POST">
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
