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
        var lastDate = 0;
        var datas = {

        }
        var data = []
        var data2 = []
        var data3 = []
        var year = []

        function getNewSeries2(deviceId) {
            $.ajax({
                url: "/api/device/" + deviceId + "/sensor",
                method: "get",
                success: function(result) {
                    // console.log(result.humidity);
                    datas[deviceId] = result;
                    data = result.temperature;
                    data2 = result.humidity;
                    data3 = result.moisture
                    year = result.date;
                    console.log(result)
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>
    <script>
        @php
            $idGen = 1;
        @endphp
        @foreach ($devices as $device)
            jQuery(document).ready(function() {
                datas["{{ $device->id }}"] = [];
                let cardColor, headingColor, axisColor, shadeColor, borderColor;

                cardColor = config.colors.white;
                headingColor = config.colors.headingColor;
                axisColor = config.colors.axisColor;
                borderColor = config.colors.borderColor;

                // --------------------------------------------------------------------
                let graphData = document.querySelector("{{ '#graphData' . $idGen }}");
                var options = {
                    series: [{
                            name: "Temperature",
                            data: data
                        },
                        {
                            name: "Humidity",
                            data: data2
                        },
                        {
                            name: "Soil Moisture",
                            data: data3
                        }
                    ],
                    chart: {
                        height: 350,
                        type: 'line',
                        dropShadow: {
                            enabled: true,
                            color: '#000',
                            top: 18,
                            left: 7,
                            blur: 10,
                            opacity: 0.2
                        },
                        animations: {
                            enabled: true,
                            easing: 'linear',
                            dynamicAnimation: {
                                speed: 1000
                            }
                        },
                        toolbar: {
                            show: false
                        }
                    },
                    colors: ['#FF0000', '#545454', '#00FF00'],
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    title: {
                        text: 'Dettail Data',
                        align: 'left'
                    },
                    grid: {
                        borderColor: '#e7e7e7',
                        row: {
                            colors: ['#f3f3f3',
                                'transparent'
                            ], // takes an array which will be repeated on columns
                            opacity: 0.5
                        },
                    },
                    markers: {
                        size: 1
                    },
                    xaxis: {
                        categories: [],
                        title: {
                            text: 'Date'
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Value'
                        },
                        min: 0,
                        max: 100
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                        floating: true,
                        offsetY: -25,
                        offsetX: -5
                    }
                };



                if (
                    typeof graphData !== undefined &&
                    graphData !== null
                ) {
                    window["{{ 'totalRevenueChart' . $idGen }}"] = new ApexCharts(
                        graphData,
                        options
                    );
                    window["{{ 'totalRevenueChart' . $idGen }}"].render();


                    // cons ole.log(totalRevenueChart.getSeriesTotal())

                }
                window.setInterval(function() {
                    getNewSeries2("{{ $device->id }}");
                    window["{{ 'totalRevenueChart' . $idGen }}"].updateOptions({
                        series: [{
                                name: "Temperature",
                                data: datas["{{ $device->id }}"].temperature
                            },
                            {
                                name: "humidity",

                                data: datas["{{ $device->id }}"].humidity
                            }, {
                                name: "Soil Moisture",

                                data: datas["{{ $device->id }}"].moisture
                            }
                        ],
                        xaxis: {
                            categories: datas["{{ $device->id }}"].date
                        }
                    })
                }, 5000);
            });
            @php
                $idGen += 1;
            @endphp
        @endforeach


        jQuery(document).ready(function() {

            $('.updateMotor').on('click', function(event) {
                let elment = $(this);
                let deviceId = $(this).attr('id');
                let prevElm = $("#" + deviceId).prev();
                let data = {
                    "motor_status": $(this).attr('motor') == "closed" ? "opened" : "closed"
                };
                event.preventDefault();
                $.ajax({
                    url: "/api/device/" + deviceId + "/toggle",
                    method: "POST",
                    dataType: "json",
                    data: JSON.stringify(data),
                    success: function(result) {
                        console.log(result);
                        prevElm.text(result)
                        elment.attr('motor', result)

                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $('.updateMode').on('click', function(event) {
                let elment = $(this);
                let deviceId = $(this).attr('id');
                let prevElm = elment.prev();
                let data = {
                    "control_mode": $(this).attr('mode') == "auto" ? "user" : "auto"
                };
                event.preventDefault();
                $.ajax({
                    url: "/api/device/" + deviceId.substr(5) + "/setting",
                    method: "POST",
                    dataType: "json",
                    data: JSON.stringify(data),
                    success: function(result) {
                        console.log(result);
                        prevElm.text(result[0]['control_mode'])
                        elment.attr('mode', result[0]['control_mode'])
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
    {{-- <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script> --}}
@endsection
@section('content')

    @php
        $idGen = 1;
    @endphp
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        @foreach ($devices as $device)
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">{{ $device->name }}</h5>
                        <div id="graphData{{ $idGen }}" class=" px-2"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <span class="fw-semibold d-block mb-1">Motor Status</span>
                                        <h3 class="card-title mb-2 ">{{ $device->motor_status }}</h3>
                                        <button class="btn btn-primary updateMotor" motor="{{ $device->motor_status }}"
                                            id="{{ $device->id }}"> Toggle
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
                                        <button class="btn btn-primary updateMode" id="mode_{{ $device->id }}"
                                            mode="{{ $device->setting()->first()->control_mode }}"> Change
                                        </button>
                                        <small class="text-success fw-semibold"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $idGen += 1;
                    @endphp

                </div>
            </div>
            <hr>
        @endforeach

        <script>
            var options = {
                series: [{
                    data: data.slice()
                }],
                chart: {
                    id: 'realtime',
                    height: 350,
                    type: 'line',
                    animations: {
                        enabled: true,
                        easing: 'linear',
                        dynamicAnimation: {
                            speed: 1000
                        }
                    },
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                title: {
                    text: 'Dynamic Updating Chart',
                    align: 'left'
                },
                markers: {
                    size: 0
                },
                xaxis: {
                    type: 'datetime',
                    range: XAXISRANGE,
                },
                yaxis: {
                    max: 100
                },
                legend: {
                    show: false
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();


            window.setInterval(function() {
                getNewSeries(lastDate, {
                    min: 10,
                    max: 90
                })

                chart.updateSeries([{
                    data: data
                }])
            }, 1000)
        </script>
    @endsection
