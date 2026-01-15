@extends('homes.main')

@section('main')
    <!-- Hero Section -->
    <section class="relative">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1556761175-4b46a572b786?auto=format&fit=crop&w=1470&q=80"
                alt="Jobs Background" class="w-full h-full object-cover opacity-70">
            <div class="absolute inset-0 bg-gray-900 bg-opacity-50"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-6 py-32 text-center md:text-left">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Find Your <span class="text-blue-500">Dream Job</span> Today
            </h1>
            <p class="text-gray-200 text-lg md:text-xl mb-8">
                Explore thousands of jobs and connect with top companies. <br> Your next career opportunity is here.
            </p>


            <!-- Call-to-Action Buttons -->
            {{-- <div class="flex flex-col md:flex-row gap-4 justify-center md:justify-start">
                <a href="#jobs"
                    class="text-decoration-none bg-white text-gray-900 px-6 py-3 rounded-md font-semibold hover:bg-gray-100 transition">
                    Browse Jobs
                </a>
            </div> --}}
        </div>
    </section>
@endsection

@section('keyword')
    <!-- Job Filters Section -->
    <section class="bg-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-6 py-6">
            <form method="GET" action="{{ route('find.jobs') }}"
                class="flex flex-col md:flex-row gap-4 justify-center items-center bg-white p-6 rounded-lg shadow-md">

                <!-- Keyword -->
                <div class="flex-1">
                    <label class="sr-only" for="keywords">Keyword</label>
                    <input type="text" id="keywords" name="keywords" placeholder="Job title or keyword"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800">
                </div>

                <!-- Location -->
                <div class="flex-1">
                    <label class="sr-only" for="location">Location</label>
                    <input type="text" id="location" name="location" placeholder="location"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800">
                </div>

                <!-- Category -->
                <div class="flex-1">
                    <label class="sr-only" for="category_id">Category</label>
                    <select id="category_id" name="category_id"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-800">
                        @if ($categories->isNotEmpty())
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <!-- Search Button -->
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-semibold transition">
                    Search
                </button>
            </form>
        </div>
    </section>
@endsection

@section('popular')
    <!-- Popular Categories Section -->

    <div class="max-w-7xl mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold text-blue-500 hover:text-blue-700 text-center mb-12 mt-12">
            Explore Popular Job Categories
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @if ($categories->isNotEmpty())
                @foreach ($categories as $category)
                    <!-- Category Card -->
                    <div
                        class="bg-white rounded-lg shadow-md hover:shadow-xl transition p-6 flex flex-col items-center text-center">
                        <a href="{{ route('find.jobs') . '?category_id=' . $category->id }}"
                            class="text-decoration-none font-bond">{{ $category->name }}
                        </a>
                        <p class="text-gray-500">{{ optional($category->jobDetail)->vacancy }}&nbsp;Jobs</p>
                    </div>
                @endforeach
            @endif



            <!-- Add more categories here -->
        </div>
    </div>
@endsection
@section('featured')
    <section class="bg-gray-100 py-5">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Heading -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900">
                    Featured <span class="text-blue-500">Jobs</span>
                </h2>
                <p class="text-gray-500 mt-2 text-sm">
                    Hand-picked opportunities for you
                </p>
            </div>

            <!-- Jobs Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @if ($isFeatured->isNotEmpty())
                    @foreach ($isFeatured as $job)
                        <div
                            class="bg-white rounded-lg border border-gray-200 hover:border-blue-500 hover:shadow-lg transition p-3">
                            <h3 class="text-lg font-semibold text-gray-800 hover:text-blue-500">
                                {{ $job->title }}
                            </h3>

                            <p class="text-gray-500 text-sm mt-1 line-clamp-1">
                                @if (!empty($job->description))
                                    {{ Illuminate\Support\Str::words($job->description, 10) }}
                                @endif
                            </p>
                            <div class="">
                                <div class="text-sm text-gray-600 mt-4 p-3 bg-gray-100 rounded space-y-1">

                                    @if (!empty($job->location))
                                        <span><i class="fa-solid fa-location-crosshairs text-red-500"></i>&nbsp;
                                            {{ $job->location }}</span><br>
                                    @endif
                                    <span><i class="fa fa-tasks text-yellow-500"></i>&nbsp;
                                        {{ $job->type->name }}</span><br>
                                    <span class="">
                                        <i class="fa-solid fa-dollar-sign text-green-600"></i>&nbsp;
                                        {{ $job->salary ?? 'Negotiable' }}
                                    </span>
                                </div>
                            </div>


                            <div class="flex justify-center mt-3">
                                <a href="{{ route('job_portal.detail', $job->id) }}"
                                    class="w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white text-center px-4 py-2 rounded-md text-sm text-decoration-none">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
