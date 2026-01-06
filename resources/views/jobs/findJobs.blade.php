@extends('homes.header')
@section('main')
  <div class="max-w-7xl mx-auto p-6">

    <header class="text-black text-3xl font-bold mb-6">
      Find Jobs
    </header>

    <div class="flex flex-col lg:flex-row gap-6">

      <aside class="w-full lg:w-1/4 bg-white p-6 rounded-lg shadow">
        <div class="mb-4">
          <label class="block mb-2 font-semibold">Keywords</label>
          <input type="text" placeholder="Keywords"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
          <label class="block mb-2 font-semibold">Location</label>
          <input type="text" placeholder="Location"
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
          <label class="block mb-2 font-semibold">Category</label>
          <select
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option>Select a Category</option>
            <option>Web Developer</option>
            <option>Designer</option>
            <option>Marketing</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block mb-2 font-semibold">Job Type</label>
          <select
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option>Full Time</option>
            <option>Part Time</option>
            <option>Freelance</option>
            <option>Remote</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block mb-2 font-semibold">Experience</label>
          <select
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option>Select Experience</option>
            <option>0-1 Year</option>
            <option>1-3 Years</option>
            <option>3+ Years</option>
          </select>
        </div>
      </aside>

      <main class="w-full lg:w-3/4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @for ($i = 0; $i < 6; $i++)
          <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
            <h2 class="text-xl font-bold text-blue-600">Web Developer</h2>
            <p class="text-gray-700 mt-2">We are in need of a Web Developer for our company.</p>
            <div class="flex gap-6 text-gray-500 mt-3 text-sm">
              <span>Noida</span>
              <span>Remote</span>
              <span>2-3 Lacs PA</span>
            </div>
          </div>
        @endfor

      </main>

    </div>

  </div>
@endsection
