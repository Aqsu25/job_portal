@extends('homes.main')

@section('main')

    <div class="min-h-screen bg-gray-100">
        <div class="max-w-6xl mx-auto px-6 py-10">

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-semibold text-gray-800">
                    Job Seeker Dashboard
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Welcome, {{ auth()->user()->name }}
                </p>
            </div>

            <!-- Messages -->
            <x-message />

            <!-- Key Stats -->
            <div class="grid grid-cols-2 sm:grid-cols-2 gap-6">

                <!-- Applied Jobs -->
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <p class="text-sm text-gray-500">Applied Jobs</p>
                    <h2 class="text-3xl font-semibold text-gray-800 mt-2">
                        {{ $recentApplications->total() ?? 0 }}
                    </h2>
                </div>

                <!-- Saved Jobs -->
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <p class="text-sm text-gray-500">Saved Jobs</p>
                    <h2 class="text-3xl font-semibold text-gray-800 mt-2">
                        {{ $savedJobsCount ?? 0 }}
                    </h2>
                </div>
            </div>

            <!-- Profile Status -->

            <div class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm mt-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <!-- Profile Info -->
                    <div>
                        <p class="text-sm text-gray-500">Profile Status</p>
                        <h2 class="text-lg font-semibold text-red-500 mt-1">
                            {{ auth()->user()->profile ? 'Completed' : 'Incomplete' }}
                        </h2>
                    </div>

                    <!-- Update Button -->
                    <a href="{{ route('myprofile') }}"
                        class="px-4 py-2 rounded-md border border-gray-300 text-gray-700 text-sm font-medium 
                  hover:bg-gray-50 transition flex items-center gap-2 text-decoration-none">
                        <i class="fa-solid fa-pen text-gray-500"></i>
                        Update Profile
                    </a>

                </div>
            </div>




            <!-- Recent Applications -->
            <div class="mt-8 bg-white rounded-lg border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">
                    Recent Applications
                </h3>

                @if ($recentApplications->count())
                    <div class="space-y-4">
                        @foreach ($recentApplications as $application)
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium text-gray-800">
                                        {{ $application->job->title }}
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        Applied on {{ $application->created_at->format('d M Y') }}
                                    </p>
                                </div>

                                <span
                                    class="text-sm font-medium
                                {{ $application->status == 'pending'
                                    ? 'text-yellow-500'
                                    : ($application->status == 'approved'
                                        ? 'text-green-600'
                                        : 'text-red-500') }}">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $recentApplications->links() }}
                    </div>
                @else
                    <p class="text-sm text-gray-500">
                        You have not applied for any jobs yet.
                    </p>
                @endif
            </div>

        </div>
    </div>

@endsection
