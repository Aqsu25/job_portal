<!-- MENU -->
<div class="bg-white shadow p-4 space-y-2 text-decoration-none">
  <a href="{{ route('myprofile') }}"
    class="block px-4 py-2 rounded-lg bg-blue-50 text-blue-400 font-medium text-decoration-none">
    Account Settings
  </a>
  <a href="{{ route('users.index') }}"
    class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-black text-decoration-none">
    Users
  </a>
  <a href="{{ route('admin.create') }}"
    class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-black text-decoration-none">
    Employer_Request
  </a>
  <a href="{{ route('categories.index') }}"
    class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-black text-decoration-none">
    Category
  </a>
  <a href="{{ route('types.index') }}"
    class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-black text-decoration-none">
    Job_Type
  </a>
  <a href="{{ route('companies.index') }}"
    class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-black text-decoration-none">
    Companies
  </a>
  <a href="{{ route('job_portal.index') }}"
    class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-black text-decoration-none">
    Jobs
  </a>
  <a href="{{ route('job.applied') }}"
    class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-black text-decoration-none">
    Applications
  </a>
  <a href="{{ route('job.savepage') }}"
    class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-black text-decoration-none">
    Saved Jobs
  </a>
</div>
