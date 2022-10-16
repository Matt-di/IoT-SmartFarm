@extends('layouts/contentNavbarLayout')

@section('title', 'settings')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

@endsection
@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection
@section('content')
    <div class="float">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">{{ $setting->device->name }} /</span> settings
        </h4>
    </div>
    <a href="{{ route('devices.index') }}" class="btn btn-primary mb-3 "><i class="bx bx-left-arrow"></i> Back </a>

    <!-- Basic Bootstrap Table -->
    {{-- <div class="card">
        <h5 class="card-header">Adjust Setting for Device</h5>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Control Mode</th>
                        <th>Moisture Threshold</th>
                        <th>Temperature Threshold</th>
                        <th>Humidity Threshold</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    <tr>
                        <td><span class="badge bg-label-primary me-1">{{ $setting->control_mode }}</span></td>

                        <td>{{ $setting->moisture_threshold }}</td>
                        <td>{{ $setting->temperature_threshold }}</td>
                        <td>{{ $setting->humidity_threshold }}</td>
                         <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                        <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar"
                                            class="rounded-circle">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                        <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar"
                                            class="rounded-circle">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title="Christina Parker">
                                        <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar"
                                            class="rounded-circle">
                                    </li>
                                </ul>
                            </td>

                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="{{ route('settings.edit', ['user' => auth()->user()->id, 'device' => $setting->device->id, 'setting' => $setting->id]) }}"><i
                                            class="bx bx-edit-alt me-2"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> --}}

    <div class="row">

        <div class="col-12 col-md-6 col-lg-6 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    {{-- <img src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card"
                                class="rounded"> --}}
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Control Mode</span>

                            <h3 class="card-title text-nowrap mb-2">{{ $setting->control_mode }}</h3>
                            <small class="text-danger fw-semibold"><i class='bx bx-down-arrow-alt'></i> -14.82%</small>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    {{-- <img src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card"
                                    class="rounded"> --}}
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Moisture Threshold</span>
                            <h3 class="card-title mb-2">{{ $setting->moisture_threshold }}</h3>
                            <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +28.14%</small>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    {{-- <img src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card"
                                    class="rounded"> --}}
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Temperature Threshold</span>
                            <h3 class="card-title mb-2">{{ $setting->temperature_threshold }}</h3>
                            <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +28.14%</small>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    {{-- <img src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card"
                                    class="rounded"> --}}
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Humidity Threshold</span>
                            <h3 class="card-title mb-2">{{ $setting->humidity_threshold }}</h3>
                            <small class="text-success fw-semibold"><i class='bx bx-up-arrow-alt'></i> +28.14%</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6 order-3 order-md-2">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Update {{ $setting->device->name }} Setting</h5> <small
                        class="text-muted float-end"></small>
                </div>
                <div class="card-body">
                    <form name="deviceAddForm" method="POST"
                        action="{{ route('settings.update', ['user' => auth()->user()->id, 'device' => $setting->device->id, 'setting' => $setting->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="control_mode" class="form-label">Control Mode</label>
                            <select class="form-select" id="control_mode" name="control_mode"
                                aria-label="Multiple select example">
                                <option>Select</option>
                                <option value="user" @if ($setting->control_mode == 'user') selected @endif>User</option>
                                <option value="auto" @if ($setting->control_mode == 'auto') selected @endif>Automatic</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="moisture_threshold">Moisture Threshold</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="moisture_threshold"
                                    name="moisture_threshold" placeholder="Device 1"
                                    value="{{ old('immoisture_threshold', $setting->moisture_threshold) }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="temperature_threshold">Temperature
                                Threshold</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="temperature_threshold"
                                    name="temperature_threshold" placeholder="Device 1"
                                    value="{{ old('temperature_threshold', $setting->temperature_threshold) }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="humidity_threshold">Humidity Threshold</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="humidity_threshold"
                                    name="humidity_threshold" placeholder="Device 1"
                                    value="{{ old('humidity_threshold', $setting->humidity_threshold) }}" />
                            </div>
                        </div>


                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>


@endsection
