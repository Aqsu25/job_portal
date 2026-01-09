@extends('homes.header')

{{-- Section --}}
@section('main')
    <div class="min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4">
            <p class="fs-5 text-gray-400">
                <x-message></x-message>
                <a href="{{ route('home') }}" class="text-blue-400 text-decoration-none">Home</a>
                / Account Settings
            </p>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- LEFT SIDEBAR -->
                <div class="md:col-span-1 space-y-6">
                    @include('users.sidebar')
                </div>

                <!-- RIGHT CONTENT -->
                <div class="md:col-span-3 space-y-10">

                    <!-- EDIT PROFILE -->
                    <div class="bg-white rounded-xl shadow p-8">
                        <h3 class="text-xl font-semibold text-black mb-6">
                            My Profile
                        </h3>

                        <form method="POST" action="{{ route('myprofile.store') }}" class="space-y-3"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- NAME -->
                            <div class="">
                                <label class="block text-sm font-medium text-gray-400 mb-1">
                                    Full Name*
                                </label>
                                <input type="text" name="name" value="{{Auth::user()->name}}"
                                    class="uppercase w-full rounded-lg border-gray-300 focus:border-blue-400 focus:ring-blue-400 mb-3">
                            </div>

                            <!-- EMAIL -->
                            <div class="">
                                <label class="block text-sm font-medium  text-gray-400 my-1">
                                    Email Address*
                                </label>
                                <input type="email" name="email" value="{{ Auth::user()->email }}"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-400 focus:ring-blue-400 mb-3">
                            </div>

                            <!-- DESIGNATION -->
                            <div>
                                <label class="block text-sm font-medium  text-gray-400 mb-1">
                                    Designation*
                                </label>
                                <input type="text" name="designation" placeholder="e.g. Software Engineer"
                                    value="{{ optional(Auth::user()->profile)->designation }}"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-400 focus:ring-blue-400 mb-3">
                                @error('designation')
                                    <p class="text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- MOBILE -->
                            <div>
                                <label class="block text-sm font-medium  text-gray-400 mb-1">
                                    Mobile Number*
                                </label>
                                <input type="text" name="phone" placeholder="+92 3xx xxxxxxx"
                                    value="{{ optional(Auth::user()->profile)->phone }}"
                                    class="w-full rounded-lg border-gray-300 focus:border-blue-400 focus:ring-blue-400 mb-3">
                                @error('phone')
                                    <p class="text-red-500 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="pt-2">
                                <button type="submit"
                                    class="px-6 py-2 border border-blue-400 text-white rounded-lg bg-blue-400 hover:bg-blue-700 transition font-medium">
                                    Save Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
