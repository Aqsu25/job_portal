{{-- users --}}
@extends('homes.header')

@section('main')
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Breadcrumb -->
            <div class="mb-6 text-sm text-gray-500">
                <x-message />
                {{-- admin --}}
                @if (auth()->user()->hasRole('admin'))
                    <a href="{{ route('admin.index') }}" class="text-blue-600 hover:underline text-decoration-none">
                        Admin Dashboard
                    </a>
                @else
                    <a href="{{ route('home') }}" class="text-blue-600 hover:underline text-decoration-none">Home</a>
                @endif
                <span class="mx-2">/</span>
                <span class="font-medium text-gray-700">Users</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                {{-- admin --}}
                @if (auth()->user()->hasRole('admin'))
                    <aside class="md:col-span-1">
                        @include('admin.sidebar')
                    </aside>
                @else
                    <aside class="md:col-span-1">
                        @include('users.sidebar')
                    </aside>
                @endif

                <!-- Sidebar -->

                <!-- Main Content -->
                <main class="md:col-span-3 space-y-6">

                    <!-- Page Header -->
                    @if (auth()->user()->hasRole('admin'))
                        <div class="bg-white rounded-xl shadow p-6 flex items-center justify-between">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-800">
                                    User Management
                                </h1>
                                <p class="text-sm text-gray-500 mt-1">
                                    Manage platform users and their assigned roles
                                </p>
                            </div>
                        </div>
                    @endif

                    <!-- Users Table -->
                    <div class="bg-white rounded-xl shadow overflow-hidden">

                        <div class="px-6 py-4 border-b flex items-center justify-between">
                            @if (auth()->user()->hasRole('admin'))
                                <h2 class="text-lg font-semibold text-gray-700">
                                    Users List
                                </h2>
                            @else
                                <h2 class="text-lg font-semibold text-gray-700">
                                    User
                                </h2>
                            @endif
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                                    <tr>
                                        <th class="px-6 py-4 text-left">#</th>
                                        <th class="px-6 py-4 text-left">Name</th>
                                        <th class="px-6 py-4 text-left">Email</th>
                                        <th class="px-6 py-4 text-left">Mobile</th>
                                        <th class="px-6 py-4 text-left">Role</th>
                                        {{-- <th class="px-6 py-4 text-left">Created</th> --}}
                                        <th class="px-6 py-4 text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y">
                                    @forelse ($users as $user)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-6 py-4">
                                                {{ $user->id }}
                                            </td>

                                            <td class="px-6 py-4 font-medium text-gray-800">
                                                {{ $user->name }}
                                            </td>

                                            <td class="px-6 py-4 text-gray-600">
                                                {{ $user->email }}
                                            </td>

                                            <td class="px-6 py-4 text-gray-600">
                                                {{ optional($user->profile)->phone }}
                                            </td>

                                            <td class="px-6 py-4">
                                                @if ($user->roles->isNotEmpty())
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                                        {{ $user->roles->pluck('name')->implode(', ') }}
                                                    </span>
                                                @else
                                                    <span class="text-xs text-gray-400">
                                                        No Role Assigned
                                                    </span>
                                                @endif
                                            </td>

                                            {{-- <td class="px-6 py-4 text-gray-500">
                                                {{ $user->created_at->format('d M, Y') }}
                                            </td> --}}
                                            @if (auth()->user()->hasRole('admin'))
                                                <td class="px-6 py-4 flex justify-center gap-3">
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="text-blue-600 hover:text-blue-800">
                                                        <i class="fas fa-pen"></i>
                                                    </a>

                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this user?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-6 py-10 text-center text-gray-400">
                                                No users found.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2 m-2">
                            <p>{{ $users->links() }}</p>
                        </div>

                    </div>

                </main>
            </div>
        </div>
    </div>
@endsection
