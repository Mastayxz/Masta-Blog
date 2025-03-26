<x-layouts.dashboard>
    <div class="max-w-7xl mx-auto py-12 px-4">

        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Tambahkan ads
            </h2>
        </x-slot>

        {{-- Form Tambah Iklan --}}
        <div class="bg-white rounded shadow p-6 mb-8">
            <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-medium">Judul Iklan</label>
                    <input type="text" name="title" class="w-full rounded border-gray-300" required>
                </div>

                <div>
                    <label class="block font-medium">Gambar</label>
                    <input type="file" name="image" class="w-full" accept="image/*" required>
                </div>

                <div>
                    <label class="block font-medium">Link Tujuan (Opsional)</label>
                    <input type="url" name="url" class="w-full rounded border-gray-300">
                </div>

                <x-primary-button>Tambah Iklan</x-primary-button>
            </form>
        </div>

        {{-- Tabel Iklan --}}
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full table-auto divide-y divide-gray-200">
                <thead class="bg-gray-100 text-gray-700 text-left">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Gambar</th>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Link</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Dibuat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm">
                    @forelse ($ads as $index => $ad)
                        <tr>
                            <td class="px-4 py-3">{{ $index + 1 }}</td>
                            <td class="px-4 py-3">
                                <img src="{{ asset('storage/' . $ad->image) }}" class="w-24 h-auto rounded">
                            </td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $ad->title }}</td>
                            <td class="px-4 py-3">
                                @if ($ad->url)
                                    <a href="{{ $ad->url }}" target="_blank" class="text-blue-600 underline">
                                        {{ \Str::limit($ad->url, 30) }}
                                    </a>
                                @else
                                    <span class="text-gray-500">-</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <span
                                    class="inline-block px-2 py-1 rounded-full text-xs
                                    {{ $ad->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $ad->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-500">
                                {{ $ad->created_at->format('d M Y') }}
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
