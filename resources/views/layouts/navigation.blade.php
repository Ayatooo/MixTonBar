<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/header.css') }}" media="all">

<nav x-data="{ open: false }" class="container-header">
    <!-- Primary Navigation Menu -->
    <div class="header">
        <div class="left">
            <!-- Logo -->
            <div class="container-filter">
                <a href="{{ route('home') }}">
                    <img src="{{ URL::asset('img/logo/android-chrome-512x512.png') }}" alt="filters"
                        class="logo-filter" />
            </div>

            <div class="shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="logo-mix">MIX TON BAR</a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:flex" class="links">
                <a class="links {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    {{ __('Avec Alcool') }}
                </a>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:flex" class="links">
                <a class="links {{ request()->routeIs('noalcohol') ? 'active' : '' }}" href="{{ route('noalcohol') }}" :active="request() - > routeIs('noalcohol')">
                    {{ __('Sans Alcool') }}
                </a>
            </div>
            @if (Auth::check())
                <div class="hidden space-x-8 sm:-my-px sm:flex" class="links">
                    <a class="links {{ request()->routeIs('favorites') ? 'active' : '' }}" href="{{ route('favorites') }}" :active="request() - > routeIs('favorites')">
                        {{ __('Favoris') }}
                    </a>
                </div>
            @endif
        </div>

        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ml-6">

            <div class="container-searchbar">
                <img src="{{ URL::asset('img/search icon.svg') }}" alt="" class="loupe">
                <select class="select" id="searchbar">
                    <option selected>Recherche ...</option>
                </select>
            </div>

            @if (Auth::check())
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="btn-login"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name ?? '' }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="dropdown">
                            {{ __('Profil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" class="dropdown"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Déconnexion') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @else
                <div class="hidden space-x-8 sm:-my-px sm:flex" class="links">
                    <a class="links" href="{{ route('register') }}">
                        {{ __('S\'identifier') }}
                    </a>
            @endif
        </div>

        <!-- Hamburger -->
        <div class="-mr-2 flex items-center sm:hidden">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Accueil') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                @if (Auth::check())
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name ?? '' }}
                    </div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email ?? '' }}</div>
                @else
                    <a href="{{ route('login') }}"
                        class="font-medium text-sm text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:underline transition ease-in-out duration-150">Login</a>
                @endif
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Déconnexion') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        const token = "{{ json_encode(csrf_token()) }}";
        $('#searchbar').select2({
            placeholder: "Recherche...",
            ajax: {
                url: '/search',
                dataType: 'json',
                type: "POST",
                data: function(search, token) {
                    return {
                        search: search,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                slug: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });
        $('#searchbar').on('select2:select', function(e) {
            const data = e.params.data;
            window.location.href = "/recipe/" + data.id;
        });
    });
</script>
