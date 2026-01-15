<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>

<body>
    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Page Content --}}
    {{-- main --}}
    <section>
        @yield('main')
    </section>
    <section>
        @yield('keyword')
    </section>
    <section class="">
        @yield('popular')
    </section>
    <section>
        @yield('featured')
    </section>
    <section>
        @yield('latest')
    </section>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Chatbot --}}
    @include('partials.chatbot')
</body>

</html>
