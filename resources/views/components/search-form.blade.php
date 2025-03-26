<form action="{{ route('posts.search') }}" method="GET" class="flex gap-2 items-center">
    <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Cari..."
        class="border px-2 py-1 text-sm rounded-full w-28 sm:w-40" />

    {{-- <select name="category" class="border px-2 py-1 text-sm rounded w-28 sm:w-36">
        <option value="">Kategori</option>
        @foreach ($categories as $cat)
            <option value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select> --}}

    <button type="submit" class="bg-blue-600 text-white px-3 py-1 text-sm rounded hidden">
        Cari
    </button>
</form>
