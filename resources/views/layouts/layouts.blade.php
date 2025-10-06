<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <style>[x-cloak] { display: none !important; }</style>
        <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
        
        <title>{{ config('app.name', 'Yappienk!') }}</title>
        @vite('resources/css/app.css')
        <script src="//unpkg.com/alpinejs" defer></script>
    </head>
    <body class="bg-gray-50 text-gray-900">

        @include('partials.header')

        <main class="min-h-screen flex">
            <aside class="w-58 hidden md:inline border-r border-r border-gray-300 flex flex-col">
                <nav class="flex-1 px-4 py-6 space-y-2 text-gray-500 text-lg">
                    <div 
                        onclick="window.location='{{ url('/') }}'"
                        class="flex px-4 py-2 items-center gap-4 hover:text-black
                        {{ request()->is('/') ? 'text-black font-semibold border-l-4 border-pink-500 bg-pink-50' : '' }}"
                    >
                        <i class='bx  bx-home-heart text-2xl'  ></i> 
                        <p class="cursor-pointer">Beranda</p>
                    </div>
                    <a 
                        href="{{ route('profile', Auth::user()->email) }}" 
                        class="flex px-4 py-2 items-center gap-4 hover:text-black
                        {{ request()->is(Auth::user()->email) ? 'text-black font-semibold border-l-4 border-pink-500 bg-pink-50' : '' }}"
                        >
                            <i class='bx bx-user-circle text-2xl'></i> 
                            <p class="cursor-pointer">Profil</p>
                    </a>
                    </div>
                </nav>
            </aside>
            @yield('content')
        </main>

    </body>
</html>
