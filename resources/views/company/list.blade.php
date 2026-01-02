@extends('homes.header')

{{-- Section --}}
@section('main')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Companies') }}
                </h2>
                <a href="{{ route('companies.create') }}"
                    class="bg-blue-700  border text-decoration-none text-white rounded-md px-3 py-2 my-3 font-bond hover:bg-blue-600">Create</a>

            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-message></x-message>
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr class="border-b">
                                <th class="px-6 py-3 text-left">#</th>
                                <th class="px-6 py-3 text-left">Name</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Location</th>
                                <th class="px-6 py-3 text-left">Website</th>
                                <th class="px-6 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($companies as $company)
                                <tr class="border-b">
                                    <td class="px-6 py-3 text-left">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-3 text-left">{{ $company->name }}</td>
                                    <td class="px-6 py-3 text-left">{{ $company->email }}</td>
                                    <td class="px-6 py-3 text-left">{{ $company->location }}</td>
                                    <td class="px-6 py-3 text-left">{{ $company->website }}</td>


                                    <td class="px-6 py-3 flex justify-center gap-2">
                                        <a href="{{ route('companies.edit', $company->id) }}"
                                            class="bg-blue-700 text-white px-3 py-2 rounded-md hover:bg-blue-600 text-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
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
