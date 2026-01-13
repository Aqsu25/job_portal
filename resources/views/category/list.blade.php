@extends('homes.header')

@section('main')
    <div class="min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Breadcrumb -->
            <div class="mb-6 text-sm text-gray-500">
                <x-message />
                <a href="{{ route('admin.index') }}" class="text-blue-500 hover:underline text-decoration-none">Admin
                    Dashboard</a> <span class="mx-2 text-gray-800">/</span>
                <span class="font-medium text-gray-700">Categories</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- Sidebar -->
                <div class="md:col-span-1">
                    @include('admin.sidebar')
                </div>

                <!-- Main Content -->
                <div class="md:col-span-3">
                    <div class="bg-white shadow-lg rounded-xl p-8">
                        <!-- Heading -->
                        <div class="flex justify-between items-center gap-4">
                            <h2 class="text-2xl font-semibold text-gray-800">
                                Categories
                            </h2>
                            <a href="{{ route('categories.create') }}"
                                class="bg-blue-500  border text-decoration-none text-white rounded-md px-3 py-2 font-bond hover:bg-blue-700">Create</a>
                        </div>
                        <div class="mt-4">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr class="border-b">
                                        <th class="px-6 py-3 text-left">#</th>
                                        <th class="px-6 py-3 text-left">Name</th>
                                        <th class="px-6 py-3 text-left">Status</th>
                                        <th class="px-6 py-3 text-left">Created_at</th>
                                        <th class="px-6 py-3 text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody class="text-sm">
                                    @if ($categories->isNotEmpty())
                                        @foreach ($categories as $category)
                                            <tr class="border-b">
                                                <td class="px-6 py-3 text-left">{{ $category->id}}</td>
                                                <td class="px-6 py-3 text-left">{{ $category->name }}</td>
                                                <td class="px-6 py-3 text-left">
                                                    @if ($category->status == 1)
                                                        <i class="fa-solid fa-check text-success"></i>
                                                    @else
                                                        <i class="fa-solid fa-xmark text-danger"></i>
                                                    @endif

                                                </td>
                                                <td class="px-6 py-3 text-left">
                                                    {{ \Carbon\Carbon::parse($category->created_at)->format('d m.Y') }}
                                                </td>


                                                <td class="px-6 py-3 flex justify-center gap-2">

                                                    <a href="{{ route('categories.edit', $category->id) }}"
                                                        class="text-blue-600 hover:text-blue-800">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('categories.destroy', $category->id) }}"
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
                                        <p>No Company Created Yet!</p>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p>{{ $categories->links() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
