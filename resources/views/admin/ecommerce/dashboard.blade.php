@extends('admin.main')

@section('page-title', 'Dashboard')

@section('breadcrumb-title', 'Bienvenido/a')

@section('breadcrumb-links')
<li class="active">
    <strong>Dashboard</strong>
</li>
@endsection

@section('content')
<div class="row border-bottom white-bg dashboard-header">
	<div class="col-md-3">
		<h2>Estadísticas</h2>
		<small>Últimas 5 ordenes registradas.</small>
		<ul class="list-group clear-list m-t">
			@foreach($orders as $order)
			<li class="list-group-item fist-item">
				<span class="pull-right">{{ $order->extra1 }} artículos</span>
				@if 	($order->state_pol == 4)
					<span class="label label-primary" title="APROBADO">A</span>
				@elseif ($order->state_pol == 5)
					<span class="label label-warning" title="EXPIRADO">E</span>
				@elseif ($order->state_pol == 6)
					<span class="label label-danger" title="DECLINADO">D</span>
				@endif
				{{$order->reference_sale}}
			</li>
			@endforeach
		</ul>
	</div>

	<div class="col-md-6">
		<div class="flot-chart dashboard-chart">
			<div class="flot-chart-content" id="flot-dashboard-chart"></div>
		</div>
		<div class="row text-left">
			<div class="col-xs-6">
				<div class=" m-l-md">
					<span class="h4 font-bold m-t block">COP $ {{ number_format($amounts->weekly,2,',','.') }}</span>
					<small class="text-muted m-b block">Total últimos 7d</small>
				</div>
			</div>
			<div class="col-xs-6">
				<span class="h4 font-bold m-t block">COP $ {{ number_format($amounts->monthly,2,',','.') }}</span>
				<small class="text-muted m-b block">Total últimos 30d</small>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="statistic-box text-center">
			<h4>Estadísticas de pago</h4>

			<div class="row text-center">
				<div class="col-xs-6">
					<canvas id="doughnutChart" width="80" height="80" style="margin: 18px auto 0"></canvas>
				</div>
				<div class="col-xs-6">
					<canvas id="doughnutChart2" width="80" height="80" style="margin: 18px auto 0"></canvas>
				</div>
			</div>
			<div class="m-t">
				<small>Relación de ordenes según su estado de pago.</small>
			</div>
		</div>
	</div>
</div>
 <div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Orders</h5>
                <div class="pull-right">
                    <div class="btn-group">
                        <button id="weekly"  type="button" class="btn btn-xs btn-white active">Últimos 7 días</button>
                        <button id="monthly" type="button" class="btn btn-xs btn-white">Últimos 30 días</button>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-9">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-dashboard-chart-2"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <ul class="stat-list">
                            <li>
                                <h2 class="no-margins">{{$comparison->current->toe}}</h2>
                                <small>Total órdenes exitósas (ult. 30d)</small>
                                <div class="stat-percent">
                                {{number_format($comparison->toe_diff,2,'.','')}}%
                                	@if($comparison->current->toe > $comparison->past->toe)
                                		<i class="fa fa-level-up text-navy"></i>
                                	@else
                                		<i class="fa fa-level-down text-danger"></i>
                                	@endif
                                	</div>
                                <div class="progress progress-mini">
                                    <div style="width: {{number_format($comparison->toe_diff,2,'.','')}}%;" class="progress-bar"></div>
                                </div>
                            </li>
                            <li>
                                <h2 class="no-margins ">{{$comparison->current->to}}</h2>
                                <small>Total órdenes (ult. 30d)</small>
                                <div class="stat-percent">
                                {{number_format($comparison->to_diff,2,'.','')}}%
                                	@if($comparison->current->to > $comparison->past->to)
                                		<i class="fa fa-level-up text-navy"></i>
                                	@else
                                		<i class="fa fa-level-down text-danger"></i>
                                	@endif
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: {{number_format($comparison->to_diff,2,'.','')}}%;" class="progress-bar"></div>
                                </div>
                            </li>
                            <li>
                                <h2 class="no-margins ">$ {{number_format($comparison->current->tm,2,',','.')}}</h2>
                                <small>Total ingresos (ult. 30d)</small>
                                <div class="stat-percent">
                                	{{number_format($comparison->tm_diff,2,'.','')}}%
                                	@if($comparison->current->tm > $comparison->past->tm)
                                		<i class="fa fa-level-up text-navy"></i>
                                	@else
                                		<i class="fa fa-level-down text-danger"></i>
                                	@endif
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: {{number_format($comparison->tm_diff,2,'.','')}}%;" class="progress-bar"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css_files')

<!-- Gritter -->
<link href="{{ asset('admin/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">
@endpush

