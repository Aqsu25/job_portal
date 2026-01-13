
@extends('homes.main')

@section('main')

<x-app-layout>
    <x-message></x-message>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
</x-app-layout>
@endsection