@section('latest')
    <!-- Latest Jobs Section -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Section Heading -->
            <div class="text-center mb-10">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800">
                    Latest <span class="text-blue-500">Jobs</span>
                </h2>
                <p class="text-gray-500 mt-2 text-sm sm:text-base">
                    Explore the newest opportunities available for you
                </p>
            </div>

            <!-- Jobs Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @if ($latestJob->isNotEmpty())
                    @foreach ($latestJob as $latestjob)
                        <div
                            class="bg-white rounded-lg border border-gray-100 p-4 flex flex-col justify-between h-full
                        transform transition duration-500 hover:-translate-y-1 hover:scale-105 hover:shadow-lg
                        animate-fadeIn">

                            <!-- Job Title -->
                            <h3
                                class="text-md sm:text-lg font-semibold text-gray-800 hover:text-blue-500 truncate
                            transition-colors duration-300">
                                {{ $latestjob->title }}
                            </h3>

                            <!-- Short Description -->
                            @if (!empty($latestjob->description))
                                <p
                                    class="text-gray-500 text-xs sm:text-sm mt-1 line-clamp-2
                            transition-colors duration-300">
                                    {{ Illuminate\Support\Str::words($latestjob->description, 10) }}
                                </p>
                            @endif
                            <!-- Job Details Box -->
                            <!-- Job Details Box -->
                            <div class="">
                                <div class="text-sm text-gray-600 mt-2 p-3 bg-gray-100 rounded space-y-1">
                                    @if (!empty($latestjob->location))
                                        <span><i class="fa-solid fa-location-crosshairs text-red-500"></i>&nbsp;
                                            {{ $latestjob->location }}</span><br>
                                    @endif

                                    @if (!empty($latestjob->type?->name))
                                        <span><i class="fa fa-tasks text-yellow-500"></i>&nbsp;
                                            {{ $latestjob->type->name }}</span><br>
                                    @endif

                                    <span>
                                        <i class="fa-solid fa-dollar-sign text-green-600"></i>&nbsp;
                                        {{ $latestjob->salary ?? 'Negotiable' }}
                                    </span>
                                </div>
                            </div>
                            <!-- View Details Button -->
                            <div class="flex justify-center mt-3">
                                <a href="{{ route('job_portal.detail', $latestjob->id) }}"
                                    class="text-decoration-none w-full sm:w-auto bg-blue-500 hover:bg-blue-600 text-white text-center px-4 py-2
                                rounded-md text-sm no-underline transition-all duration-300 hover:scale-105 hover:shadow-md">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="w-full text-center text-gray-500">No latest jobs available at the moment.</p>
                @endif
            </div>
        </div>
    </section>

    <!-- Fade-in Animation CSS -->
    <style>
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.6s ease forwards;
        }

        /* Stagger animation for each card */
        .grid>div:nth-child(1) {
            animation-delay: 0.1s;
        }

        .grid>div:nth-child(2) {
            animation-delay: 0.2s;
        }

        .grid>div:nth-child(3) {
            animation-delay: 0.3s;
        }

        .grid>div:nth-child(4) {
            animation-delay: 0.4s;
        }

        .grid>div:nth-child(5) {
            animation-delay: 0.5s;
        }

        .grid>div:nth-child(6) {
            animation-delay: 0.6s;
        }
    </style>
@endsection
