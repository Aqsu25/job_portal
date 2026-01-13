@extends('homes.header')

@section('main')
  <section class="bg-gray-100 py-6">
    <div class="container">

      <nav class="mb-4">
        <a href="{{ route('find.jobs') }}" class="text-blue-500 text-sm text-decoration-none">
          <i class="fa fa-arrow-left"></i> Back to Jobs
        </a>
      </nav>
      <x-message></x-message>
      <div class="row g-4">

        <div class="col-lg-8">

          <div class="card border-0 shadow-sm p-5">

            <div class="d-flex justify-content-between align-items-start mb-3">
              <div>
                <h2 class="fw-bold text-blue-500">
                  {{ $job->title }}
                </h2>

                <div class="text-muted d-flex gap-4 mt-2">
                  <span>
                    <i class="fa-solid fa-location-dot text-danger"></i>
                    {{ $job->location }}
                  </span>

                  <span>
                    <i class="fa fa-briefcase text-warning"></i>
                    {{ optional($job->type)->name }}
                  </span>
                </div>
              </div>
              {{-- like-job --}}
              @auth
                <form action="{{ route('job.like', $job->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="">
                    @if ($job->liked(Auth::id()))
                      <i class="fa-solid fa-heart text-red-500"></i>
                      {{ $job->likes->count() }}
                    @else
                      <i class="fa-regular fa-heart"></i>
                      {{ $job->likes->count() }}
                    @endif
                  </button>
                </form>

              @endauth

              @guest
                <a href="{{ route('login') }}" class="text-red-500 text-sm">
                  <i class="fa-regular fa-heart">
                    {{ $job->likes->count() }}
                  </i>
                </a>
              @endguest

            </div>
            <hr>

            @if ($job->description)
              <div class="mb-4">
                <h5 class="fw-bold mb-2">Job Description</h5>
                <p class="text-muted">{{ $job->description }}</p>
              </div>
            @endif

            @if ($job->responsibility)
              <div class="mb-4">
                <h5 class="fw-bold mb-2">Responsibilities</h5>
                <ul class="list-unstyled text-muted">
                  <li class="mb-2">
                    <i class="fa fa-check-circle text-blue-500 me-2"></i>
                    {{ $job->responsibility }}
                  </li>
                </ul>
              </div>
            @endif

            @if ($job->qualifications)
              <div class="mb-4">
                <h5 class="fw-bold mb-2">Qualifications</h5>
                <ul class="list-unstyled text-muted">
                  <li class="mb-2">
                    <i class="fa fa-check-circle text-blue-500 me-2"></i>
                    {{ $job->qualifications }}
                  </li>
                </ul>
              </div>
            @endif

            @if ($job->benefits)
              <div class="mb-4">
                <h5 class="fw-bold mb-2">Benefits</h5>
                <p class="text-muted">{{ $job->benefits }}</p>
              </div>
            @endif

            <hr>

            <div class="text-end">
              @auth
                <a href="{{ route('job.save', $job->id) }}"
                  class="mx-2 bg-gray-500  border text-decoration-none text-white rounded-md px-3 py-2 font-bond hover:bg-gray-700">
                  Save Job
                </a>
                <a href="{{ route('apply.job', $job->id) }}"
                  onclick="return confirm('Are you sure you want to apply in this job?')"
                  class="bg-blue-500  border text-decoration-none text-white rounded-md px-3 py-2 font-bond hover:bg-blue-700">
                  Apply Now
                </a>
              @else
                <a href="{{ route('login') }}"
                  class="bg-blue-500  border text-decoration-none text-white rounded-md px-3 py-2 font-bond hover:bg-blue-700">
                  Login to Apply/Save
                </a>
              @endauth
            </div>
            {{-- application --}}
            @if (auth()->id() == $job->user_id)
              @if ($applicants->isNotEmpty())
                <div>
                  <div>
                    <h5 class="text-gray-500 text-center my-3">Applicants</h5>
                  </div>
                  <table class="w-full">
                    <thead class="bg-gray-50">
                      <tr class="border-b">
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Email</th>
                        <th class="px-6 py-3 text-left">Applied Date</th>
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                      {{-- @if (Auth::check() && $applicants->jobdetail_id == $job->id) --}}
                      @foreach ($applicants as $applicant)
                        <tr class="border-b">
                          <td class="px-6 py-3 text-left">{{ $applicant->id }}</td>
                          <td class="px-6 py-3 text-left">{{ optional($applicant->user)->name }}
                          </td>
                          <td class="px-6 py-3 text-left">
                            {{ optional($applicant->user)->email }}
                          </td>
                          <td class="px-6 py-3 text-left">
                            {{ \Carbon\Carbon::parse($applicant->created_at)->format('d M,Y') }}
                          </td>
                        </tr>
                      @endforeach
                      {{-- @endif --}}
                    </tbody>
                  </table>
                </div>
              @else
                <tr>
                  <td class="colspan-3">
                    No Applicants Found!
                  </td>
                </tr>
              @endif
            @endif
          </div>
        </div>

        {{-- job-summary --}}
        <div class="col-lg-4">

          <div class="card border-0 shadow-sm mb-4 p-4">
            <h5 class="fw-bold mb-3">Job Summary</h5>

            <ul class="list-unstyled text-muted small">
              <li class="mb-2">
                <i class="fa fa-calendar text-blue-500 me-2"></i>
                Posted:
                <strong>{{ $job->created_at->format('d M, Y') }}</strong>
              </li>
              @if (!empty($job->type->name))
                <li class="mb-2">
                  <i class="fa fa-clock text-blue-500 me-2"></i>
                  Job Type:
                  <strong>{{ optional($job->type)->name }}</strong>
                </li>
              @endif
              @if (!empty($job->location))
                <li class="mb-2">
                  <i class="fa fa-map-marker-alt text-blue-500 me-2"></i>
                  Location:
                  <strong>{{ $job->location }}</strong>
                </li>
              @endif
              @if (!empty($job->salary))
                <li class="mb-2">
                  <i class="fa fa-money-bill text-blue-500 me-2"></i>
                  Salary:
                  <strong>{{ $job->salary ?? 'Not Disclosed' }}</strong>
                </li>
              @endif
            </ul>
          </div>

          <div class="card border-0 shadow-sm p-4">
            <h5 class="fw-bold mb-3">Company Details</h5>

            <ul class="list-unstyled text-muted small">
              @if (!empty($job->company->name))
                <li class="mb-2">
                  <i class="fa fa-building text-blue-500 me-2"></i>
                  {{ $job->company->name ?? 'N/A' }}
                </li>
              @endif
              @if (!empty($job->company->email))
                <li class="mb-2">
                  <i class="fa fa-envelope text-blue-500 me-2"></i>
                  {{ $job->company->email ?? 'N/A' }}
                </li>
              @endif
              @if (!empty($job->company->location))
                <li>
                  <i class="fa fa-map-marker-alt text-blue-500 me-2"></i>
                  {{ $job->company->location ?? 'N/A' }}
                </li>
              @endif
              @if (!empty($job->company->website))
                <li class="mt-1">
                  <a href="" class="text-decoration-none">

                    <i class="fa fa-globe text-blue-500 me-2"></i>

                    {{ $job->company->website ?? 'N/A' }}
                  </a>
                </li>
              @endif
            </ul>
          </div>

        </div>

      </div>
    </div>
  </section>
@endsection
