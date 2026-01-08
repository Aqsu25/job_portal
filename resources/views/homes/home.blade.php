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
                Find Your <span class="text-blue-400">Dream Job</span> Today
            </h1>
            <p class="text-gray-200 text-lg md:text-xl mb-8">
                Explore thousands of jobs and connect with top companies. <br> Your next career opportunity is here.
            </p>


            <!-- Call-to-Action Buttons -->
            <div class="flex flex-col md:flex-row gap-4 justify-center md:justify-start">
                <a href="#jobs"
                    class="text-decoration-none bg-white text-gray-900 px-6 py-3 rounded-md font-semibold hover:bg-gray-100 transition">
                    Browse Jobs
                </a>
            </div>
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
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800">
                </div>

                <!-- Location -->
                <div class="flex-1">
                    <label class="sr-only" for="location">Location</label>
                    <input type="text" id="location" name="location" placeholder="location"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800">
                </div>

                <!-- Category -->
                <div class="flex-1">
                    <label class="sr-only" for="category_id">Category</label>
                    <select id="category_id" name="category_id"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800">
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
                    class="bg-blue-400 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-semibold transition">
                    Search
                </button>
            </form>
        </div>
    </section>
@endsection

@section('popular')
    <!-- Popular Categories Section -->

    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-2xl font-bold text-blue-400 text-center mb-12 mt-12">
            Explore Popular Job Categories
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @if ($categories->isNotEmpty())
                @foreach ($categories as $category)
                    <!-- Category Card -->
                    <div
                        class="bg-white rounded-lg shadow-md hover:shadow-xl transition p-6 flex flex-col items-center text-center">
                        <a href="{{ route('find.jobs') . '?category_id=' . $category->id }}"
                            class="text-decoration-none">{{ $category->name }}
                        </a>
                        <p class="text-gray-500">1,245 Jobs</p>
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

            <div class="grid grid-cols-3 gap-6">
                @if ($isFeatured->isNotEmpty())
                    @foreach ($isFeatured as $job)
                        <div
                            class="bg-white rounded-lg border border-gray-200 hover:border-blue-400 hover:shadow-lg transition p-3">
                            <h3 class="text-lg font-semibold text-gray-800 hover:text-blue-500">
                                {{ $job->title }}
                            </h3>

                            <p class="text-gray-500 text-sm mt-1 line-clamp-1">
                                {{ Illuminate\Support\Str::words($job->description, 10) }}
                            </p>
                            <div class="">
                                <div class="text-sm text-gray-600 mt-4 p-3 bg-gray-200 rounded">
                                    <span><i class="fa-solid fa-location-crosshairs text-danger"></i>&nbsp;
                                        {{ $job->location }}</span><br>
                                    <span><i class="fa fa-tasks text-yellow-400"></i>&nbsp;
                                        {{ $job->type->name }}</span><br>
                                    <span class="">
                                        <i class="fa-solid fa-dollar-sign text-green-600"></i>&nbsp;
                                        {{ $job->salary ?? 'Negotiable' }}
                                    </span>
                                </div>

                            </div>

                            <div class="flex justify-between items-center mt-3">

                                <a href="{{ route('job_portal.detail', $job->id) }}"
                                    class="text-decoration-none w-full bg-blue-500 hover:bg-blue-600 text-white text-center px-4 py-2 rounded-md text-sm">
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
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">
                Latest Jobs
            </h2>

            <div class="grid grid-cols-3 gap-6">
                @if ($latestJob->isNotEmpty())
                    @foreach ($latestJob as $latestjob)
                        <div
                            class="bg-white rounded-lg border border-gray-200 hover:border-blue-400 hover:shadow-lg transition p-3">
                            <h3 class="text-lg font-semibold text-gray-800 hover:text-blue-500">
                                {{ $latestjob->title }}
                            </h3>

                            <p class="text-gray-500 text-sm mt-1 line-clamp-1">
                                {{ Illuminate\Support\Str::words($latestjob->description, 10) }}
                            </p>
                            <div class="">
                                <div class="text-sm text-gray-600 mt-4 p-3 bg-gray-200 rounded">
                                    <span><i class="fa-solid fa-location-crosshairs text-danger"></i>&nbsp;
                                        {{ $latestjob->location }}</span><br>
                                    <span><i class="fa fa-tasks text-yellow-400"></i>&nbsp;
                                        {{ $latestjob->type->name }}</span><br>
                                    <span class="">
                                        <i class="fa-solid fa-dollar-sign text-green-600"></i>&nbsp;
                                        {{ $latestjob->salary ?? 'Negotiable' }}
                                    </span>
                                </div>

                            </div>
                            <div class="flex justify-between items-center mt-3">

                                <a href="{{ route('job_portal.detail', $job->id) }}"
                                    class="text-decoration-none w-full bg-blue-500 hover:bg-blue-600 text-white text-center px-4 py-2 rounded-md text-sm text-decoration-none">
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
