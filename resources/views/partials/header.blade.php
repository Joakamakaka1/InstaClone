<header class="flex items-center justify-between px-10 py-8 w-full">
    <div class="flex items-center space-x-2">
        <div class="w-4 h-4 bg-teal-500 rounded-full"></div>
        <div class="w-4 h-4 bg-yellow-500 rounded-full"></div>
        <div class="w-4 h-4 bg-pink-500 rounded-full"></div>
        <a href="{{ route('home') }}">
            <h1 class="text-3xl font-bold ml-2">InstaClone</h1>
        </a>
    </div>

    <nav>
        <ul class="flex space-x-10 text-xl font-medium">
            @auth
            <li><a href="{{ route('posts.index') }}">Ver Posts</a></li>
            <li><a href="{{ route('profile') }}">{{ Auth::user()->name }}</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
            @endauth

            @guest
            <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
            <li><a href="{{ route('register') }}">Registrarse</a></li>
            @endguest
    </nav>

    <form action="" method="get" class="relative">
        <input
            placeholder="Search..."
            class="input shadow-lg  px-5 py-3 rounded-xl w-56 outline-none "
            name="search"
            type="search" />
        <button class="cursor-pointer">
            <svg
                class="size-6 absolute top-3 right-3"
                stroke="currentColor"
                stroke-width="1.5"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                    stroke-linejoin="round"
                    stroke-linecap="round"></path>
            </svg>
        </button>
    </form>
</header>