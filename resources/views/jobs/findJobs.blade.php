@extends('homes.header')
@section('main')
    <section class="py-5">
        <div class="container">
            <!-- Header -->
            <div class="row mb-4 align-items-center">
                <div class="col-md-10">
                    <h2 class="fw-bold text-blue-500">Find Jobs</h2>
                </div>
                <div class="col-md-2">
                    <form action="{{ route('find.jobs') }}" method="POST">
                        @csrf
                        <div class="flex justify-center gap-2">
                            <select name="sort" id="sort" class="form-select">
                                <option value="1" {{ Request::get('sort') === '1' ? 'selected' : '' }}>Latest</option>
                                <option value="0" {{ Request::get('sort') === '0' ? 'selected' : '' }}>Oldest</option>
                            </select>
                            <button class="" type="submit"><i class="fas fa-search"></i></button>

                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-4 col-lg-3 mb-4">
                    <form action="{{ route('find.jobs') }}" method="POST">
                        @csrf
                        <div class="card shadow-sm p-4 border-0">
                            <div class="mb-3">
                                <h6 class="fw-bold text-secondary">Keywords</h6>
                                <input value="{{ Request::get('keywords') }}" type="text" placeholder="Keywords"
                                    class="form-control" name="keywords">
                            </div>

                            <div class="mb-3">
                                <h6 class="fw-bold text-secondary">Location</h6>
                                <input value="{{ request('location') }}" type="text" placeholder="Location"
                                    class="form-control" name="location">
                            </div>

                            <div class="mb-3">
                                <h6 class="fw-bold text-secondary">Category</h6>
                                <select name="category_id" class="form-select">
                                    <option value="">Select Category</option>
                                    @if ($categories->isNotEmpty())
                                        @foreach ($categories as $category)
                                            <option {{ Request::get('category_id') == $category->id ? 'selected' : '' }}
                                                value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="mb-3">
                                <h6 class="fw-bold text-secondary">Job Type</h6>
                                @if ($types->isNotEmpty())
                                    @foreach ($types as $type)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="job_types[]"
                                                value="{{ $type->id }}" id="type{{ $type->id }}"
                                                {{ in_array($type->id, (array) request()->job_types) ? 'checked' : '' }}>
                                            <label class="form-check-label"
                                                for="type{{ $type->id }}">{{ $type->name }}</label>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted small">No job types available.</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <h6 class="fw-bold text-secondary">Experience</h6>
                                <select name="experience" id="" class="form-control">
                                    <option value="">Select Year</option>
                                    <option value="1" {{ Request::get('experience') == 1 ? 'selected' : '' }}>1 Year
                                    </option>
                                    <option value="2" {{ Request::get('experience') == 2 ? 'selected' : '' }}>2
                                        Years</option>
                                    <option value="3" {{ Request::get('experience') == 3 ? 'selected' : '' }}>3
                                        Years</option>
                                    <option value="4" {{ Request::get('experience') == 4 ? 'selected' : '' }}>4
                                        Years</option>
                                    <option value="5" {{ Request::get('experience') == 5 ? 'selected' : '' }}>5
                                        Years</option>
                                    <option value="6" {{ Request::get('experience') == 6 ? 'selected' : '' }}>6
                                        Years</option>
                                    <option value="7" {{ Request::get('experience') == 7 ? 'selected' : '' }}>7
                                        Years</option>
                                    <option value="8" {{ Request::get('experience') == 8 ? 'selected' : '' }}>8
                                        Years</option>
                                    <option value="9" {{ Request::get('experience') == 9 ? 'selected' : '' }}>9
                                        Years</option>
                                    <option value="10" {{ Request::get('experience') == 10 ? 'selected' : '' }}>10
                                        Years</option>
                                    <option value="10_plus"
                                        {{ Request::get('experience') == '10_plus' ? 'selected' : '' }}>10+ Years
                                    </option>
                                </select>
                            </div>


                            <button
                                class="px-8 py-2 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-700 transition text-center text-decoration-none"
                                type="submit">Search</button>
                            <a href="{{ route('find.jobs') }}"
                                class="px-8 py-2 bg-gray-800 mt-1 text-white rounded-lg font-medium hover:bg-blue-700 transition text-center text-decoration-none">Reset</a>
                        </div>
                    </form>
                </div>

                <!-- Job Cards -->
                <div class="col-md-8 col-lg-9">
                    <div class="row">
                        @if ($jobdetails->isNotEmpty())
                            @foreach ($jobdetails as $job)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card border-0 shadow-sm h-100 hover-shadow">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-blue-500 fw-bold">{{ $job->title }}</h5>
                                            <p class="card-text text-muted">
                                                {{ \Illuminate\Support\Str::limit($job->description, 30, '...') }}
                                            </p>

                                            <div
                                                class="bg-light border p-2 mb-3 rounded d-flex flex-wrap gap-3 align-items-center">
                                                <span class="d-flex align-items-center gap-1">
                                                    <i class="fa-solid fa-location-dot text-danger"></i>
                                                    {{ $job->location ?? 'N/A' }}
                                                </span>
                                                <span class="d-flex align-items-center gap-1">
                                                    <i class="fa fa-tasks text-blue-600"></i>
                                                    {{ $job->type->name ?? 'N/A' }}
                                                </span>
                                                <span class="d-flex align-items-center gap-1">
                                                    <i class="fa fa-usd text-success"></i>
                                                    {{ $job->salary ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="mt-auto d-grid">
                                                <a href="{{ route('job_portal.detail', $job->id) }}"
                                                    class="px-8 py-2 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-700 transition text-center text-decoration-none">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <p class="text-muted">No jobs found.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .hover-shadow:hover {
            transform: translateY(-3px);
            transition: all 0.3s ease-in-out;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
    </style>
@endsection
