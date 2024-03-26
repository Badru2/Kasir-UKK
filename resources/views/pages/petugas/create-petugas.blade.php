<x-app-layout>
    <div class="pb-5 flex justify-end">
        <!-- Modal toggle -->
        <button data-modal-target="default-modal" data-modal-toggle="default-modal"
            class="block text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Tambah Petugas
        </button>

        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <form action="{{ route('store.petugas') }}" method="POST" class="p-5 bg-white space-y-3">
                    <h1 class="text-2xl font-bold">Tambah Petugas</h1>
                    @csrf
                    <input type="text" name="name" placeholder="Nama" class="w-full">
                    <input type="email" name="email" placeholder="Email" class="w-full">
                    <input type="password" name="password" placeholder="Password" class="w-full">
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                        class="w-full">

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
                    <td>Email</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                @foreach ($petugas as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td class="flex space-x-3">
                            <a href="">Edit</a>
                            <form action="{{ route('delete.petugas', $data->id) }}" method="POST">
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
