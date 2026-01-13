@extends('homes.header')
@section('main')
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Breadcrumb -->
            <div class="mb-6 text-sm text-gray-500">
                <x-message />
                <a href="{{ route('admin.index') }}" class="text-blue-500 hover:underline text-decoration-none">Admin
                    Dashboard</a>
                <span class="mx-2 text-gray-800">/</span>
                <span class="font-medium text-gray-800">Add Job_Type</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- Sidebar -->
                <div class="md:col-span-1">
                    @include('admin.sidebar')
                </div>

                <!-- Main Content -->
                <div class="md:col-span-3">
                    <div class="bg-white shadow-lg rounded-xl p-8">

                        <!-- Title -->
                        <div class="border-b pb-4 mb-6">
                            <h2 class="text-2xl font-semibold text-gray-800">
                                Job_Type Details
                            </h2>
                            <p class="text-sm text-gray-500 mt-1">
                                Enter your job_type information
                            </p>
                        </div>

                        <!-- Form -->
                        <form method="POST" action="{{ route('types.store') }}" class="space-y-6">
                            @csrf

                            <!-- Job_Type Name & Email -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="e.g. remote">
                                    @error('name')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Status <span class="text-red-500">*</span>
                                    </label>
                                    <select name="status"
                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                                        <option value="">Select The Status</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="pt-4 flex justify-end gap-3">
                                <a href="{{ route('types.index') }}"
                                    class="px-8 py-2 bg-gray-600 text-white rounded-lg font-medium hover:bg-gray-700 transition text-decoration-none">Back</a>
                                <button type="submit"
                                    class="px-8 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition">
                                    Save
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
