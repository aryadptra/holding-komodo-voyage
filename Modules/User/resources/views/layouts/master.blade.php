@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-breadcrumb :title="'Users'" :items="[['url' => route('admin.user.index'), 'label' => 'Users']]" :current_page="$currentPage" />
            {{-- Don't forget to define $currentPage on views --}}
        </div>
    </div>
    @yield('contents')
@endsection
