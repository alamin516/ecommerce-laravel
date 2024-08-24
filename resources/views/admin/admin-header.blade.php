<div class="sticky top-0 left-0 z-20 px-4 md:px-8 py-2 h-16 flex justify-between items-center shadow-sm bg-white">
    <div class="flex items-center w-2/3 gap-3">
        <div class="hidden md:block">
            <div class="flex items-center space-x-4">
                <span @click="menu = !menu" class="cursor-pointer w-10 h-10 flex items-center justify-center bg-gray-100 hover:bg-gray-50 focus:outline-none transition-colors duration-150 rounded-full p-2 transform ease-linear">
                    <i class="fa-solid fa-align-left"></i>
                </span>

                <a target="_blank" href="/">
                    <span class="cursor-pointer w-10 h-10 flex items-center justify-center bg-gray-100 hover:bg-gray-50 focus:outline-none transition-colors duration-150 rounded-full p-2 transform ease-linear">
                        <i class="fa-solid fa-earth-americas"></i>
                    </span>
                </a>

                <span class="cursor-pointer w-10 h-10 flex items-center justify-center bg-gray-100 hover:bg-gray-50 focus:outline-none transition-colors duration-150 rounded-full p-2 transform ease-linear">
                    <i class="fa-solid fa-broom"></i>
                </span>
            </div>
        </div>

        <input class="bg-gray-200 focus:outline-none focus:shadow-outline focus:bg-white border border-transparent focus:border-gray-300 rounded-lg py-2 px-4 w-full appearance-none leading-normal hidden md:block placeholder-gray-700 mr-10" type="text" placeholder="Search...">

        <div class="p-2 rounded-full hover:bg-gray-200 cursor-pointer md:hidden" @click="sidemenu = !sidemenu">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-600"
                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                fill="none" stroke-linecap="round" stroke-linejoin="round">
                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                <line x1="4" y1="6" x2="20" y2="6" />
                <line x1="4" y1="12" x2="20" y2="12" />
                <line x1="4" y1="18" x2="20" y2="18" />
            </svg>
        </div>
        <div class="text-xl font-bold tracking-tight text-gray-800 md:hidden ml-2">Dashing Admin.</div>
    </div>
    <div class="flex items-center">

        <a href="#" class="text-gray-500 p-2 rounded-full hover:text-blue-600 hover:bg-gray-200 cursor-pointer mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
            </svg>
        </a>

        <div class="relative" x-data="{ open: false }" x-cloak>
            <div @click="open = !open" class=" flex items-center cursor-pointer">
                <div class="flex items-center text-gray-600 bg-white hover:bg-gray-50 focus:outline-none transition-colors duration-150 rounded-full p-2">
                    <span class="w-10 h-10 border border-gray-300 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 19.902 20.012">
                            <path id="user-icon" d="M15.71,12.71a6,6,0,1,0-7.42,0,10,10,0,0,0-6.22,8.18,1.006,1.006,0,1,0,2,.22,8,8,0,0,1,15.9,0,1,1,0,0,0,1,.89h.11a1,1,0,0,0,.88-1.1,10,10,0,0,0-6.25-8.19ZM12,12a4,4,0,1,1,4-4A4,4,0,0,1,12,12Z" transform="translate(-2.064 -1.995)" fill="#91919b" />
                        </svg>
                    </span>
                </div>
                <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <div x-show.transition="open" @click.away="open = false"
                class="absolute top-3 mt-12 right-0 w-48 bg-white py-2 shadow-md border border-gray-100 rounded-lg z-40">
                <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600">Edit
                    Profile</a>
                <a href="#"
                    class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600">Account
                    Settings</a>
                <form class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600" method="POST"
                    action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>