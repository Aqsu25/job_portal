  <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <span class="text-2xl font-bold text-gray-800">
                        Job<span class="text-blue-500">Connect</span>
                    </span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8 font-medium">
                    <a href="{{ route('home') }}"
                        class="flex items-center gap-2 text-gray-800 text-decoration-none hover:text-blue-700 transition">
                        Home
                    </a>
                    <a href="{{ route('job_portal.index') }}"
                        class="flex items-center gap-2 text-gray-800 text-decoration-none hover:text-blue-700 transition">
                        Jobs
                    </a>
                    <a href="{{ route('companies.index') }}"
                        class="flex items-center gap-2 text-gray-800 text-decoration-none hover:text-blue-700 transition">
                        Companies
                    </a>
                </div>

                <!-- Right Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    @if (Auth::check())
                        @if (auth()->user()->hasRole('admin'))
                            <a href="{{ route('admin.index') }}" class="btn btn-outline-primary">
                                Admin
                            </a>
                        @else
                            <a href="{{ route('myprofile') }}" class="btn btn-outline-primary">
                                My Profile
                            </a>
                            @if (!auth()->user()->hasRole('employer'))
                                <form action="{{ route('request.employer') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition font-medium text-decoration-none">Request
                                        Employer Role</button>
                                </form>
                            @else
                                <a href="{{ route('job_portal.create') }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition font-medium text-decoration-none">
                                    Post a Job
                                </a>
                            @endif
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition font-medium text-decoration-none">
                            Login
                        </a>
                    @endif

                </div>
                <!-- Mobile Menu Button -->
                <button id="menu-btn" class="md:hidden text-gray-700 text-2xl">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md">
            <div class="px-6 py-4 space-y-4">
                <a href="{{ route('home') }}" class="block text-gray-800 hover:text-blue-500">
                    Home
                </a>
                <a href="#" class="block text-gray-500 hover:text-blue-800">
                    Jobs
                </a>
                <a href="{{ route('companies.create') }}" class="block text-gray-800 hover:text-blue-500">
                    Companies
                </a>
                <hr>
                <a href="{{ route('login') }}" class="block text-gray-800 hover:text-blue-500">Login</a>
                <a href="{{ route('job_portal.create') }}"
                    class="block text-center bg-blue-500 text-white py-2 rounded-md hover:bg-blue-700">
                    Post a Job
                </a>
            </div>
        </div>
    </nav>