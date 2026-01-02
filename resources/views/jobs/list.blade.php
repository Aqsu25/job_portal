@extends('homes.header')

@section('main')
    <div class="min-h-screen bg-gray-50 py-10">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Breadcrumb -->
            <div class="mb-6 text-sm text-gray-500">
                <x-message />
                <a href="{{ route('home') }}" class="text-blue-600 hover:underline">Home</a>
                <span class="mx-2">/</span>
                <span class="font-medium text-gray-700">Post a Job</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- Sidebar -->
                <div class="md:col-span-1">
                    @include('users.sidebar')
                </div>

                <!-- Main Content -->
                <div class="md:col-span-3">
                    <div class="bg-white shadow-lg rounded-xl p-8">

                        <!-- Title -->
                        <div class="border-b pb-4 mb-6">
                            <h2 class="text-2xl font-semibold text-gray-800">
                                Jobs / Applied
                            </h2>
                            <p class="text-sm text-gray-500 mt-1">
                                Please
                                complete your profile information accurately.
                            </p>
                        </div>
                        <div class="max-w-7xl mx-auto mt-6 px-4">
                            <div class="overflow-x-auto bg-white shadow rounded-lg">
                                <x-message />

                               <table class="w-full">
                        <thead class="bg-gray-50">
                                        <tr>
                                            <th class="p-3 text-left">Title</th>
                                            <th class="p-3 text-left">Job Created</th>
                                            <th class="p-3 text-left">Status</th>
                                            <th class="p-3 text-left">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-sm">
                                        @forelse ($jobs as $job)
                                            <tr class="border-b hover:bg-gray-50">

                                                <td class="p-3 font-medium text-gray-900">
                                                    {{ $job->title }}
                                                </td>

                                                <td class="p-3 font-medium text-gray-900">
                                                    {{ \Carbon\Carbon::parse($job->created_at)->format('d M,Y') }}
                                                </td>
                                                <td class="p-3">
                                                    <div class="flex gap-3">
                                                        <a href="{{ route('job_portal.edit', $job->id) }}"
                                                            class="text-blue-600 hover:text-blue-800">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form action="{{ route('job_portal.destroy', $job->id) }}"
                                                            method="POST" onsubmit="return confirm('Are you sure?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 hover:text-red-800">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="p-6 text-center text-gray-500">
                                                    No jobs found.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        {{--  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
