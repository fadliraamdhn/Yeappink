<header class="flex justify-between items-center px-5 md:px-6 py-4 border-b border-gray-300">
    <div 
        x-data="{ openSidebar: false }"
        class="flex gap-4"
    >

        <button 
            class="cursor-pointer md:hidden flex flex-col justify-center items-center gap-1 focus:outline-none mt-1"
            @click="openSidebar = true"
        >
            <span class="block w-5 h-0.5 bg-gray-600 rounded"></span>
            <span class="block w-5 h-0.5 bg-gray-600 rounded"></span>
            <span class="block w-5 h-0.5 bg-gray-600 rounded"></span>
        </button>

        <a 
            href="/"
        >
            <h1 class="text-2xl font-bold">Yappienk!</h1>
        </a>

        <div 
            x-show="openSidebar"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="fixed inset-0 z-50 flex"
            x-cloak
        >

            <div class="relative w-64 bg-white h-full shadow-lg z-50 p-6 flex flex-col">
                <button 
                    class="cursor-pointer absolute top-4 right-4 text-gray-600"
                    @click="openSidebar = false"
                >
                    ✕
                </button>
                <h1 class="text-2xl px-4 font-bold">Yappienk!</h1>
                <nav class="flex-1 px-4 py-6 space-y-2 text-gray-500 text-lg">
                    <div 
                        onclick="window.location='{{ url('/') }}'"
                        class="flex px-4 py-2 items-center gap-4 hover:text-black cursor-pointer
                        {{ request()->is('/') ? 'text-black font-semibold border-l-4 border-pink-500 bg-pink-50' : '' }}"
                    >
                        <i class='bx  bx-home-heart text-2xl'  ></i> 
                        <p class="cursor-pointer">Beranda</p>
                    </div>
                    <div class="flex py-2 items-center gap-4 hover:text-black">
                        <i class='bx  bx-user-circle text-2xl'  ></i> 
                        <a href="{{ route('profile', Auth::user()->email) }}">Profil</a>
                    </div>
                </nav>
            </div>
        </div>

        <div class="rounded-full hidden md:flex bg-pink-100 py-1.5 px-4 flex gap-2 items-center">
            <i class='bx bx-search'></i> 
            <input type="text" placeholder="Search" class="focus:outline-none">
        </div>
    </div>

    <div class="flex items-center gap-6 text-gray-500">
        <i class='bx bx-pencil text-2xl hover:text-black cursor-pointer'></i>
        <i class='bx bx-bell text-2xl hover:text-black cursor-pointer'></i> 
        @auth
            <div 
                x-data="{ open: false }"
                class="relative group"
            >
            <img 
                src="{{ Auth::user()->avatar }}" 
                alt="{{ Auth::user()->name }}"
                class="w-8 h-8 rounded-full object-cover cursor-pointer"
                @click="open = !open"
            />
            <div 
                class="absolute left-1/2 transform -translate-x-1/2 mt-2 
                bg-gray-800 text-white text-xs px-2 py-1 rounded 
                opacity-0 group-hover:opacity-100 transition"
                x-show="!open"
            >
                Akun
            </div>
            <div 
                x-show="open" 
                @click.outside="open = false"
                x-cloak
                x-transition
                class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg py-2 z-50"
            >
                <a  href="{{ route('profile', Auth::user()->email) }}" 
                    class="flex items-center gap-3 px-4 py-2 text-gray-500 hover:text-black cursor-pointer">
                    <img 
                        src="{{ Auth::user()->avatar }}" 
                        alt="{{ Auth::user()->name }}"
                        class="w-10 h-10 rounded-full object-cover"
                    />
                    <div class="flex flex-col">
                        <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                        <p class="text-xs">Profil saya</p>
                    </div>
                </a>

                <hr class="my-1 border border-gray-100">

                <a href="/settings" 
                class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                    <i class='bx bx-cog text-lg'></i>
                    <span>Pengaturan</span>
                </a>

                <form action="{{ route('logout') }}" method="POST" class="mt-2">
                    @csrf
                    <button 
                        type="submit" 
                        class="flex items-center gap-2 w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 transition cursor-pointer"
                    >
                        <i class='bx  bx-walking text-lg'></i> 
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
        @endauth
    </div>
</header>
