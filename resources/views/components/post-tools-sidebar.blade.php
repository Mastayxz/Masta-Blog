<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    <aside class="space-y-4  p-4 rounded shadow ">


        <h3 class="text-lg font-bold text-gray-800 mb-3">Aksi Postingan</h3>

        <a href="{{ route('posts.edit', $post->slug) }}"
            class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded transition">
            ✏️ Edit Post
        </a>

        <form action="{{ route('posts.destroy', $post->slug) }}" method="POST"
            onsubmit="return confirm('Yakin ingin menghapus postingan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2 rounded transition">
                🗑️ Hapus Post
            </button>
        </form>
        {{-- Iklan --}}
        <div class="bg-white p-4 shadow rounded">
            <h3 class="text-lg font-semibold mb-2">Iklan</h3>
            <div class="bg-gray-200 h-32 flex items-center justify-center text-gray-500">
                Space Iklan
            </div>
        </div>

        {{-- Kategori --}}


        {{-- Rekomendasi Artikel --}}
        <div class="bg-white p-4 shadow rounded">
            <h3 class="text-lg font-semibold mb-2">Rekomendasi Artikel</h3>
            <ul class="space-y-3">
                @foreach ($recommendedPosts as $recPost)
                    <li>
                        <a href="{{ route('posts.show.public', $recPost->slug) }}"
                            class="text-sm text-gray-800 hover:underline">
                            {{ $recPost->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

    </aside>

</div>
