@extends('layouts/contentNavbarLayout')

@section('title', 'sensors')
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
            <span class="text-muted fw-light">{{ $sensors->first()->device->name }} /</span> sensors
            {{-- <a href="{{ route('sensors.create') }}" class="btn btn-primary float-end">Add <i class="bx bx-plus"></i></a> --}}
        </h4>
    </div>
    <a href="{{ route('devices.index') }}" class="btn btn-primary mb-3 "><i class="bx bx-left-arrow"></i> Back </a>

    @if ($sensors->count() > 0)
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Your sensors</h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Moisture</th>
                            <th>Temperature</th>
                            <th>Humidity</th>
                            <th>Water Level</th>
                            <th>Motor Status</th>
                            <th>Read Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        @foreach ($sensors as $sensor)
                            <tr>
                                <td>{{ $sensor->moisture }}</td>
                                <td>{{ $sensor->temperature }}</td>
                                <td>{{ $sensor->humidity }}</td>
                                {{-- <td>
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
                            </td> --}}
                                {{-- {{ dd($sensor->setting()->get()->first()) }} --}}
                                <td><span class="badge bg-label-primary me-1">{{ $sensor->water_level }}</span></td>
                                <td><span class="badge bg-label-primary me-1">{{ $sensor->motor_status }}</span></td>
                                <td>{{ $sensor->created_at }}</td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-2"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    @else
        <div class="container-xxl container-p-y">
            <div class="misc-wrapper">
                <h2 class="mb-2 mx-2">No Added sensor yet!</h2>
                <p class="mb-4 mx-2">
                    Please add your sensor to start your smart sensors </p>
                <a href="{{ route('sensors.create') }}" class="btn btn-primary">Add sensor <i class="bx bx-plus"></i></a>
                <div class="mt-4">
                    <img src="{{ asset('assets/img/illustrations/girl-doing-yoga-light.png') }}"
                        alt="girl-doing-yoga-light" width="500" class="img-fluid">
                </div>
            </div>
        </div>
    @endif


@endsection
