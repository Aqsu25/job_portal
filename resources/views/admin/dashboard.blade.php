@extends('homes.header')

{{-- Section --}}
@section('main')
    <div class="min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4">
            <p class="fs-5 text-gray-800">
                <x-message></x-message>
                <a href="{{ route('home') }}" class="text-blue-500 text-decoration-none">Home</a>
                / Admin Dashboard
            </p>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- LEFT SIDEBAR -->
                <div class="md:col-span-1 space-y-6">
                    @include('admin.sidebar')
                </div>

                <!-- RIGHT CONTENT -->
                <div class="md:col-span-3 space-y-10">

                    <!-- EDIT PROFILE -->
                    <div class="bg-white rounded-xl shadow p-8">
                        <h4 class="text-sm fs-5 text-gray-600 hover:text-blue-600 mb-6 text-center">
                            “Welcome to the Admin Dashboard — Oversee Jobs, Employers & Applications Effortlessly.” </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
