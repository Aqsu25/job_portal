@extends('homes.header')

{{-- Section --}}
@section('main')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-message></x-message>
                    <div class="flex justify-between mb-2">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Roles') }}
                        </h2>
                        <a href="{{ route('roles.create') }}"
                            class="bg-blue-700  border text-decoration-none text-white rounded-md px-3 py-2 font-bond hover:bg-blue-600">Create</a>
        
                    </div>
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr class="border-b">
                                <th class="px-6 py-3 text-left">#</th>
                                <th class="px-6 py-3 text-left">Role</th>
                                <th class="px-6 py-3 text-left">Permission</th>
                                <th class="px-6 py-3 text-left">Created_By</th>
                                <th class="px-6 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($roles as $role)
                                <tr class="border-b">
                                    <td class="px-6 py-3 text-left">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-3 text-left">{{ $role->name }}</td>
                                    <td class="px-6 py-3 text-left">
                                        @if ($role->permissions->pluck('name')->implode(','))
                                            {{ $role->permissions->pluck('name')->implode(',') }}
                                        @else
                                            <p>No Permission Assign Yet!</p>
                                        @endif
                                    </td>
                                    <td class="px-6 py-3 text-left">
                                        {{ \Carbon\Carbon::parse($role->created_at)->format('d M,Y') }}</td>
                                    <td class="px-6 py-3 flex justify-center gap-2">
                                        <a href="{{ route('roles.edit', $role->id) }}"
                                            class="bg-blue-700 text-white px-3 py-2 rounded-md hover:bg-blue-600 text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-700 text-white px-3 py-2 rounded-md hover:bg-red-600 text-sm">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection


