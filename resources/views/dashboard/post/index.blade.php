<x-layouts.dashboard>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <a href="{{ route('posts.create') }}"
            class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded hover:bg-blue-700 transition">
            + Tambah Post
        </a>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse($posts as $post)
                <div class="p-6 bg-white rounded-lg shadow-sm mb-6">
                    <h3 class="text-xl font-semibold text-gray-800">
                        {{ $post->title }}
                    </h3>
                    <p class="text-sm text-gray-500">
                        Diposting {{ $post->created_at->diffForHumans() }} oleh {{ $post->user->name ?? 'Unknown' }}
                    </p>
                    <p class="mt-3 text-gray-700">
                        {{ Str::limit(strip_tags($post->body), 150) }}
                    </p>
                    <a href="{{ route('posts.show', $post->slug) }}"
                        class="inline-block mt-4 text-blue-600 hover:underline">
                        Baca Selengkapnya →
                    </a>
                </div>
            @empty
                <p class="text-gray-600">Tidak ada postingan.</p>
            @endforelse
            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-layouts.dashboard>
