@extends('homes.header')

@section('main')
<div class="min-h-screen py-10 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4">

        <!-- Breadcrumb -->
        <div class="mb-6 text-sm text-gray-500 flex items-center gap-2">
            <x-message />
            <a href="{{ route('admin.index') }}" class="text-decoration-none text-blue-500 hover:underline">
                Admin Dashboard
            </a>
            <span>/</span>
            <span class="font-medium text-gray-800">Permissions</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <!-- Sidebar -->
            <div class="md:col-span-1">
                @include('admin.sidebar')
            </div>

            <!-- Main Content -->
            <div class="md:col-span-3">
                <div class="bg-white shadow-lg rounded-xl p-8">

                    <!-- Header -->
                    <div class="flex justify-between items-center gap-4 mb-4">
                        <h2 class="text-2xl font-semibold text-gray-800">Permissions</h2>
                        <a href="{{ route('permissions.create') }}"
                            class="bg-blue-500 text-decoration-none text-white rounded-md px-4 py-2 font-medium flex items-center gap-2 hover:bg-blue-600 transition">
                            <i class="fas fa-plus"></i> Create
                        </a>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-gray-500 font-semibold">#</th>
                                    <th class="px-6 py-3 text-left text-gray-500 font-semibold">Permission</th>
                                    <th class="px-6 py-3 text-left text-gray-500 font-semibold">Created By</th>
                                    <th class="px-6 py-3 text-center text-gray-500 font-semibold">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($permissions as $permission)
                                    <tr class="hover:bg-gray-50 transition-all">
                                        <td class="px-6 py-3">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-3 font-medium text-gray-700">{{ $permission->name }}</td>
                                        <td class="px-6 py-3 text-gray-500">
                                            {{ $permission->created_by ?? 'Admin' }}
                                        </td>
                                        <td class="px-6 py-3 text-center flex justify-center gap-3">
                                            <!-- Edit -->
                                            <a href="{{ route('permissions.edit', $permission->id) }}"
                                                class="text-blue-500 hover:text-blue-700 transition-colors">
                                                <i class="fas fa-pen"></i>
                                            </a>

                                            <!-- Delete -->
                                            <form action="{{ route('permissions.destroy', $permission->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this permission?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700 transition-colors">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 italic">
                                            No permissions found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
