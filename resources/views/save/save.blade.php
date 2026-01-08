@extends('homes.header')

@section('main')
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4">


            <!-- Breadcrumb -->
            <div class="mb-6 text-sm text-gray-500 ms-2">
                <a href="{{ route('home') }}" class="text-blue-600 hover:underline text-decoration-none">Home</a>
                <span class="mx-2">/</span>
                <span class="text-gray-700">Saved Jobs</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- Sidebar -->
                <div class="md:col-span-1">
                    @include('users.sidebar')
                </div>

                <!-- Main Content -->
                <div class="md:col-span-3">
                    <x-message></x-message>
                    <div class="bg-white shadow-lg rounded-xl p-8">
                        <!-- Heading -->
                        <div class="flex justify-between items-center gap-4">
                            <h2 class="text-2xl font-semibold text-gray-800">
                                Saved Jobs
                            </h2>
                        </div>
                        <div class="mt-4">

                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="p-3 text-left">Title</th>
                                        <th class="p-3 text-left">Job Created</th>
                                        <th class="p-3 text-left">Applicants</th>
                                        <th class="p-3 text-left">Status</th>
                                        <th class="p-3 text-left">Actions</th>
                                    </tr>
                                </thead>

                                <tbody class="text-sm">
                                    @forelse ($saveJobs as $saveJob)
                                        <tr class="border-b hover:bg-gray-50">

                                            <td class="p-3 text-gray-900">
                                                <div class="flex flex-col space-y-1">
                                                    <!-- Job Title -->
                                                    <p class="text-gray-800 hover:text-blue-600 transition">
                                                        {{ optional($saveJob->job)->title }}
                                                    </p>

                                                    <!-- Type & Location -->
                                                    <div class="flex items-center space-x-2 mt-1">
                                                        <!-- Type Badge -->
                                                        <span class=" py-1 text-xs font-medium text-blue-800l">
                                                            {{ optional($saveJob->job->type)->name }}&nbsp;.
                                                        </span>

                                                        <!-- Location -->
                                                        <span class="text-gray-500 text-sm">
                                                            {{ optional($saveJob->job)->location }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="p-3 text-gray-900">
                                                {{ \Carbon\Carbon::parse($saveJob->created_at)->format('d M,Y') }}
                                            </td>
                                            <td class="p-3 text-gray-900">
                                                {{ $saveJob->job->application->count() }} Applications
                                            </td>
                                            <td class="p-3 text-gray-900">
                                                @if ($saveJob->job->status == 1)
                                                    <i class="fa-solid fa-check text-success"></i>
                                                @else
                                                    <i class="fa-solid fa-xmark text-danger"></i>
                                                @endif


                                            </td>
                                            <td class="p-3">
                                                <div class="flex gap-3">
                                                    <a href="{{ route('job_portal.detail', $saveJob->id) }}"
                                                        class="text-blue-500 hover:text-blue-800">
                                                        <i class="fa-solid fa-eye"></i> </a>

                                                    <form action="{{ route('removeSave.job', $saveJob->id) }}"
                                                        method="POST" onsubmit="return confirm('Are you sure you want to unsave?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:text-red-800">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="p-6 text-center text-gray-500">
                                                No jobs created yet!.
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <p>{{ $saveJobs->links() }}</p>
            </div>
        </div>
    </div>
@endsection
