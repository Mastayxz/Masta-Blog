@if (Route::has('login'))
    <div class="w-full bg-white shadow-sm top-0 z-10 sticky">
        <nav class="max-w-screen-lg mx-auto flex justify-between items-center px-4 py-2">
            <!-- Logo -->
            <div>
                <a href="{{ route('home') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:flex items-center space-x-6">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link :href="route('posts.index.public')" :active="request()->routeIs('posts*')">
                    {{ __('Posts') }}
                </x-nav-link>
                <x-nav-link :href="route('home')" :active="request()->routeIs('posts.index')">
                    {{ __('Contact') }}
                </x-nav-link>

            </div>

            <!-- Authentication -->
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-4 py-1.5 text-gray-800 border border-gray-300 hover:border-gray-400 rounded-sm text-sm">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-1.5 text-gray-800 border border-transparent hover:border-gray-300 rounded-sm text-sm">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-4 py-1.5 text-gray-800 border border-gray-300 hover:border-gray-400 rounded-sm text-sm bg-[#5ce1c6]">
                            Register
                        </a>
                    @endif
                @endauth
                <x-search-form />
            </div>
        </nav>
    </div>
@endif
