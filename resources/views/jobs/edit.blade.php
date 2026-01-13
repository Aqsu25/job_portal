@extends('homes.header')

@section('main')
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Breadcrumb -->
            <div class="mb-6 text-sm text-gray-500">
                <x-message />
                @if (auth()->user()->hasRole('admin'))
                    <a href="{{ route('admin.index') }}" class="text-blue-500 hover:underline text-decoration-none">Admin
                        Dashboard</a>
                    <span class="mx-2 text-gray-800">/</span>
                @else
                    <a href="{{ route('home') }}" class="text-blue-500 hover:underline text-decoration-none">Home</a>
                    <span class="mx-2 text-gray-800">/</span>
                @endif
                <span class="font-medium text-gray-800">Edit a Job</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @if (auth()->user()->hasRole('admin'))
                    <!-- Sidebar -->
                    <div class="md:col-span-1">
                        @include('admin.sidebar')
                    </div>
                @else
                    <!-- Sidebar -->
                    <div class="md:col-span-1">
                        @include('users.sidebar')
                    </div>
                @endif

                <!-- Main Content -->
                <div class="md:col-span-3">
                    <div class="bg-white shadow-lg rounded-xl p-8">

                        <!-- Title -->
                        <div class="border-b pb-4 mb-6">
                            <h2 class="text-2xl font-semibold text-gray-800">
                                Job / Details Edit
                            </h2>
                            <p class="text-sm text-gray-500 mt-1">
                                Please correct your
                                information accurately. </p>
                        </div>

                        <!-- Form -->
                        <form method="POST" action="{{ route('job_portal.update', $job->id) }}" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Name -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Title <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="title" value="{{ old('title', $job->title) }}"
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
                                        <option value="">Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $job->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
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
                                        <option value="">Select a Company</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}"
                                                {{ old('company_id', $job->company_id) == $company->id ? 'selected' : '' }}>
                                                {{ $company->name }}</option>
                                        @endforeach
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
                                    <select multiple name="degree_id[]" id=""
                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 degree">
                                        @if ($degrees->isNotEmpty())
                                            <option value="">Select a Degree</option>
                                            @foreach ($degrees as $degree)
                                                <option value="{{ $degree->id }}"
                                                    {{ in_array($degree->id, old('degree_id', $job->degrees->pluck('id')->toArray())) ? 'selected' : '' }}>
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
                                        <option value="">Select a Job Nature</option>
                                        @foreach ($jobNature as $nature)
                                            <option value="{{ $nature->id }}"
                                                {{ old('type_id', $job->type_id) == $nature->id ? 'selected' : '' }}>
                                                {{ $nature->name }}</option>
                                        @endforeach
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
                                        value="{{ old('vacancy', $job->vacancy) }}"
                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Vacancy">
                                    @error('vacancy')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            @if (auth()->user()->hasRole('admin'))
                                <div class="flex items-center justify-between space-x-4">

                                    <!-- Featured Checkbox (Left) -->
                                    <label class="flex items-center space-x-2">

                                        <input {{ old('isFeatured', $job->isFeatured) == '1' ? 'checked' : '' }}
                                            type="checkbox" id="isFeatured" name="isFeatured" value="1"
                                            class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-2 focus:ring-blue-400">
                                        <span class="text-gray-700 font-medium select-none">Featured Job</span>
                                    </label>

                                    <!-- Status Radios (Right) -->
                                    <div class="flex items-center space-x-6 gap-3">
                                        <!-- Active -->
                                        <label class="flex items-center space-x-2">
                                            <input {{ old('status', $job->status) == '1' ? 'checked' : '' }} type="radio"
                                                name="status" value="1"
                                                class="w-5 h-5 text-green-600 border-gray-300 focus:ring-2 focus:ring-green-400">
                                            <span class="text-gray-700 font-medium select-none">Active</span>
                                        </label>

                                        <!-- Inactive -->
                                        <label class="flex items-center space-x-2">
                                            <input {{ old('status', $job->status) == '0' ? 'checked' : '' }} type="radio"
                                                name="status" value="0"
                                                class="w-5 h-5 text-red-600 border-gray-300 focus:ring-2 focus:ring-red-400">
                                            <span class="text-gray-700 font-medium select-none">Block</span>
                                        </label>
                                    </div>
                                </div>
                            @endif



                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- Name -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Salary
                                    </label>
                                    <input type="text" name="salary" value="{{ old('salary', $job->salary) }}"
                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="Salary">
                                </div>
                                {{-- location --}}
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Location
                                    </label>
                                    <input type="text" name="location" value="{{ old('location',$job->location) }}"
                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="e.g rawalpindi">
                                </div>

                            </div>

                            <!-- Description -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Description
                                </label>
                                <textarea name="description" id="" cols="20" rows="5" class="textarea">{{ old('description', $job->description) }}</textarea>

                            </div>
                            <!-- Benefits -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Benefits
                                </label>
                                <textarea name="benefits" id="" cols="20" rows="5" class="textarea">{{ old('benefits', $job->benefits) }}</textarea>

                            </div>
                            <!-- Benefits -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Responsibility
                                </label>
                                <textarea name="responsibility" id="" cols="20" rows="5" class="textarea">{{ old('responsibility', $job->responsibility) }}</textarea>

                            </div>
                            <!-- Qualifications -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Qualifications
                                </label>
                                <textarea name="qualifications" id="" cols="20" rows="5" class="textarea">{{ old('qualifications'), $job->qualifications }}</textarea>

                            </div>
                            <!-- Qualifications -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Keywords
                                </label>
                                <input type="text" name="keywords" value="{{ old('keywords', $job->keywords) }}"
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
                                    <option value="1" {{ $job->experience == 1 ? 'selected' : '' }}>1 Year</option>
                                    <option value="2" {{ $job->experience == 2 ? 'selected' : '' }}>2 Years
                                    </option>
                                    <option value="3" {{ $job->experience == 3 ? 'selected' : '' }}>3 Years</option>
                                    <option value="4" {{ $job->experience == 4 ? 'selected' : '' }}>4 Years
                                    </option>
                                    <option value="5" {{ $job->experience == 5 ? 'selected' : '' }}>5 Years
                                    </option>
                                    <option value="6" {{ $job->experience == 6 ? 'selected' : '' }}>6 Years
                                    </option>
                                    <option value="7" {{ $job->experience == 7 ? 'selected' : '' }}>7 Years
                                    </option>
                                    <option value="8" {{ $job->experience == 8 ? 'selected' : '' }}>8 Years
                                    </option>
                                    <option value="9" {{ $job->experience == 9 ? 'selected' : '' }}>9 Years
                                    </option>
                                    <option value="10" {{ $job->experience == 10 ? 'selected' : '' }}>10 Years
                                    </option>
                                    <option value="10_plus" {{ $job->experience == '10_plus' ? 'selected' : '' }}>10+
                                        Years</option>
                                </select>
                            </div>
                            <!-- Submit -->
                            <div class="pt-4 flex justify-end gap-3">
                                <a href="{{ route('job_portal.index') }}"
                                    class="px-8 py-2 bg-gray-600 text-white rounded-lg font-medium hover:bg-gray-700 transition text-decoration-none">Back</a>
                                <button type="submit"
                                    class="px-8 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('JS')
    <script>
        $(document).ready(function() {
            $('.degree').select2();
        });
    </script>
@endsection
@section('trumbowyg')
    <script>
        $('.textarea').trumbowyg();
    </script>
@endsection
