@extends('homes.header')

@section('main')
  <div class="min-h-screen bg-gray-50 py-10">
    <div class="max-w-7xl mx-auto px-4">

<<<<<<< Updated upstream
            <!-- Breadcrumb -->
            <div class="mb-6 text-sm text-gray-500">
                <a href="{{ route('home') }}" class="text-blue-600 hover:underline">Home</a>
                <span class="mx-2">/</span>
                <span class=text-gray-700">Post a Job</span>
            </div>
=======
      <!-- Breadcrumb -->
      <div class="mb-6 text-sm text-gray-500">
        <x-message />
        <a href="{{ route('home') }}" class="text-blue-600 hover:underline">Home</a>
        <span class="mx-2">/</span>
        <span class="font-medium text-gray-700">Post a Job</span>
      </div>
>>>>>>> Stashed changes

      <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

<<<<<<< Updated upstream
                <!-- Sidebar -->
                <div class="md:col-span-1">
                    @include('users.sidebar')
                </div>

                <!-- Main Content -->
                <div class="md:col-span-3">
                    <div class="bg-white shadow-lg rounded-xl p-8">
                        <!-- Heading -->
                        <x-message></x-message>
                        <div class="flex justify-between items-center gap-4">
                            <h2 class="text-2xl font-semibold text-gray-800">
                                My Jobs
                            </h2>
                            <a href="{{ route('job_portal.create') }}"
                                class="bg-blue-400  border text-decoration-none text-white rounded-md px-3 py-2 font-bond hover:bg-blue-600">Post
                                a Job</a>
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
                                    @forelse ($jobs as $job)
                                        <tr class="border-b hover:bg-gray-50">

                                            <td class="p-3 text-gray-900">
                                                <div class="flex flex-col space-y-1">
                                                    <!-- Job Title -->
                                                    <p class="text-gray-800 hover:text-blue-600 transition">
                                                        {{ $job->title }}
                                                    </p>

                                                    <!-- Type & Location -->
                                                    <div class="flex items-center space-x-2 mt-1">
                                                        <!-- Type Badge -->
                                                        <span class=" py-1 text-xs font-medium text-blue-800l">
                                                            {{ $job->type->name }}&nbsp;.
                                                        </span>

                                                        <!-- Location -->
                                                        <span class="text-gray-500 text-sm">
                                                            {{ $job->location }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="p-3 text-gray-900">
                                                {{ \Carbon\Carbon::parse($job->created_at)->format('d M,Y') }}
                                            </td>
                                            <td class="p-3 text-gray-900">
                                                0
                                            </td>
                                            <td class="p-3 text-gray-900">
                                                 @if ($job->status == 1)
                                                        <i class="fa-solid fa-check text-success"></i>
                                                    @else
                                                        <i class="fa-solid fa-xmark text-danger"></i>
                                                    @endif


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
                <p>{{ $jobs->links() }}</p>
            </div>
=======
        <!-- Sidebar -->
        <div class="md:col-span-1">
          @include('users.sidebar')
>>>>>>> Stashed changes
        </div>

        <!-- Main Content -->
        <div class="md:col-span-3">
          <div class="bg-white shadow-lg rounded-xl p-8">

            <!-- Title -->
            <div class="border-b pb-4 mb-6">
              <h2 class="text-2xl font-semibold text-gray-800">
                My Jobs
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
                            <a href="{{ route('job_portal.edit', $job->id) }}" class="text-blue-600 hover:text-blue-800">
                              <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('job_portal.destroy', $job->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure?')">
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
