{{-- success-message --}}
@if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- error-message --}}
@if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
