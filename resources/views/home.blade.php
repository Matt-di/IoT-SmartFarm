@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Smart Farm')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

@endsection
@section('page-script')
    <script>
        jQuery(document).ready(function() {

            let cardColor, headingColor, axisColor, shadeColor, borderColor;

            cardColor = config.colors.white;
            headingColor = config.colors.headingColor;
            axisColor = config.colors.axisColor;
            borderColor = config.colors.borderColor;
            console.log("{{$devices}}")
            // --------------------------------------------------------------------
            const graphData = document.querySelector("#graphData1"),
                totalRevenueChartOptions = {
                    series: [{
                            name: "Temperature",
                            data: [18, 7, 15, 29, 18, 12, 9],
                        },
                        {
                            name: "Humidity",
                            data: [-13, -18, -9, -14, -5, -17, -15],
                        },
                        {
                            name: "Moisture",
                            data: [23, -12, -1, -24, -5, 17, 15],
                        },
                    ],
                    chart: {
                        height: 300,
                        stacked: true,
                        type: "bar",
                        toolbar: {
                            show: false
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: "33%",
                            borderRadius: 12,
                            startingShape: "rounded",
                            endingShape: "rounded",
                        },
                    },
                    colors: [
                        config.colors.primary,
                        config.colors.info,
                        config.colors.success,
                    ],
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        curve: "smooth",
                        width: 6,
                        lineCap: "round",
                        colors: [cardColor],
                    },
                    legend: {
                        show: true,
                        horizontalAlign: "left",
                        position: "top",
                        markers: {
                            height: 8,
                            width: 8,
                            radius: 12,
                            offsetX: -3,
                        },
                        labels: {
                            colors: axisColor,
                        },
                        itemMargin: {
                            horizontal: 10,
                        },
                    },
                    grid: {
                        borderColor: borderColor,
                        padding: {
                            top: 0,
                            bottom: -8,
                            left: 20,
                            right: 20,
                        },
                    },
                    xaxis: {
                        categories: [
                            "12:00",
                            "12:01",
                            "12:02",
                            "12:04",
                            "12:05",
                            "12:08",
                            "12:09",
                        ],
                        labels: {
                            style: {
                                fontSize: "13px",
                                colors: axisColor,
                            },
                        },
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                    },
                    yaxis: {
                        labels: {
                            style: {
                                fontSize: "13px",
                                colors: axisColor,
                            },
                        },
                    },
                    responsive: [{
                            breakpoint: 1700,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "32%",
                                    },
                                },
                            },
                        },
                        {
                            breakpoint: 1580,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "35%",
                                    },
                                },
                            },
                        },
                        {
                            breakpoint: 1440,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "42%",
                                    },
                                },
                            },
                        },
                        {
                            breakpoint: 1300,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "48%",
                                    },
                                },
                            },
                        },
                        {
                            breakpoint: 1200,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "40%",
                                    },
                                },
                            },
                        },
                        {
                            breakpoint: 1040,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 11,
                                        columnWidth: "48%",
                                    },
                                },
                            },
                        },
                        {
                            breakpoint: 991,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "30%",
                                    },
                                },
                            },
                        },
                        {
                            breakpoint: 840,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "35%",
                                    },
                                },
                            },
                        },
                        {
                            breakpoint: 768,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "28%",
                                    },
                                },
                            },
                        },
                        {
                            breakpoint: 640,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "32%",
                                    },
                                },
                            },
                        },
                        {
                            breakpoint: 576,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "37%",
                                    },
                                },
                            },
                        },
                        {
                            breakpoint: 480,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "45%",
                                    },
                                },
                            },
                        },
                        {
                            breakpoint: 420,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "52%",
                                    },
                                },
                            },
                        },
                        {
                            breakpoint: 380,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 10,
                                        columnWidth: "60%",
                                    },
                                },
                            },
                        },
                    ],
                    states: {
                        hover: {
                            filter: {
                                type: "none",
                            },
                        },
                        active: {
                            filter: {
                                type: "none",
                            },
                        },
                    },
                };
            if (
                typeof graphData !== undefined &&
                graphData !== null
            ) {
                const totalRevenueChart = new ApexCharts(
                    graphData,
                    totalRevenueChartOptions
                );
                totalRevenueChart.render();
            }
        });
    </script>
    {{-- <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script> --}}
@endsection
@section('content')
    @php
        $idGen = 1;
    @endphp
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">

            @foreach ($devices as $device)
                <div class="row row-bordered g-0">
                    <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">De</h5>
                        <div id="graphData{{ $idGen }}" class=" px-2"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">

                                        <span class="fw-semibold d-block mb-1">Motor Status</span>
                                        <h3 class="card-title mb-2">{{ $device->motor_status }}</h3>
                                        <button class="btn btn-primary"> Open
                                        </button>
                                        <small class="text-success fw-semibold"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <span class="fw-semibold d-block mb-1">Control Mode</span>
                                        <h3 class="card-title mb-2">{{ $device->setting()->first()->control_mode }}</h3>
                                        <button class="btn btn-primary"> Change
                                        </button>
                                        <small class="text-success fw-semibold"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @php
                        $idGen += 1;
                    @endphp
            @endforeach

        </div>
    </div>
    <hr>

@endsection
