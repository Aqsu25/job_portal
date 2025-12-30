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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/fontawesome.min.css"
        integrity="sha512-M5Kq4YVQrjg5c2wsZSn27Dkfm/2ALfxmun0vUE3mPiJyK53hQBHYCVAtvMYEC7ZXmYLg8DVG4tF8gD27WmDbsg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- font --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=La+Belle+Aurore&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=League+Script&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Whisper&display=swap');
    </style>
</head>

<body>
<!-- Navbar -->
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-16">

            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <i class="fa-solid fa-briefcase text-blue-600 text-2xl"></i>
                <span class="text-2xl font-bold text-gray-800">
                    Job<span class="text-blue-600">Connect</span>
                </span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8 font-medium">
                <a href="#" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                    <i class="fa-solid fa-house"></i> Home
                </a>
                <a href="#" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                    <i class="fa-solid fa-magnifying-glass"></i> Jobs
                </a>
                <a href="#" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                    <i class="fa-solid fa-building"></i> Companies
                </a>
                <a href="#" class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition">
                    <i class="fa-solid fa-circle-info"></i> About
                </a>
            </div>

            <!-- Right Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="#" class="text-gray-600 hover:text-blue-600 font-medium">
                    Login
                </a>
                <a href="#"
                   class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition font-medium">
                    Post a Job
                </a>
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
            <a href="#" class="block text-gray-600 hover:text-blue-600">
                <i class="fa-solid fa-house mr-2"></i> Home
            </a>
            <a href="#" class="block text-gray-600 hover:text-blue-600">
                <i class="fa-solid fa-magnifying-glass mr-2"></i> Jobs
            </a>
            <a href="#" class="block text-gray-600 hover:text-blue-600">
                <i class="fa-solid fa-building mr-2"></i> Companies
            </a>
            <a href="#" class="block text-gray-600 hover:text-blue-600">
                <i class="fa-solid fa-circle-info mr-2"></i> About
            </a>
            <hr>
            <a href="#" class="block text-gray-600 hover:text-blue-600">Login</a>
            <a href="#"
               class="block text-center bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                Post a Job
            </a>
        </div>
    </div>
</nav>

</body>

</html>
