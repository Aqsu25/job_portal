<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex">
        @include('admin.sidebar')

        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>

</body>
</html>
