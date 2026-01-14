@extends('homes.main')

@section('main')
<div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800 mt-2">Employer Dashboard</h1>
                <p class="text-sm text-gray-500 mt-1">Welcome back, {{ auth()->user()->name }}</p>
            </div>
            <div class="text-sm text-gray-400">{{ now()->format('l, d F Y') }}</div>
        </div>

        <!-- Flash Messages -->
        <x-message />

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Total Jobs -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Jobs</p>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $totalJobs ?? 0 }}</h2>
                    </div>
                    <div class="bg-blue-50 p-3 rounded-full">
                        <i class="fa-solid fa-briefcase text-blue-500"></i>
                    </div>
                </div>
            </div>

            <!-- Total Applications -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Applications</p>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $totalApplications ?? 0 }}</h2>
                    </div>
                    <div class="bg-green-50 p-3 rounded-full">
                        <i class="fa-solid fa-file-lines text-green-500"></i>
                    </div>
                </div>
            </div>

            <!-- Employer Status -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                <p class="text-sm text-gray-500">Employer Status</p>
                <h2 class="text-lg font-semibold text-gray-800 mt-1">
                    Employer
                </h2>
            </div>

            <!-- Account -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                <p class="text-sm text-gray-500">Account</p>
                <h2 class="text-lg font-semibold text-gray-800 mt-1">Active</h2>
            </div>

        </div>

        <!-- Profile Status -->
        <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm mt-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <p class="text-sm text-gray-500">Profile Status</p>
                    <h2 class="text-lg font-semibold mt-1 {{ auth()->user()->profile_completed ? 'text-green-600' : 'text-red-500' }}">
                        {{ auth()->user()->profile_completed ? 'Completed' : 'Incomplete' }}
                    </h2>
                </div>
                <a href="{{ route('myprofile') }}"
                    class="text-decoration-none px-4 py-2 rounded-md border border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-50 transition flex items-center gap-2">
                    <i class="fa-solid fa-pen text-gray-500"></i> Update Profile
                </a>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('job_portal.create') }}"
                   class="text-decoration-none px-5 py-2.5 rounded-md bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> Post Job
                </a>

                <a href="{{ route('job_portal.index') }}"
                   class="text-decoration-none px-5 py-2.5 rounded-md border border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-50 transition flex items-center gap-2">
                    <i class="fa-solid fa-list"></i> View Jobs
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
