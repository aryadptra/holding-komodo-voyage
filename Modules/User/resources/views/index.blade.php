@extends('user::layouts.master')

{{-- Menyimpan nilai current_page ke dalam variabel --}}
@php
    $currentPage = config('user.pages.manage'); // Diambil dari config/config.php
@endphp

{{-- Set section title dengan nilai dari current_page --}}
@section('title', $currentPage)

{{-- Contents here --}}
@section('contents')
    <div class="row">
        <div class="col-12">
            {{-- Jika ada flash session message --}}
            @if (session()->has('success'))
                <div class=" alert alert-success alert-dismissible fade show " role="alert">
                    <div class="alert-content">
                        <p>
                            {{ session()->get('success') }}
                        </p>
                        <button type="button" class="btn-close text-capitalize" data-bs-dismiss="alert" aria-label="Close">
                            <img src="{{ asset('backend/img/svg/x.svg') }}" alt="x" class="svg" aria-hidden="true">
                        </button>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-lg-12">
            <div class="card mt-30">
                <div class="card-body">
                    <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                        <div class="table-responsive">
                            <div class="adv-table-table__header">
                                <h4>Data Users</h4>
                                <div class="adv-table-table__button">
                                    <div class="dropdown">
                                        <a class="btn btn-primary dropdown-toggle dm-select" href="#" role="button"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Export
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">copy</a>
                                            <a class="dropdown-item" href="#">csv</a>
                                            <a class="dropdown-item" href="#">print</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="filter-form-container"></div>
                            <table class="table mb-0 table-borderless adv-table" data-sorting="true"
                                data-filter-container="#filter-form-container" data-paging-current="1"
                                data-paging-position="right" data-paging-size="10">
                                <thead>
                                    <tr class="userDatatable-header">
                                        <th>
                                            <span class="userDatatable-title">id</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">user</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">emaill</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">company</span>
                                        </th>
                                        <th data-type="html" data-name='position'>
                                            <span class="userDatatable-title">position</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">join date</span>
                                        </th>
                                        <th data-type="html" data-name='status'>
                                            <span class="userDatatable-title">status</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title float-right">action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="userDatatable-content">01</div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="userDatatable-inline-title">
                                                    <a href="#" class="text-dark fw-500">
                                                        <h6>Kellie Marquot </h6>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="userDatatable-content">
                                                john-keller@gmail.com
                                            </div>
                                        </td>
                                        <td>
                                            <div class="userDatatable-content">
                                                Business Development
                                            </div>
                                        </td>
                                        <td>
                                            <div class="userDatatable-content">
                                                Web Developer
                                            </div>
                                        </td>
                                        <td>
                                            <div class="userDatatable-content">
                                                January 20, 2020
                                            </div>
                                        </td>
                                        <td>
                                            <div class="userDatatable-content d-inline-block">
                                                <span
                                                    class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                            </div>
                                        </td>
                                        <td>
                                            <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                <li>
                                                    <a href="#" class="view">
                                                        <i class="uil uil-eye"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="edit">
                                                        <i class="uil uil-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="remove">
                                                        <img src="{{ asset('admin/img/svg/trash-2.svg') }}" alt="trash-2"
                                                            class="svg"></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
