<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('head')

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($heading))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $heading }}
            </div>
        </header>
        @endif

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex gap-4 items-center">
                        {{ __("You're welcome!") }}

                        @auth
                        <div>
                            @if (Auth::check())
                            <span class="text-xl font-semibold">{{ Auth::user()->name }}</span>
                            @endif
                        </div>
                        @endauth
                    </div>
                </div>

                <!-- layout start -->
                <div class="flex gap-5 mt-5">
                    <div class="w-[23%] h-[400px] p-4 bg-white  shadow-sm sm:rounded-lg">
                        @include('profile.partials.user-sidebar')
                    </div>
                    <div class="w-[77%] p-4 bg-white  shadow-sm sm:rounded-lg">
                        @yield('content')
                    </div>
                </div>
                <!-- layout end -->
            </div>
        </div>
    </div>
</body>

</html>