<x-layouts.app>
    <section class="py-12 ">

        @if ($posts->isEmpty())
            <p class="text-gray-500">Tidak ada hasil ditemukan untuk pencarian ini.</p>
        @else
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-3">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">
                        @if (isset($category))
                            Postingan dalam kategori: {{ $category->name }}
                        @else
                            Artikel Terbaru
                        @endif
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @foreach ($posts as $post)
                            <x-post-card :post="$post" />
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $posts->links() }}
                    </div>
                </div>

                <x-post-sidebar :categories="$categories" :ads="$ads" :recommendedPosts="$recommendedPosts" :activeCategory="$category->slug ?? null" />
            </div> {{-- Tutup div grid --}}
        @endif

        </div>
    </section>
</x-layouts.app>
