{{-- @extends('user::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('user.name') !!}</p>
@endsection --}}


@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-breadcrumb :title="'Users'" :items="[['url' => route('admin.user.index'), 'label' => 'Users']]" />

        </div>
    </div>
@endsection
