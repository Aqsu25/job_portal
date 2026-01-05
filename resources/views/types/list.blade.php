@extends('homes.header')

@section('main')
    <div class="min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Breadcrumb -->
            <div class="mb-6 text-sm text-gray-500">
                <x-message />
                <a href="{{ route('home') }}" class="text-blue-600 hover:underline">Home</a>
                <span class="mx-2">/</span>
                <span class="font-medium text-gray-700">Job-Type</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- Sidebar -->
                <div class="md:col-span-1">
                    @include('users.sidebar')
                </div>

                <!-- Main Content -->
                <div class="md:col-span-3">
                    <div class="bg-white shadow-lg rounded-xl p-8">
                        <!-- Heading -->
                        <div class="flex justify-between items-center gap-4">
                            <h2 class="text-2xl font-semibold text-gray-800">
                                Job_Type
                            </h2>
                            <a href="{{ route('types.create') }}"
                                class="bg-blue-400  border text-decoration-none text-white rounded-md px-3 py-2 font-bond hover:bg-blue-600">Create</a>
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
                                    @if ($types->isNotEmpty())
                                        @foreach ($types as $type)
                                            <tr class="border-b">
                                                <td class="px-6 py-3 text-left">{{ $loop->iteration }}</td>
                                                <td class="px-6 py-3 text-left">{{ $type->name }}</td>
                                                <td class="px-6 py-3 text-left">
                                                    @if ($type->status == 1)
                                                        <i class="fa-solid fa-check text-success"></i>
                                                    @else
                                                        <i class="fa-solid fa-xmark text-danger"></i>
                                                    @endif

                                                </td>
                                                <td class="px-6 py-3 text-left">
                                                    {{ \Carbon\Carbon::parse($type->created_at)->format('d m.Y') }}
                                                </td>


                                                <td class="px-6 py-3 flex justify-center gap-2">

                                                    <a href="{{ route('types.edit', $type->id) }}"
                                                        class="text-blue-600 hover:text-blue-800">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('types.destroy', $type->id) }}"
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
                        <p>{{ $types->links() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
