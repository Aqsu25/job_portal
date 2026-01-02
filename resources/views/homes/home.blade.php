@extends('homes.main')

@section('main')
    <!-- Hero Section -->
    <section class="relative bg-gray-900">
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
                    class="bg-white text-gray-900 px-6 py-3 rounded-md font-semibold hover:bg-gray-100 transition">
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
            <form class="flex flex-col md:flex-row gap-4 justify-center items-center bg-white p-6 rounded-lg shadow-md">

                <!-- Keyword -->
                <div class="flex-1">
                    <label class="sr-only" for="keyword">Keyword</label>
                    <input type="text" id="keyword" name="keyword" placeholder="Job title or keyword"
                        class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800">
                </div>

                <!-- Location -->
                <div class="flex-1">
                    <label class="sr-only" for="location">Location</label>
                    <select id="location" name="location"
                        class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800">
                        <option value="">Select Location</option>
                        <option value="newyork">New York</option>
                        <option value="sanfran">San Francisco</option>
                        <option value="london">London</option>
                        <option value="tokyo">Tokyo</option>
                    </select>
                </div>

                <!-- Category -->
                <div class="flex-1">
                    <label class="sr-only" for="category">Category</label>
                    <select id="category" name="category"
                        class="w-full px-4 py-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-800">
                        <option value="">Select Category</option>
                        <option value="it">IT & Software</option>
                        <option value="marketing">Marketing</option>
                        <option value="design">Design</option>
                        <option value="finance">Finance</option>
                    </select>
                </div>

                <!-- Search Button -->
                <button type="submit"
                    class="bg-blue-400 hover:bg-blue-700 text-white px-6 py-3 rounded-md font-semibold transition">
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
            <!-- Category Card -->
            <div
                class="bg-white rounded-lg shadow-md hover:shadow-xl transition p-6 flex flex-col items-center text-center">
                <div class="bg-blue-100 text-blue-600 p-4 rounded-full mb-4">
                    <i class="fa-solid fa-laptop-code text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">IT & Software</h3>
                <p class="text-gray-500">1,245 Jobs</p>
            </div>

            <div
                class="bg-white rounded-lg shadow-md hover:shadow-xl transition p-6 flex flex-col items-center text-center">
                <div class="bg-green-100 text-green-600 p-4 rounded-full mb-4">
                    <i class="fa-solid fa-bullhorn text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Marketing</h3>
                <p class="text-gray-500">845 Jobs</p>
            </div>

            <div
                class="bg-white rounded-lg shadow-md hover:shadow-xl transition p-6 flex flex-col items-center text-center">
                <div class="bg-purple-100 text-purple-600 p-4 rounded-full mb-4">
                    <i class="fa-solid fa-paintbrush text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Design</h3>
                <p class="text-gray-500">630 Jobs</p>
            </div>

            <div
                class="bg-white rounded-lg shadow-md hover:shadow-xl transition p-6 flex flex-col items-center text-center">
                <div class="bg-yellow-100 text-yellow-600 p-4 rounded-full mb-4">
                    <i class="fa-solid fa-chart-line text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Finance</h3>
                <p class="text-gray-500">520 Jobs</p>
            </div>

            <!-- Add more categories here -->
        </div>
    </div>
@endsection
