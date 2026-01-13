@extends('homes.header')

@section('main')
    <div class="min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Breadcrumb -->
            <div class="mb-6 text-sm text-gray-500">
                <x-message />
                @if (auth()->user()->hasRole('admin'))
                   <a href="{{ route('admin.index') }}" class="text-blue-500 hover:underline text-decoration-none">Admin
                    Dashboard</a>
                <span class="mx-2 text-gray-800">/</span>
                @else
                    <a href="{{ route('home') }}" class="text-blue-600 hover:underline text-decoration-none">Home</a>
                    <span class="mx-2 text-gray-800">/</span>
                @endif
                <span class="font-medium text-gray-800">Companies</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- Sidebar -->
                @if (auth()->user()->hasRole('admin'))
                    <div class="md:col-span-1">
                        @include('admin.sidebar')
                    </div>
                @else
                    <div class="md:col-span-1">
                        @include('users.sidebar')
                    </div>
                @endif


                <!-- Main Content -->
                <div class="md:col-span-3">
                    <div class="bg-white shadow-lg rounded-xl p-8">
                        <!-- Heading -->
                        <div class="flex justify-between items-center gap-4">
                            <h2 class="text-2xl font-semibold text-gray-800">
                                Companies
                            </h2>
                            <a href="{{ route('companies.create') }}"
                                class="bg-blue-500  border text-decoration-none text-white rounded-md px-3 py-2 font-bond hover:bg-blue-700">Create</a>
                        </div>
                        <div class="mt-4">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr class="border-b">
                                        <th class="px-6 py-3 text-left">#</th>
                                        <th class="px-6 py-3 text-left">Name</th>
                                        <th class="px-6 py-3 text-left">Email</th>
                                        {{-- <th class="px-6 py-3 text-left">Website</th> --}}
                                        <th class="px-6 py-3 text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="text-sm">
                                    @if ($companies->isNotEmpty())
                                        @foreach ($companies as $company)
                                            <tr class="border-b">
                                                <td class="px-6 py-3 text-left">{{ $company->id }}</td>
                                                <td class="px-6 py-3 text-left">{{ $company->name }}</td>
                                                <td class="px-6 py-3 text-left">{{ $company->email }}</td>
                                                {{-- <td class="px-6 py-3 text-left">{{ $company->website }}</td> --}}


                                                <td class="px-6 py-3 flex justify-center gap-2">

                                                    <a href="{{ route('companies.edit', $company->id) }}"
                                                        class="text-blue-600 hover:text-blue-800">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('companies.destroy', $company->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="text-center">
                                            <td colspan="5" class="my-2 pt-3">No Company Created Yet!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p>{{ $companies->links() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
