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
                            {{ __('Users') }}
                        </h2>
                       
                    </div>
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr class="border-b">
                                <th class="px-6 py-3 text-left">#</th>
                                <th class="px-6 py-3 text-left">Name</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Role</th>
                                <th class="px-6 py-3 text-left">Created_By</th>
                                <th class="px-6 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($users as $user)
                                <tr class="border-b">
                                    <td class="px-6 py-3 text-left">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-3 text-left">{{ $user->name }}</td>
                                    <td class="px-6 py-3 text-left">{{ $user->email }}</td>
                                    <td class="px-6 py-3 text-left">
                                        @if ($user->roles->pluck('name')->implode(','))
                                            {{ $user->roles->pluck('name')->implode(',') }}
                                        @else
                                            <p>No Permission Assign Yet!</p>
                                        @endif
                                    </td>
                                    <td class="px-6 py-3 text-left">
                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d M,Y') }}</td>
                                    <td class="px-6 py-3 flex justify-center gap-2">
                                        <a href="{{ route('users.edit', $user->id) }}">
                                            <i class="fas fa-edit text-blue-700"></i>
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <i class="fa-solid fa-xmark text-red-500"></i>
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
