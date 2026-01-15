@extends('homes.header')

@section('main')
    <div class="min-h-screen py-10 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Breadcrumb -->
            <div class="mb-6 text-sm text-gray-500">
                <x-message />
                @if (auth()->user()->hasRole('admin'))
                    <a href="{{ route('admin.index') }}" class="text-blue-500 hover:underline text-decoration-none">Admin
                        Dashboard</a>
                    <span class="mx-2 text-gray-800">/</span>
                @else
                    <a href="{{ route('home') }}" class="text-blue-600 hover:underline text-decoration-none">Home</a>
                    <span class="mx-2 text-gray-800">/</span>
                @endif
                <span class="font-medium text-gray-800">Companies</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- Sidebar -->
                @if (auth()->user()->hasRole('admin'))
                    <div class="md:col-span-1">
                        @include('admin.sidebar')
                    </div>
                @else
                    <div class="md:col-span-1">
                        @include('users.sidebar')
                    </div>
                @endif


                <!-- Main Content -->
                <div class="md:col-span-3">
                    <div class="bg-white shadow-lg rounded-xl p-8">
                        <!-- Heading -->
                        <div class="flex justify-between items-center gap-4">
                            <h2 class="text-2xl font-semibold text-gray-800">
                                Applications
                            </h2>
                        </div>
                        <div class="mt-4">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr class="border-b">
                                        <th class="px-6 py-3 text-left">Title</th>
                                        @if (auth()->user()->hasRole('admin'))
                                            <th class="px-6 py-3 text-left">Employer</th>
                                        @endif
                                        <th class="px-6 py-3 text-left">Job Seeker</th>
                                        <th class="px-6 py-3 text-left">Applied Date</th>
                                    </tr>
                                </thead>

                                <tbody class="text-sm">
                                    @forelse ($applicants as $applicant)
                                        <tr class="border-b">
                                            {{-- Job Info --}}
                                            <p class="font-medium text-gray-800">
                                                    <td class="px-6 py-3"> <a href="{{ route('job_portal.detail', $applicant->job->id) }}"
                                                            class="text-blue-500 hover:text-blue-800">
                                                            <i class="fa-solid fa-eye"></i> </a>
                                                    {{ optional($applicant->job)->title }}
                                                </p>
                                                <p class="text-xs text-gray-500 mt-1">
                                                    {{ optional($applicant->job->type)->name }} •
                                                    {{ optional($applicant->job)->location }}
                                                </p>
                                            </td>

                                            {{-- Employer (Admin only) --}}
                                            @if (auth()->user()->hasRole('admin'))
                                                <td class="px-6 py-3">
                                                    {{ optional($applicant->job->employer)->name }}
                                                </td>
                                            @endif
                                            {{-- Applicant --}}
                                            <td class="px-6 py-3">
                                                <p>{{ optional($applicant->user)->name }}</p>
                                                <p class="text-xs text-gray-500">
                                                    {{ optional($applicant->user)->email }}
                                                </p>
                                            </td>

                                            {{-- Applied Date (hidden on mobile) --}}
                                            <td class="px-6 py-3">
                                                {{ $applicant->created_at->format('d M Y, h:i A') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4">
                                                No Applicants Found!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p>{{ $applicants->links() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
