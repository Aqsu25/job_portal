<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>JobPortal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    {{-- fontawesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
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
    {{-- main --}}
    <section>
        @yield('main')
    </section>
    <section>
        @yield('keyword')
    </section>
    <section class="">
        @yield('popular')
    </section>
    <section>
        @yield('featured')
    </section>
    <section>
        @yield('latest')
    </section>


    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300">
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">

            <!-- Brand -->
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <i class="fa-solid fa-briefcase text-blue-500 text-2xl"></i>
                    <span class="text-2xl font-bold text-white">Job<span class="text-blue-500">Connect</span></span>
                </div>
                <p class="text-gray-400 text-sm">
                    Find your dream job or hire the best talent quickly and easily.
                    Connecting employers and job seekers seamlessly.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}"
                            class="hover:text-gray-500 transition text-decoration-none text-gray-400">Home</a></li>
                    <li><a href="{{ route('job_portal.index') }}"
                            class="hover:text-blue-500 transition text-decoration-none text-gray-400">Jobs</a></li>
                    <li><a href="{{ route('companies.index') }}"
                            class="hover:text-blue-500 transition text-decoration-none text-gray-400">Companies</a></li>
                    <li><a href="#"
                            class="hover:text-blue-500 transition text-decoration-none text-gray-400">About</a></li>
                    <li><a href="#"
                            class="hover:text-blue-500 transition text-decoration-none text-gray-400">Contact</a></li>
                </ul>
            </div>

            <!-- Resources / Help -->
            <div>
                <h3 class="text-white font-semibold mb-4">Resources</h3>
                <ul class="space-y-2">
                    <li><a href="#"
                            class="hover:text-blue-500 text-gray-400 transition text-decoration-none">Blog</a></li>
                    <li><a href="#"
                            class="hover:text-blue-500 text-gray-400 transition text-decoration-none">FAQ</a></li>
                    <li><a href="#"
                            class="hover:text-blue-500 text-gray-400 transition text-decoration-none">Terms of
                            Service</a></li>
                    <li><a href="#"
                            class="hover:text-blue-500 transition text-decoration-none text-gray-400">Privacy Policy</a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter & Social -->
            <div>
                <h3 class="text-white font-semibold mb-4">Subscribe</h3>
                <p class="text-gray-400 text-sm mb-4">Get the latest jobs and updates in your inbox</p>
                <form class="flex mb-4">
                    <input type="email" placeholder="Your email"
                        class="w-full px-3 py-2 rounded-l-md border-none outline-none text-gray-800">
                    <button type="submit"
                        class="bg-blue-500 px-4 py-2 rounded-r-md text-white font-medium hover:bg-blue-700 transition">
                        Subscribe
                    </button>
                </form>

                <div class="flex space-x-4 mt-2">
                    <a href="#" class="hover:text-blue-500 text-white transition"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#" class="hover:text-blue-500 text-white transition"><i
                            class="fab fa-twitter"></i></a>
                    <a href="#" class="hover:text-pink-500 text-white transition"><i
                            class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-blue-500 text-white transition"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

        </div>

        <div class="border-t border-gray-800 mt-8 pt-6 text-center text-white mb-5 text-sm py-3">
            &copy; {{ date('Y') }} <span class="font-semibold text-white">JobConnect</span>. All rights reserved.
        </div>

    </footer>
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
