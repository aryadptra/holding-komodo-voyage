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
            <div class="card mt-30 mb-30">
                <div class="card-body">
                    <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                        <div class="table-responsive">
                            <div class="adv-table-table__header">
                                <h4>Data Users</h4>
                                <div class="adv-table-table__button">
                                    <div class="dropdown dropdown-click">
                                        <a class="btn btn-primary dropdown-toggle dm-select" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Export
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">copy</a>
                                            <a class="dropdown-item" href="#">csv</a>
                                            <a class="dropdown-item" href="#">print</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="filter-form-container"></div>
                            <table class="table mb-0 table-borderless data-table" data-sorting="true"
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
                                            <span class="userDatatable-title">role</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title float-right">action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $data)
                                        <tr>
                                            <td>
                                                <div class="userDatatable-content">{{ $data->id }}</div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable-inline-title">
                                                        <a href="#" class="text-dark fw-500">
                                                            <h6>{{ $data->name }} </h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $data->email }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $data->get_role() }}
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
                                                            <img src="{{ asset('admin/img/svg/trash-2.svg') }}"
                                                                alt="trash-2" class="svg"></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $(".data-table").footable({
                    filtering: {
                        enabled: true,
                    },
                    paging: {
                        enabled: true,
                        current: 1,
                    },
                    strings: {
                        enabled: false,
                    },
                    filtering: {
                        enabled: true,
                    },
                    components: {
                        filtering: FooTable.MyFiltering,
                    },
                });
            });
        </script>
        <script>
            FooTable.MyFiltering = FooTable.Filtering.extend({
                construct: function(instance) {
                    this._super(instance);
                    // props for the first dropdown
                    this.statuses = [
                        "Web ",
                        "Senior Manager",
                        "UX/UI Desogner",
                        "Content Writer",
                        "Graphic Designer",
                        "Marketer",
                        "Project Manager",
                        "UI Designer",
                        "Business Development",
                    ];
                    this.statusDefault = "All";
                    this.$status = null;
                    // props for the second dropdown
                    this.jobTitles = ["Active", "deactivate", "Blocked"];
                    this.jobTitleDefault = "All";
                    this.$jobTitle = null;
                },
                $create: function() {
                    this._super();
                    var self = this;
                    // create the status form group and dropdown
                    var $status_form_grp = $("<div/>", {
                            class: "form-group dm-select d-flex align-items-center adv-table-searchs__position my-xl-25 my-15 me-sm-20 me-0 ",
                        })
                        .append(
                            $("<label/>", {
                                class: "d-flex align-items-center mb-sm-0 mb-2",
                                text: "position",
                            })
                        )
                        .prependTo(self.$form);

                    self.$status = $("<select/>", {
                            class: "form-control ms-sm-10 ms-0"
                        })
                        .on("change", {
                            self: self
                        }, self._onStatusDropdownChanged)
                        .append($("<option/>", {
                            text: self.statusDefault
                        }))
                        .appendTo($status_form_grp);

                    $.each(self.statuses, function(i, status) {
                        self.$status.append($("<option/>").text(status));
                    });

                    // create the job title form group and dropdown
                    var $job_title_form_grp = $("<div/>", {
                            class: "form-group dm-select d-flex align-items-center adv-table-searchs__status my-xl-25 my-15 mb-0 me-sm-30 me-0",
                        })
                        .append(
                            $("<label/>", {
                                class: "d-flex align-items-center mb-sm-0 mb-2",
                                text: "Status",
                            })
                        )
                        .prependTo(self.$form);

                    self.$jobTitle = $("<select/>", {
                            class: "form-control ms-sm-10 ms-0"
                        })
                        .on("change", {
                            self: self
                        }, self._onJobTitleDropdownChanged)
                        .append($("<option/>", {
                            text: self.jobTitleDefault
                        }))
                        .appendTo($job_title_form_grp);

                    $.each(self.jobTitles, function(i, jobTitle) {
                        self.$jobTitle.append($("<option/>").text(jobTitle));
                    });
                },
                _onStatusDropdownChanged: function(e) {
                    var self = e.data.self,
                        selected = $(this).val();
                    if (selected !== self.statusDefault) {
                        self.addFilter("position", selected, ["position"]);
                    } else {
                        self.removeFilter("position");
                    }
                    self.filter();
                },
                _onJobTitleDropdownChanged: function(e) {
                    var self = e.data.self,
                        selected = $(this).val();
                    if (selected !== self.jobTitleDefault) {
                        self.addFilter("status", selected, ["status"]);
                    } else {
                        self.removeFilter("status");
                    }
                    self.filter();
                },
                draw: function() {
                    this._super();
                    // handle the status filter if one is supplied
                    var status = this.find("position");
                    if (status instanceof FooTable.Filter) {
                        this.$status.val(status.query.val());
                    } else {
                        this.$status.val(this.statusDefault);
                    }

                    // handle the jobTitle filter if one is supplied
                    var jobTitle = this.find("status");
                    if (jobTitle instanceof FooTable.Filter) {
                        this.$jobTitle.val(jobTitle.query.val());
                    } else {
                        this.$jobTitle.val(this.jobTitleDefault);
                    }
                },
            });
        </script>
    @endpush
@endsection
