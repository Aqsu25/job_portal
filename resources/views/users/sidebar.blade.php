<!-- PROFILE CARD -->
<div class="bg-white shadow p-6 text-center">

    <div>
        @auth
            @php
                $profileImage = optional(Auth::user()->profile)->profile_image?->image;
            @endphp

            @if ($profileImage)
                <img src="{{ asset('uploads/profile_image/' . $profileImage) }}" alt="Profile Image"
                    class="w-20 h-20 mx-auto rounded-full bg-blue-500 flex items-center justify-center">
            @else
                <img src="{{ asset('defaultimg.jpg') }}" alt="Default Image"
                    class="w-20 h-20 mx-auto rounded-full bg-blue-400 flex items-center justify-center">
            @endif
        @else
            <img src="{{ asset('defaultimg.jpg') }}" alt="Default Image"
                class="w-20 h-20 mx-auto rounded-full bg-blue-500 flex items-center justify-center">
        @endauth
    </div>

    <h2 class="mt-4 font-semibold text-lg text-black">
        @auth
            {{ Auth::user()->name }}
        @else
            Guest
        @endauth
    </h2>

    <p class="text-sm text-gray-600">
        @auth
            {{ optional(Auth::user()->profile)->designation ?? 'No Designation' }}
        @else
            Welcome!
        @endauth
    </p>

    @auth
    <div class="d-flex justify-content-center mb-2">
        <!-- Button trigger modal -->
        <button type="button" onclick="openModal()"
            class="text-white bg-blue-500 box-border rounded font-bold border border-transparent hover:bg-blue-700 focus:ring-4 focus:ring-brand-medium shadow-xs leading-5 px-4 py-2.5 focus:outline-none">
            Change Profile Image
        </button>
    </div>
    @endauth
</div>

<!-- MENU -->
<div class="bg-white shadow p-4 space-y-2 text-decoration-none">
    <a href="{{route('myprofile')}}" class="block px-4 py-2 rounded-lg bg-blue-50 text-blue-500 font-medium text-decoration-none">
        Account Settings
    </a>
    <a href="{{route('job_portal.create')}}" class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-black text-decoration-none">
        Posts a Job
    </a>
    <a href="{{route('job.applied')}}" class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-black text-decoration-none">
        Jobs Applied
    </a>
    <a href="{{route('job_portal.index')}}" class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-black text-decoration-none">
        My Jobs
    </a>
    <a href="{{route('job.savepage')}}" class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-black text-decoration-none">
        Saved Jobs
    </a>
</div>

<!-- Profile Image Modal -->
@auth
<div id="profileModal" class="fixed inset-0 hidden flex items-center justify-center z-50">

    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">

        <!-- Close Button -->
        <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500 hover:text-black text-xl">
            &times;
        </button>

        <h2 class="text-lg font-semibold mb-4 text-center">
            Change Profile Image
        </h2>

        <form action="{{ route('updateprofile.pic') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="profile_id" value="{{ optional(Auth::user()->profile)->id }}">
            
            <div class="mb-4">
                <input type="file" name="image" class="w-full border rounded p-2">
                @error('image')
                    <p class="text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Cancel
                </button>

                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Upload
                </button>
            </div>
        </form>
    </div>
</div>
@endauth

{{-- JS --}}
<script>
    function openModal() {
        document.getElementById('profileModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('profileModal').classList.add('hidden');
    }
</script>
