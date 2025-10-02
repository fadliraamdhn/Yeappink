<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script src="//unpkg.com/alpinejs" defer></script>
        <style>[x-cloak] { display: none !important; }</style>
        <title>Yappienk!: Yap & Yop</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        <div x-data="{ openRegister: false, openLogin: false }">
            <header class="flex justify-between px-4 md:px-16 py-6 border-b-1">
                <h1 class="text-2xl font-bold">Yappienk!</h1>
                <nav class="flex space-x-10 items-center text-sm">
                    <a class="cursor-pointer hidden md:inline">Yapping Disini</a>
                    <a
                        @click="openLogin = true"
                        class="cursor-pointer hidden md:inline"
                    >
                        Masuk
                    </a>
                    
                    <button 
                        @click="openRegister = true" 
                        class="text-white bg-black rounded-full px-5 py-2 font-medium cursor-pointer">
                        Bergabung
                    </button>
                </nav>
            </header>

            <div 
                x-show="openRegister || openLogin"
                x-cloak
                class="fixed inset-0 flex items-center justify-center bg-black/20"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            >

            <div
                x-show="openLogin"
                @click.outside="openLogin = false"
                class="bg-white shadow-lg px-16 pt-38 rounded-lg relative w-full h-full sm:w-3/4 md:w-2/4 md:h-2/3 md:pt-18 lg:w-2/5 lg:h-2/3"
            >
                <button 
                    @click="openLogin = false" 
                    class="absolute top-4 right-4 text-gray-500 cursor-pointer">
                    ✕
                </button>
                    <div class="flex flex-col space-y-5 text-center">
                        <h2 class="text-2xl font-semibold mb-6">Selamat Datang Kembali!</h2>
                        
                        <a href="/auth/google/login" 
                        class="flex items-center justify-center gap-2 py-3 rounded-full border relative hover:bg-gray-50">
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" 
                                alt="Google" 
                                class="w-6 h-6 absolute left-4">
                            <span>Masuk dengan Google</span>
                        </a>

                        <a href="/login/facebook/redirect" 
                        class="flex items-center justify-center gap-2 py-3 rounded-full border relative hover:bg-gray-50">
                            <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" 
                                alt="Facebook" 
                                class="w-6 h-6 absolute left-4 rounded-full">
                            <span>Masuk dengan Facebook</span>
                        </a>
                        
                        <p class="text-sm font-medium">
                            Gapunya akun? 
                            <a 
                                @click="openLogin = false; openRegister = true" 
                                class="text-pink-600 underline cursor-pointer"
                            >
                                Buat disini
                            </a>
                        </p>
                        
                        <p class="text-xs text-gray-400">
                            By clicking "Sign in", you accept Yappienk's Terms of Service and Privacy Policy.
                        </p>
                </div>
            </div>

            <div
                x-show="openRegister"
                @click.outside="openRegister = false"
                class="bg-white shadow-lg px-16 pt-38 rounded-lg relative w-full h-full sm:w-3/4 md:w-3/4 lg:w-2/5 lg:h-2/3 lg:pt-18"
            >
                <button 
                    @click="openRegister = false" 
                    class="absolute top-4 right-4 text-gray-500 cursor-pointer">
                    ✕
                </button>
                
                <div class="flex flex-col space-y-5 text-center">
                    <h2 class="text-2xl font-semibold mb-6">Bergabung Bersama Yappienk!</h2>
                    
                    <a href="/auth/google/register" 
                    class="flex items-center justify-center gap-2 py-3 rounded-full border relative hover:bg-gray-50">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" 
                            alt="Google" 
                            class="w-6 h-6 absolute left-4">
                        <span>Daftar dengan Google</span>
                    </a>

                    <a href="/login/facebook/redirect" 
                    class="flex items-center justify-center gap-2 py-3 rounded-full border relative hover:bg-gray-50">
                        <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" 
                            alt="Facebook" 
                            class="w-6 h-6 absolute left-4 rounded-full">
                        <span>Daftar dengan Facebook</span>
                    </a>
                    
                    <p class="text-sm font-medium">
                        Udah punya akun? 
                        <a 
                            @click="openRegister = false; openLogin = true" 
                            class="text-pink-600 underline cursor-pointer">Masuk di sini</a>
                    </p>
                    
                    <p class="text-xs text-gray-400">
                        By clicking "Sign up", you accept Yappienk's Terms of Service and Privacy Policy.
                    </p>
                </div>
            </div>
        </div>


        <section class="">
            <!-- <h2 class="text-5xl font-extrabold mb-4">Stay curious.</h2>
            <p class="text-lg text-gray-600 mb-6">
                Discover stories, thinking, and expertise from writers on Blabr.
            </p>
            <a href="#" class="bg-green-600 text-white px-6 py-3 rounded font-medium">
                Start Reading
            </a> -->
        </section>

        @if (session('error'))
            <div 
                x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 3500)"
                class="fixed bottom-3 left-1/2 transform -translate-x-1/2 
                    bg-red-500 text-white px-6 py-2 rounded-lg shadow-lg transition flex"
            >
                {{ session('error') }}
            </div>
        @endif
    </body>
</html>
