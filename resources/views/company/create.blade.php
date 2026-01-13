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
                <span class="font-medium text-gray-700">Add Company</span>
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
                                Company Details
                            </h2>
                            <p class="text-sm text-gray-500 mt-1">
                                Enter your company information
                            </p>
                        </div>

                        <!-- Form -->
                        <form method="POST" action="{{ route('companies.store') }}" class="space-y-6">
                            @csrf
                            <!-- Company Name & Email -->

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Company Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="e.g. Tech Solutions Ltd">
                                @error('name')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Company Email <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="company@email.com">
                                    @error('email')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>



                                <!-- Location & Website -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Website <span class="text-red-500">*</span>
                                    </label>
                                    <input type="url" name="website" value="{{ old('website') }}"
                                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="https://example.com">
                                    @error('website')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <!-- Submit -->
                            <div class="pt-4 flex justify-end gap-3">
                                <a href="{{ route('companies.index') }}"
                                    class="px-8 py-2 bg-gray-600 text-white rounded-lg font-medium hover:bg-gray-700 transition text-decoration-none">Back</a>
                                <button type="submit"
                                    class="px-8 py-2 bg-blue-500 text-white rounded-lg font-medium hover:bg-blue-700 transition">
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
