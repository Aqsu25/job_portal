@extends('homes.header')

@section('main')

    <div class="min-h-screen py-5">
        <div class="max-w-7xl mx-auto px-4">
            <div class="min-h-screen bg-gray-100">
                <div class="max-w-7xl mx-auto px-4">

                    <div class="min-h-screen bg-gray-100">
                        <div class="max-w-7xl mx-auto px-4">

                            <!-- Breadcrumb -->
                            <div class="mb-6 text-sm text-gray-500">
                                <x-message />
                                <a href="{{ route('home') }}" class="text-blue-600 hover:underline text-decoration-none">Home</a>
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
                                                Job / Details
                                            </h2>
                                            <p class="text-sm text-gray-500 mt-1">
                                                Please
                                                fill your job details.
                                            </p>
                                        </div>

                                        <!-- Form -->
                                        <form method="POST" action="{{ route('job_portal.store') }}" class="space-y-6">
                                            @csrf

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                                <!-- Name -->
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                                        Title <span class="text-red-500">*</span>
                                                    </label>
                                                    <input type="text" name="title" value="{{ old('title') }}"
                                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Enter your title">
                                                    @error('title')
                                                        <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <!-- Category  -->
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                                        Category <span class="text-red-500">*</span>
                                                    </label>
                                                    <select name="category_id" id=""
                                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                                        @if ($categories->isNotEmpty())
                                                            <option value="">Select a Category</option>
                                                            @foreach ($categories as $category)
                                                                <option
                                                                    value="{{ $category->id }}"{{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                                    {{ $category->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('category_id')
                                                        <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>
                                            {{-- company-name --}}
                                            <div class="">
                                                <!-- Category  -->
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                                        Company<span class="text-red-500">*</span>
                                                    </label>
                                                    <select name="company_id" id=""
                                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                                        @if ($companies->isNotEmpty())
                                                            <option value="">Select a Company</option>
                                                            @foreach ($companies as $company)
                                                                <option value="{{ $company->id }}"
                                                                    {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                                                    {{ $company->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('company_id')
                                                        <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                                {{-- degree --}}
                                            <div class="">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                                        Degree<span class="text-red-500">*</span>
                                                    </label>
                                                    <select name="degree_id" id=""
                                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                                        @if ($degrees->isNotEmpty())
                                                            <option value="">Select a Company</option>
                                                            @foreach ($degrees as $degree)
                                                                <option value="{{ $degree->id }}"
                                                                    {{ old('degree_id') == $degree->id ? 'selected' : '' }}>
                                                                    {{ $degree->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('degree_id')
                                                        <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                                <!-- Name -->
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                                        Job Nature <span class="text-red-500">*</span>
                                                    </label>
                                                    <select name="type_id" id=""
                                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                                        @if ($jobNature->isNotEmpty())
                                                            <option value="">Select a Job Nature</option>
                                                            @foreach ($jobNature as $type)
                                                                <option value="{{ $type->id }}"
                                                                    {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                                                    {{ $type->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('type_id')
                                                        <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>



                                                <!-- Email -->
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                                        Vacancy <span class="text-red-500">*</span>
                                                    </label>
                                                    <input type="number" min="1" max="50" name="vacancy"
                                                        value="{{ old('vacancy') }}"
                                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Vacancy">
                                                    @error('vacancy')
                                                        <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                                <!-- Name -->
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                                        Salary
                                                    </label>
                                                    <input type="text" name="salary" value="{{ old('salary') }}"
                                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Salary">
                                                </div>

                                                <!-- Email -->
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                                        Location <span class="text-red-500">*</span>
                                                    </label>
                                                    <input type="text" name="location" value="{{ old('location') }}"
                                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                        placeholder="Location">
                                                    @error('location')
                                                        <p class="text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Description -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    Description
                                                </label>
                                                <textarea name="description" id="" cols="20" rows="5"
                                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>

                                            </div>
                                            <!-- Benefits -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    Benefits
                                                </label>
                                                <textarea name="benefits" id="" cols="20" rows="5"
                                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ old('benefits') }}</textarea>

                                            </div>
                                            <!-- Benefits -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    Responsibility
                                                </label>
                                                <textarea name="responsibility" id="" cols="20" rows="5"
                                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ old('responsibility') }}</textarea>

                                            </div>
                                            <!-- Qualifications -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    Qualifications
                                                </label>
                                                <textarea name="qualifications" id="" cols="20" rows="5"
                                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ old('qualifications') }}</textarea>

                                            </div>
                                            <!-- keywords -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    Keywords
                                                </label>
                                                <input type="text" name="keywords" value="{{ old('keywords') }}"
                                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                                    placeholder="Keywords ">

                                            </div>
                                            <!-- experience -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    Experience <span class="text-red-500">*</span>
                                                </label>
                                                <select name="experience" id="" class="form-control">
                                                    <option value="">Select Year</option>
                                                    <option value="1">1 Year</option>
                                                    <option value="2">2 Years</option>
                                                    <option value="3">3 Years</option>
                                                    <option value="4">4 Years</option>
                                                    <option value="5">5 Years</option>
                                                    <option value="6">6 Years</option>
                                                    <option value="7">7 Years</option>
                                                    <option value="8">8 Years</option>
                                                    <option value="9">9 Years</option>
                                                    <option value="10">10 Years</option>
                                                    <option value="10_plus">10+ Years</option>
                                                </select>

                                            </div>
                                            <!-- Submit -->
                                            <div class="pt-4 flex justify-end">
                                                <button type="submit"
                                                    class="px-8 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition">
                                                    Save Job
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
