@extends('homes.header')

@section('main')
  <div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-7xl mx-auto px-4">

      <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

        <!-- LEFT SIDEBAR -->
        <aside class="lg:col-span-1 space-y-6">

          <!-- Company Summary -->
          <div class="bg-white p-5 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4 border-b pb-2">
              Company Summary
            </h3>

            <p class="text-sm text-gray-700">
              <strong>Name:</strong> {{ $job->company_name }}
            </p>
            <p class="text-sm text-gray-700 mt-2">
              <strong>Location:</strong> {{ $job->location }}
            </p>
            <p class="text-sm text-gray-700 mt-2">
              <strong>Website:</strong>
              <a href="#" class="text-blue-600 hover:underline">
                Visit Company
              </a>
            </p>
          </div>

          <!-- Job Summary -->
          <div class="bg-white p-5 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4 border-b pb-2">
              Job Summary
            </h3>

            <p class="text-sm text-gray-700">
              <strong>Job Type:</strong> {{ $job->job_type }}
            </p>
            <p class="text-sm text-gray-700 mt-2">
              <strong>Experience:</strong> {{ $job->experience }} Years
            </p>
            <p class="text-sm text-gray-700 mt-2">
              <strong>Salary:</strong> {{ $job->salary ?? 'Negotiable' }}
            </p>
            <p class="text-sm text-gray-700 mt-2">
              <strong>Vacancy:</strong> {{ $job->vacancy }}
            </p>
          </div>

        </aside>

        <!-- RIGHT MAIN CONTENT -->
        <section class="lg:col-span-3 bg-white p-8 rounded-lg shadow">

          <!-- Job Title -->
          <h1 class="text-2xl font-bold text-gray-800 mb-2">
            {{ $job->title }}
          </h1>

          <p class="text-sm text-gray-500 mb-6">
            Posted on {{ $job->created_at->format('d M Y') }}
          </p>

          <!-- Job Description -->
          <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">
              Job Description
            </h2>
            <p class="text-gray-700 leading-relaxed">
              {{ $job->description }}
            </p>
          </div>

          <!-- Responsibilities -->
          <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">
              Responsibilities
            </h2>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
              <li>Develop and maintain web applications</li>
              <li>Collaborate with team members</li>
              <li>Write clean and maintainable code</li>
            </ul>
          </div>

          <!-- Requirements -->
          <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">
              Requirements
            </h2>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
              <li>Laravel experience required</li>
              <li>Knowledge of MySQL</li>
              <li>Good communication skills</li>
            </ul>
          </div>

          <!-- Apply Button -->
          <div class="mt-8">
            <a href="#"
              class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
              Apply Now
            </a>
          </div>

        </section>

      </div>

    </div>
  </div>
@endsection
