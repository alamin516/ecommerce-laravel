<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- @include('layouts.top-header') -->
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center overflow-hidden">
                    <a href="/">
                        <img src="https://cdn.freelogovectors.net/wp-content/uploads/2023/10/daraz_logo-freelogovectors.net_.png"
                            alt="Logo" class="max-w-[100%] h-16 object-cover">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('shop')" :active="request()->routeIs('shop')">
                        {{ __('Shop') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('flash')" :active="request()->routeIs('flash')">
                        {{ __('Flash') }}
                    </x-nav-link>
                </div>
                <!-- @auth
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                @endauth -->
            </div>

            <!-- If login or Not -->
            <div class="flex items-center justify-center">
                @auth
                <div class="relative inline-block">
                    <a href="{{url('cart')}}">
                        <i class="fa-solid fa-bag-shopping text-2xl font-bold"></i>
                        @if($count > 0)
                        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-semibold rounded-full px-2 py-1">
                           {{$count}}
                        </span>
                        @else
                        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-semibold rounded-full px-2 py-1 animate-pulse">
                           {{$count}}
                        </span>
                        @endif
                    </a>
                </div>
                <!-- Settings Dropdown for authenticated users -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div class="flex-shrink-0">
                                    <span
                                        class="w-10 h-10 border border-gray-300 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 19.902 20.012">
                                            <path id="user-icon"
                                                d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1.006,1.006,0,1,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1,10,10,0,0,0-6.25-8.19ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z"
                                                transform="translate(-2.064 -1.995)" fill="#91919b" />
                                        </svg>
                                    </span>
                                </div>
                                <!-- Check if Auth::user() is not null -->
                                @if (Auth::check())
                                <div class="ml-3">{{ Auth::user()->name }}</div>
                                @endif

                                <!-- <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div> -->
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @auth
                            @if(Auth::user()-> user_role == 'user')
                            <x-dropdown-link :href="route('dashboard')">
                               {{ __('Dashboard') }}
                            </x-dropdown-link>
                            @elseif(Auth::user()-> user_role == 'admin')
                            <x-dropdown-link :href="route('admin')">
                               {{ __('Admin') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dashboard')">
                                {{ __('User Dashboard') }}
                            </x-dropdown-link>
                            @endif
                            @endauth


                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>



                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                   <i class="fa-solid fa-right-from-bracket"></i> {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                @else
                <!-- Links for unauthenticated users -->
                <div class="flex items-center space-x-1 text-sm text-gray-700">
                    <div class="flex-shrink-0">
                        <span class="w-10 h-10 border border-gray-300 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 19.902 20.012">
                                <path id="user-icon"
                                    d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1.006,1.006,0,1,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1,10,10,0,0,0-6.25-8.19ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z"
                                    transform="translate(-2.064 -1.995)" fill="#91919b" />
                            </svg>
                        </span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 border-gray-300 transition duration-150 ease-in-out">Log in</a>
                        |
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 transition duration-150 ease-in-out">Register</a>
                        @endif
                    </div>
                </div>

                @endauth
            </div>




            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">
                    @if (Auth::check())
                    <div>{{ Auth::user()->name }}</div>
                    @endif
                </div>
                <div class="font-medium text-sm text-gray-500">
                    @if (Auth::check())
                    {{ Auth::user()->email }}
                    @endif
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>