<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Tambahkan ads
        </h2>
    </x-slot>

    <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Judul Iklan" class="input" required>
        <input type="file" name="image" accept="image/*" class="input" required>
        <input type="url" name="url" placeholder="Link Tujuan (opsional)" class="input">
        <button type="submit" class="btn">Simpan Iklan</button>
    </form>
</x-dashboard-layout>
