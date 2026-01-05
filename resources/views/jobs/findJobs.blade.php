@extends('homes.header')
@section('main')
    <div class="min-h-screen bg-gray-50 py-10">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Breadcrumb -->
            <div class="mb-6 text-sm text-gray-500">
                <x-message />
                <a href="{{ route('home') }}" class="text-blue-600 hover:underline">Home</a>
                <span class="mx-2">/</span>
                <span class="font-medium text-gray-700">Add Job_Type</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- Sidebar -->
                <div class="md:col-span-1">
                    @include('users.sidebar')
                </div>

                <!-- Main Content -->
                <div class="md:col-span-3">
                    <div class="bg-white shadow-lg rounded-xl p-8">

                        <!-- Latest Jobs Section -->

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
                                                {{-- {{ $job->description ?? 'We are hiring a skilled professional.' }} --}}
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

                                                <a href="{{ route('job_portal.show', $job->id) }}"
                                                    class="w-full bg-blue-500 hover:bg-blue-600 text-white text-center px-4 py-2 rounded-md text-sm">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>




                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
