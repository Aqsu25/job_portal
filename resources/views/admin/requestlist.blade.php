@extends('homes.main')

@section('main')
  <div class="min-h-screen bg-gray-100 py-10">
    <div class="max-w-7xl mx-auto px-4">


      <!-- Breadcrumb -->
      <div class="mb-6 text-sm text-gray-500 ms-2">
        <a href="{{ route('admin.index') }}" class="text-blue-500 hover:underline text-decoration-none">Admin
          Dashboard</a>
        <span class="mx-2 text-gray-800">/</span>
        <span class="font-medium text-gray-800">List of requests</span>
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
            <x-message></x-message>
            <div class="flex justify-between items-center gap-4">
              <h2 class="text-2xl font-semibold text-gray-800">
                Role-Request
              </h2>


            </div>
            <div class="mt-4">

              <table class="w-full">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="p-3 text-left">#</th>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Requested_Role</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Actions</th>
                  </tr>
                </thead>

                <tbody class="text-sm">
                  @forelse ($requests as $request)
                    <tr class="border-b hover:bg-gray-50">
                      <td class="p-3 text-gray-900">
                        {{ $request->id }}
                      </td>
                      <td class="p-3 text-gray-900">
                        <!-- Job Title -->
                        {{ optional($request->employer)->name }}
                        <p class="text-gray-800 hover:text-blue-600 transition">
                          {{ optional($request->employer)->email }}
                        </p>
                      </td>
                      <td class="p-3 text-gray-900">
                        {{ $request->request_employer }}
                      </td>
                      <td class="p-3 text-gray-900">
                        {{ $request->status }}
                      </td>

                      <td class="p-3 text-gray-900">
                        <div class="flex gap-3">
                          <form action="{{ route('request.approve', $request->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                              class="bg-gray-700 text-white px-3 py-2 rounded-md hover:bg-gray-600 text-sm">
                              Approved</button>
                          </form>
                          <form action="{{ route('request.reject', $request->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                              class="bg-red-700 text-white px-3 py-2 rounded-md hover:bg-red-600 text-sm">Reject</button>
                          </form>
                        </div>
                      </td>

                    </tr>
                  @empty
                    <tr>
                      <td colspan="9" class="p-6 text-center text-gray-500">
                        No pending request!.
                      </td>
                    </tr>
                  @endforelse

                </tbody>
              </table>
              <div class="mt-2">
                <p>{{ $requests->links() }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
