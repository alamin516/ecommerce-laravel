<div x-data="{ open: false }" class="flex flex-col w-64">
    <!-- Sidebar Header -->
    <div class="flex items-center justify-between p-4">
        <a href="/" class="text-2xl font-bold">My Account</a>
        <button @click="open = !open" class="md:hidden text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </div>

    <!-- Sidebar Links -->
    <nav :class="open ? 'block' : 'hidden'" class="md:block flex-grow p-4 space-y-[2px]">
        <a href="{{ route('dashboard') }}" class="block py-2.5 px-4 rounded hover:bg-blue-500 hover:text-white 
              {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : '' }}">
            My Dashboard
        </a>

        <a href="{{ route('profile.edit') }}" class="block py-2.5 px-4 rounded hover:bg-blue-500 hover:text-white 
              {{ request()->routeIs('profile.edit') ? 'bg-blue-500 text-white' : '' }}">
            My Profile
        </a>

        <a href="{{ route('orders') }}" class="block py-2.5 px-4 rounded hover:bg-blue-500 hover:text-white 
              {{ request()->routeIs('orders') ? 'bg-blue-500 text-white' : '' }}">
            My Orders
        </a>

        <a href="{{ route('wishlist') }}" class="block py-2.5 px-4 rounded hover:bg-blue-500 hover:text-white 
              {{ request()->routeIs('wishlist') ? 'bg-blue-500 text-white' : '' }}">
            Wishlist
        </a>

        <a href="{{ route('settings') }}" class="block py-2.5 px-4 rounded hover:bg-blue-500 hover:text-white 
              {{ request()->routeIs('settings') ? 'bg-blue-500 text-white' : '' }}">
            Settings
        </a>

        <!-- Logout Form -->
        <form class="block py-2.5 px-4 rounded hover:bg-blue-500 hover:text-white" method="POST"
            action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left">Logout</button>
        </form>
    </nav>

</div>