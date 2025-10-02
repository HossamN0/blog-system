<header class="bg-gray-800 text-white shadow-md w-full" style="padding-top: 20px; padding-bottom: 20px;">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">

        <!-- Logo -->
        <a href="{{ route('welcome') }}" class="text-xl font-bold">
            Blog system
        </a>

        <!-- Navigation -->
        <nav>
            @auth
                <!-- <a href="{{ route('welcome') }}" class="hover:text-gray-300">Profile</a> -->
                @if(Auth::user()?->role === 'admin')
                    <a style="margin-left: 20px" href="{{ route('dashboard') }}" class="hover:text-gray-300">Dashboard</a>
                @endif
            @endauth
        </nav>

        <!-- Auth -->
        <div>
            @auth
                <div class="flex items-center gap-10">
                    <p class="mr-4">Hi, {{ Auth::user()->name }}</p>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-gray-700 hover:bg-gray-600 px-3 py-1 rounded">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded">Login</a>
                <a href="{{ route('register') }}"
                    class="ml-2 bg-green-500 hover:bg-green-600 px-3 py-1 rounded">Register</a>
            @endauth
        </div>

    </div>
</header>