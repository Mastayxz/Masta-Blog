<x-layouts.app>

    <section class="relative py-20">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl">Temukan Informasi yang Anda Butuhkan</h1>
            <p class="mt-4 text-lg text-gray-600">Cari artikel, tutorial, atau informasi menarik lainnya dengan cepat dan
                mudah.</p>

            <!-- Search Box -->
            <div class="mt-6 max-w-lg mx-auto">
                
                <form action="{{ route('posts.search') }}" method="GET"
                    class="flex items-center bg-white shadow-md rounded-full overflow-hidden">
                    <input type="text" name="keyword" class="flex-grow px-4 py-3 text-gray-700 border-none "
                        placeholder="Cari sesuatu...">
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold hover:bg-blue-700">
                        Cari
                    </button>
                </form>
            </div>
        </div>
    </section>
    <section>
        <!-- Recent Posts -->

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($posts as $post)
                <x-post-card :post="$post" />
            @empty
                <p class="text-gray-600">Belum ada postingan tersedia.</p>
            @endforelse
        </div>
    </section>
</x-layouts.app>
