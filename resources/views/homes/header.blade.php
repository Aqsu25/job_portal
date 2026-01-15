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
    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- select-2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- trumbowyg --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css"
        integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- font --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=La+Belle+Aurore&family=Lato:ital,wght@0,100;0,300;0,500;0,700;0,900;1,100;1,300;1,500;1,700;1,900&family=League+Script&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Whisper&display=swap');

        .botman-widget-container {
            background-image: url("{{ asset('chat-bg.jpg') }}") !important;
            background-size: cover !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
        }

        .botman-message-content {
            background-color: rgba(37, 99, 235, 0.9) !important;
            color: #fff !important;
            border-radius: 12px;
        }
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
                        class="text-decoration-none flex items-center gap-2 text-gray-800 hover:text-blue-500 transition">
                        Home
                    </a>
                    <a href="{{ route('job_portal.index') }}"
                        class="flex items-center gap-2 text-gray-800 hover:text-blue-500 transition text-decoration-none">
                        Jobs
                    </a>
                    <a href="{{ route('companies.index') }}"
                        class="flex items-center gap-2 text-gray-800 hover:text-blue-500 transition text-decoration-none">
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
                                    <button type="submit" class="btn btn-primary">Request Employer Role</button>
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
                <a href="#" class="block text-gray-800 hover:text-blue-500">
                    Jobs
                </a>
                <a href="{{ route('companies.index') }}" class="block text-gray-800 hover:text-blue-500">
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
    {{-- main --}}
    <section class="">
        @yield('main')
    </section>
    {{-- JS --}}

    <section class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
        @yield('JS')
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"
        integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <section>
        @yield('trumbowyg')
    </section>
    <!-- BOTMAN CHAT CONFIG -->
    <script>
        var botmanWidget = {
            aboutText: 'Job Portal Assistant',
            introMessage: 'Hello! I am your friendly chatbot 🤖<br>How can I help you today?',
            title: 'Job Portal Bot',
            mainColor: '#3B82F6', // widget top bar color
            bubbleBackground: '/chat-bg.jpg', // floating bubble icon background
            bubbleAvatarUrl: '/chat-bg.jpg', // your envelope/chat icon
            icon: 'fas fa-envelope', // optional: fontawesome icon
            textColor: '#ffffff',
            chatServer: '/botman',
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js"></script>

</body>

</html>