@push('js_files')
    <!-- Flot -->
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.time.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset('admin/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('admin/js/demo/peity-demo.js') }}"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('admin/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- GITTER -->
    <script src="{{ asset('admin/js/plugins/gritter/jquery.gritter.min.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('admin/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{ asset('admin/js/demo/sparkline-demo.js') }}"></script>

    <!-- ChartJS-->
    <script src="{{ asset('admin/js/plugins/chartJs/Chart.min.js') }}"></script>

@endpush

@section('scripts')
 <script>
 $(document).ready(function() {
{{-- DATA DAY --}}
	var dayO = [
		@foreach($weekData['data'] as $data)
        [gd( {{ $data[0] }} , {{ $data[1] }}, {{ $data[2] }} ), {{ $data[3] }} ],
    	 @endforeach
	];

    var dayP = [
        @foreach($weekData['data'] as $data)
        [gd( {{ $data[0] }} , {{ $data[1] }}, {{ $data[2] }} ), {{ $data[4] }} ],
     	@endforeach
    ];

    var datasetDay = [
        {
            label: "Número de ordenes",
            data: dayP,
            color: "#1ab394",
            bars: {
                show: true,
                align: "center",
                barWidth: 24 * 90 * 60 * 600,
                lineWidth:0
            }

        }, {
            label: "Pagos exitosos",
            data: dayO,
            yaxis: 2,
            color: "#1C84C6",
            lines: {
                lineWidth:1,
                    show: true,
                    fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.2
                    }, {
                        opacity: 0.4
                    }]
                }
            },
            splines: {
                show: false,
                tension: 0.6,
                lineWidth: 1,
                fill: 0.1
            },
        }
   	];

    var optionsDay = {
        xaxis: {
            mode: "time",
            tickSize: [1, "day"],
            tickLength: 0,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Arial',
            axisLabelPadding: 10,
            color: "#d5d5d5"
        },
        yaxes: [{
            position: "left",
            max: {{ $weekData['maxAmount'] }},
            color: "#d5d5d5",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Arial',
            axisLabelPadding: 3
        }, {
            position: "right",
            clolor: "#d5d5d5",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: ' Arial',
            axisLabelPadding: 67
        }
        ],
        legend: {
            noColumns: 1,
            labelBoxBorderColor: "#000000",
            position: "nw"
        },
        grid: {
            hoverable: false,
            borderWidth: 0
        }
    };

    function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
    }

    var previousPoint = null, previousLabel = null;

    $.plot($("#flot-dashboard-chart-2"), datasetDay, optionsDay);

{{-- DATA MONTH --}}
	var monthO = [
		@foreach($monthData['data'] as $data)
        [gd( {{ $data[0] }} , {{ $data[1] }}, {{ $data[2] }} ), {{ $data[3] }} ],
     	@endforeach
	];

	var monthP = [
		@foreach($monthData['data'] as $data)
		[gd( {{ $data[0] }} , {{ $data[1] }}, {{ $data[2] }} ), {{ $data[4] }} ],
		@endforeach
	];

    var datasetMonth = [
        {
            label: "Número de ordenes",
            data: monthP,
            color: "#1ab394",
            bars: {
                show: true,
                align: "center",
                barWidth: 24 * 60 * 60 * 600,
                lineWidth:0
            }

        }, {
            label: "Pagos exitosos",
            data: monthO,
            yaxis: 2,
            color: "#1C84C6",
            lines: {
                lineWidth:1,
                    show: true,
                    fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.2
                    }, {
                        opacity: 0.4
                    }]
                }
            },
            splines: {
                show: false,
                tension: 0.6,
                lineWidth: 1,
                fill: 0.1
            },
        }
   	];

	var optionsMonth = {
        xaxis: {
            mode: "time",
            tickSize: [3, "day"],
            tickLength: 0,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Arial',
            axisLabelPadding: 10,
            color: "#d5d5d5"
        },
        yaxes: [{
            position: "left",
            max: {{ $weekData['maxAmount'] }},
            color: "#d5d5d5",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Arial',
            axisLabelPadding: 3
        }, {
            position: "right",
            clolor: "#d5d5d5",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: ' Arial',
            axisLabelPadding: 67
        }
        ],
        legend: {
            noColumns: 1,
            labelBoxBorderColor: "#000000",
            position: "nw"
        },
        grid: {
            hoverable: false,
            borderWidth: 0
        }
    };

    $('#monthly').on('click', function(){
    	$('#weekly').removeClass('active');
    	$('#monthly').addClass('active');
    	$.plot($("#flot-dashboard-chart-2"), datasetMonth, optionsMonth);

    });

    $('#weekly').on('click', function() {
    	$('#weekly').addClass('active');
    	$('#monthly').removeClass('active');
    	$.plot($("#flot-dashboard-chart-2"), datasetDay, optionsDay);
    })

{{-- DATA MONTH --}}
		{{$count= 0}}
        var data1 = [
        	@foreach($monthData['data'] as $data)
            [{{$count+=1}}, {{$data[5]}}],
            @endforeach
        ];

        $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"),
        [
            data1,
        ],
        {
            series: {
                lines: {
                    show: false,
                    fill: true
                },
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 0.4
                },
                points: {
                    radius: 0,
                    show: true
                },
                shadowSize: 2
            },
            grid: {
                hoverable: true,
                clickable: true,
                tickColor: "#d5d5d5",
                borderWidth: 1,
                color: '#d5d5d5'
            },
            colors: ["#1ab394"],
            xaxis:{
            },
            yaxis: {
                ticks: 4
            },
            tooltip: false
        });
{{-- DATA DONUT --}}
        var doughnutData = {
            labels: ["Pagadas","Órdenes" ],
            datasets: [{
                data: [{{$countState->approved}},{{$countState->total}}],
                backgroundColor: ["#1ab394","#aaa"]
            }]
        } ;
        var doughnutOptions = {
            responsive: false,
            legend: {
                display: false
            }
        };
        var ctx4 = document.getElementById("doughnutChart").getContext("2d");
        new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});


        var doughnutData2 = {
            labels: ["Aprobado","Expirado","declinado" ],
            datasets: [{
                data: [{{$countState->approved}},{{$countState->expired}},{{$countState->declined}}],
                backgroundColor: ["#1ab394","#f8ac59","#ed5565"]
            }]
        } ;
        var doughnutOptions2 = {
            responsive: false,
            legend: {
                display: false
            }
        };
        var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
        new Chart(ctx4, {type: 'doughnut', data: doughnutData2, options:doughnutOptions2});

    });
</script>
@endsection

