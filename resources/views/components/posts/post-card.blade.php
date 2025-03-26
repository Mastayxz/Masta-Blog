<div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
    <div class="relative">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                class="w-full h-48 object-cover object-center">
        @endif

        <!-- Badge kategori -->
        <div class="absolute top-3 left-3 bg-black bg-opacity-50 text-white text-xs px-3 py-1 rounded-full shadow">
            {{ $post->category->name }}
        </div>
    </div>

    <div class="p-5">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">
            {{ $post->title }}
        </h3>

        <p class="text-sm text-gray-600 mb-4 leading-relaxed">
            {{ Str::limit($post->excerpt ?? strip_tags($post->body), 100) }}
        </p>

        <a href="{{ route('posts.show.public', $post->slug) }}"
            class="inline-block text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200">
            Baca Selengkapnya →
        </a>
    </div>
</div>
