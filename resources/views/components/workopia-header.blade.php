<header class="bg-blue-900 text-white p-4" x-data="{ open: false }">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="{{ url('/') }}">Workopia</a>
        </h1>
        <nav class="hidden md:flex items-center space-x-4">
            <x-workopia-nav-link :active="request()->is('/')" icon="home">Home</x-workopia-nav-link>
            <x-workopia-nav-link :active="request()->is('jobs')" url="/jobs" icon="briefcase">All Jobs</x-workopia-nav-link>
            @auth
                <x-workopia-nav-link :active="request()->is('bookmarks')" url="/bookmarks">Bookmarked Jobs</x-workopia-nav-link>
                <x-workopia-button-link url="/jobs/create" icon="edit">Create job</x-workopia-button-link>
                <!-- User Avatar -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('dashboard') }}">
                    @if(Auth::user()->avatar)
                        <img
                            src="{{ asset('storage/' . Auth::user()->avatar) }}"
                            alt="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}"
                            class="w-10 h-10 rounded-full"
                        />
                    @else
                        <img
                            src="{{ asset('storage/avatars/default-avatar.png') }}"
                            alt="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}"
                            class="w-10 h-10 rounded-full"
                        />
                    @endif
                    </a>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:underline">
                        <i class="fa fa-sign-out"></i> Logout
                    </button>
                </form>
            @else
                <x-workopia-nav-link :active="request()->is('login')" url="/login">Login</x-workopia-nav-link>
                <x-workopia-nav-link :active="request()->is('register')" url="/register">Register</x-workopia-nav-link>
            @endauth
        </nav>
        <button @click="open = !open" class="text-white md:hidden flex items-center">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>
    <!-- Mobile Menu -->
    <div
        x-show="open"
        @click.away="open = false"
        id="mobile-menu"
        class="md:hidden bg-blue-900 text-white mt-5 pb-4 space-y-2"
    >
        <x-workopia-nav-link :active="request()->is('/')" :mobile="true">Home</x-workopia-nav-link>
        <x-workopia-nav-link :active="request()->is('jobs')" url="/jobs" :mobile="true">All Jobs</x-workopia-nav-link>
        @auth
            <x-workopia-nav-link :active="request()->is('bookmarks')" url="/bookmarks" :mobile="true">Bookmarked Jobs</x-workopia-nav-link>
            <x-workopia-nav-link :active="request()->is('dashboard')" url="/dashboard" icon="user-edit" :mobile="true">Edit Profile</x-workopia-nav-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:bg-blue-700 px-4 py-2 block w-full text-left">
                    <i class="fa fa-sign-out"></i> Logout
                </button>
            </form>
            <x-workopia-button-link url="{{ url('/jobs/create') }}" icon="edit" :mobile="true">Create Job</x-workopia-button-link>
        @else
            <x-workopia-nav-link :active="request()->is('login')" url="/login" :mobile="true">Login</x-workopia-nav-link>
            <x-workopia-nav-link :active="request()->is('register')" url="/register" :mobile="true">Register</x-workopia-nav-link>
        @endauth
    </div>
</header>
