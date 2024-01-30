@extends('user::layouts.master')

{{-- Menyimpan nilai current_page ke dalam variabel --}}
@php
    $currentPage = config('user.pages.manage'); // Diambil dari config/config.php
@endphp

{{-- Set section title dengan nilai dari current_page --}}
@section('title', $currentPage)

{{-- Contents here --}}
@section('contents')
@endsection
