<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Buat Post Baru
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <x-input-label for="title" value="Judul" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required
                    autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <!-- Category -->
            <div class="mb-4">
                <x-input-label for="category_id" value="Kategori" />
                <select name="category_id" id="category_id"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
            </div>

            <div class="mb-4">
                <label for="image" class="block font-medium text-sm text-gray-700">Thumbnail</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full"
                    onchange="previewImage(event)">

                <!-- Preview -->
                <div class="mt-4">
                    <img id="image-preview" class="w-64 rounded-lg shadow hidden" />
                </div>
            </div>


            <!-- Body -->
            <div class="mb-4">
                <lx-input-abel for="body" class="block font-medium mb-1">Isi Post</lx-input-abel>
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body" class="trix-content bg-white h-auto"></trix-editor>
            </div>


            <!-- Submit -->
            <x-primary-button>
                Simpan
            </x-primary-button>
        </form>
    </div>
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-dashboard-layout>
