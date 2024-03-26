<x-app-layout>
    <div class="p-5 bg-white shadow-md">
        <table class="w-full">
            <thead>
                <tr class="border-b">
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                @foreach ($pelanggans as $pelanggan)
                    <tr>
                        <td>{{ $pelanggan->name }}</td>
                        <td>{{ $pelanggan->email }}</td>
                        <td class="flex space-x-3">
                            <a href="">Show</a>
                            <form action="{{ route('delete.pelanggan', $pelanggan->id) }}" method="POST">
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
