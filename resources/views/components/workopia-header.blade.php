<header class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="{{ url('/') }}">Workopia</a>
        </h1>
        <nav class="hidden md:flex items-center space-x-4">
            <x-workopia-nav-link :active="request()->is('/')" icon="home">Home</x-workopia-nav-link>
            <x-workopia-nav-link :active="request()->is('jobs')" url="/jobs" icon="briefcase">All Jobs</x-workopia-nav-link>
            <x-workopia-nav-link :active="request()->is('jobs/saved')" url="/jobs/saved">Saved Jobs</x-workopia-nav-link>
            <x-workopia-nav-link :active="request()->is('login')" url="/login">Login</x-workopia-nav-link>
            <x-workopia-nav-link :active="request()->is('register')" url="/register">Register</x-workopia-nav-link>
            <x-workopia-nav-link :active="request()->is('dashboard')" url="/dashboard" icon="user-edit">Edit Profile</x-workopia-nav-link>
            <x-workopia-button-link url="/jobs/create" icon="edit" btnColor="red">Create Job</x-workopia-button-link>
        </nav>
        <button id="hamburger" class="text-white md:hidden flex items-center">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>
    <!-- Mobile Menu -->
    <div
        id="mobile-menu"
        class="hidden md:hidden bg-blue-900 text-white mt-5 pb-4 space-y-2"
    >
        <x-workopia-nav-link :active="request()->is('/')" :mobile="true">Home</x-workopia-nav-link>
        <x-workopia-nav-link :active="request()->is('jobs')" url="/jobs" :mobile="true">All Jobs</x-workopia-nav-link>
        <x-workopia-nav-link :active="request()->is('jobs/saved')" url="/jobs/saved" :mobile="true">Saved Jobs</x-workopia-nav-link>
        <x-workopia-nav-link :active="request()->is('login')" url="/login" :mobile="true">Login</x-workopia-nav-link>
        <x-workopia-nav-link :active="request()->is('register')" url="/register" :mobile="true">Register</x-workopia-nav-link>
        <x-workopia-nav-link :active="request()->is('dashboard')" url="/dashboard" icon="user-edit" :mobile="true">Edit Profile</x-workopia-nav-link>
        <a
            href="{{ url('/jobs/create') }}"
            class="block px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-black"
        >
            <i class="fa fa-edit"></i> Create Job
        </a>
    </div>
</header>
