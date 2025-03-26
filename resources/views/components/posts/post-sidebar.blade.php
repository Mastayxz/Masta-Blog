@props([
    'categories' => [],
    'ads' => [],
    'recommendedPosts' => [],
    'activeCategory' => null,
])
<aside class="space-y-6">

    {{-- Iklan --}}
    <div class="">
        <h3 class="text-lg font-semibold mb-2">Iklan</h3>

        @foreach ($ads as $ad)
            @if ($ad->is_active)
                <a href="{{ $ad->url ?? '#' }}" target="_blank">
                    <img src="{{ asset('storage/' . $ad->image) }}" alt="{{ $ad->title }}" class="rounded">
                </a>
            @endif
        @endforeach
    </div>

    {{-- Kategori --}}
    {{-- Kategori --}}
    <div class=" p-4 shadow rounded">
        <h3 class="text-lg font-semibold mb-2">Kategori</h3>
        <ul class="space-y-1">
            <li><a href="{{ route('posts.index.public') }}"
                    class="text-blue-600 hover:underline {{ request()->routeIs('posts.index.public') ? 'font-bold text-blue-800' : '' }}">All</a>
            </li>
            @foreach ($categories as $category)
                <li>

                    <a href="{{ route('category.posts', $category->slug) }}"
                        class="text-blue-600 hover:underline {{ request()->is('category/' . $category->slug) ? 'font-bold text-blue-800' : '' }}">
                        {{ $category->name }}
                    </a>

                </li>
            @endforeach
        </ul>
    </div>


    {{-- Rekomendasi Artikel --}}
    <div class=" p-4 shadow rounded">
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
