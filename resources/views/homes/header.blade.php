<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JobPortal</title>
    {{-- tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- fontawesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    {{-- boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- font --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=La+Belle+Aurore&family=Lato:ital,wght@0,100;0,300;0,500;0,700;0,900;1,100;1,300;1,500;1,700;1,900&family=League+Script&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Whisper&display=swap');
    </style>
</head>

<body>
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
                        class="text-decoration-none flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                        Home
                    </a>
                    <a href="{{ route('job_portal.index') }}"
                        class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition text-decoration-none">
                        Jobs
                    </a>
                    <a href="{{ route('companies.index') }}"
                        class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition text-decoration-none">
                        Companies
                    </a>
                    <a href="#" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition text-decoration-none">
                        About
                    </a>
                </div>

                <!-- Right Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    @if (Auth::check())
                        <a href="{{ route('myprofile') }}" class="text-gray-600 hover:text-blue-600 font-medium text-decoration-none">
                            My Profile
                        </a>
                        <a href="{{ route('job_portal.create') }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition font-medium text-decoration-none">
                            Post a Job
                        </a>
                    @else
                        {{-- <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 font-medium">
                        </a> --}}
                        <a href="{{ route('login') }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition font-medium">
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
                <a href="{{ route('home') }}" class="block text-gray-600 hover:text-blue-600">
                    Home
                </a>
                <a href="#" class="block text-gray-600 hover:text-blue-600">
                    Jobs
                </a>
                <a href="{{ route('companies.create') }}" class="block text-gray-600 hover:text-blue-600">
                    Companies
                </a>
                <a href="#" class="block text-gray-600 hover:text-blue-600">
                    About
                </a>
                <hr>
                <a href="{{ route('login') }}" class="block text-gray-600 hover:text-blue-600">Login</a>
                <a href="{{ route('job_portal.create') }}"
                    class="block text-center bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                    Post a Job
                </a>
            </div>
        </div>
    </nav>
    {{-- main --}}
    <section class="py-3 bg-gray-100">
        @yield('main')
    </section>

</body>

</html>
