@extends('layouts/contentNavbarLayout')

@section('title', 'Add Device')
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

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Devices/</span> Add</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Device</h5> <small class="text-muted float-end"></small>
                </div>
                <div class="card-body">
                    <form name="deviceAddForm" method="POST" action="{{ route('settings.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="control_mode" class="form-label">Control Mode</label>
                            <select multiple class="form-select" id="control_mode" name="control_mode"
                                aria-label="Multiple select example">
                                <option selected>Select</option>
                                <option value="user">User</option>
                                <option value="auto">Automatic</option>
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="moisture_threshold">Moisture Threshold</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="moisture_threshold" name="moisture_threshold"
                                    placeholder="Device 1" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="temperature_threshold">Temperature Threshold</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="temperature_threshold"
                                    name="temperature_threshold" placeholder="Device 1" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="humidity_threshold">Humidity Threshold</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="humidity_threshold" name="humidity_threshold"
                                    placeholder="Device 1" />
                            </div>
                        </div>


                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>

    </div>


@endsection
