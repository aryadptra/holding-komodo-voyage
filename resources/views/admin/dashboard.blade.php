@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <x-breadcrumb :title="'Dashboard'" />
        </div>
    </div>
@endsection
