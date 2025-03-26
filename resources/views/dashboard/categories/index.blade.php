<x-layouts.dashboard>
    <div class="max-w-7xl mx-auto py-12 px-4">

        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Tambahkan Category
            </h2>
        </x-slot>

        {{-- Form Tambah Kategori --}}
        <div class="bg-white rounded shadow p-6 mb-8">
            <form action="{{ route('category.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-medium">Nama Kategori</label>
                    <input type="text" name="name" class="w-full rounded border-gray-300" required>
                </div>
                <div>
                    <label class="block font-medium">Deskripsi</label>
                    <textarea name="description" id="" cols="" rows="" class="w-full"></textarea>
                </div>

                <x-primary-button>Tambah Kategori</x-primary-button>
            </form>
        </div>
        {{-- Tabel Iklan --}}
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full table-auto divide-y divide-gray-200">
                <thead class="bg-gray-100 text-gray-700 text-left">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Dekripsi</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm">
                    @forelse ($categories as $index => $category)
                        <tr>
                            <td class="px-4 py-3">{{ $index + 1 }}</td>

                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $category->name }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800 max-w-xs break-words">
                                {{ $category->description }}
                            </td>
                            <td class="px-4 py-3">
                                <a href="">Edit</a>
                                <a href="">Delete</a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                Belum ada iklan ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-layouts.dashboard>
