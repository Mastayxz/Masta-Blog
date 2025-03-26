<x-layouts.app>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Detail Post
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-4 gap-8">
        <div class="lg:col-span-3">
            {{-- Menampilkan kategori --}}
            @if ($post->category)
                <span class="inline-block mb-2 px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">
                    {{ $post->category->name }}
                </span>
            @endif

            <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
            <p class="text-sm text-gray-500 mb-4">Diposting {{ $post->created_at->diffForHumans() }} oleh
                {{ $post->user->name ?? 'Anonim' }}</p>

            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto mb-4">
            @endif

            <div class="prose max-w-none">
                {!! $post->body !!}
            </div>
        </div>

        {{-- ===== SIDEBAR ===== --}}
        <x-post-sidebar :categories="$categories" :ads="$ads" :recommendedPosts="$recommendedPosts" :activeCategory="$category->slug ?? null" />
    </div>


</x-layouts.app>
