@extends('admin.main')

@section('page-title', 'Ordenes de ventas')

@section('breadcrumb-title', 'Ordenes pendientes de envío')

@section('breadcrumb-links')
<li>
    <a href="{{ route('orders-history') }}">Ordenes</a>
</li>
<li class="active">
    <strong>Pendientes de envío</strong>
</li>
@endsection

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="ibox">
	            	<div class="ibox-title ">
	            		<div class="row">
	            			<div class="col-xs-12">
			                	<div class="form-group">
					            	<label for="company">Bucar</label>
					            	<div id="filter-form-container"></div>
					            </div>
	                		</div>
	                	</div>
	                </div>
	                <div class="ibox-content">
	                	 @if (session()->has('success'))
	            		<div class="alert alert-success alert-dismissable">
	                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	                        {{ session()->get('success') }}
	                    </div>
		            	@endif
		            	@if ($errors->any())
			    		<div class="alert alert-danger alert-dismissable">
			                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							<ul>
							@foreach ($errors->all() as $error)
							    <li>{{ $error }}</li>
							@endforeach
							</ul>
			             </div>
				    	@endif

		                <table class="footable table table-stripped" data-paging="true" data-sorting="true" data-filtering="true" data-state="true">
		                    <thead>
		                        <tr>
		                            <th>Ref.</th>
		                            <th data-breakpoints="xs sm">Email</th>
		                            <th data-breakpoints="all">Nro Transacción</th>
		                            <th data-breakpoints="all">Monto</th>
		                            <th data-breakpoints="xs md">Pago</th>
		                            <th data-breakpoints="xs md">Fecha</th>
		                            <th data-breakpoints="xs md"></th>
		                            <th data-breakpoints="xs"> Status Envío</th>
		                            <th data-breakpoints="all">Dirección</th>
		                            <th data-breakpoints="xs sm">Ciudad</th>
		                            <th data-breakpoints="all">Teléfono</th>
		                        	<th data-breakpoints="" class="text-right">Acción</th>
		                        </tr>
		                    </thead>
		                    <tbody>

		                     @foreach ($orders as $order)
	                         <tr>
	                            <td>{{ $order->reference_sale }}</td>
	                            <td>{{ $order->email_buyer }}</td>
	                            <td>{{ $order->reference_pol }}</td>
	                            <td>COP ${{ number_format($order->value,2,',','.') }}</td>
	                            <td>
	                                @if 	($order->state_pol == 4)
	                                    <span class="label label-primary">APROBADO</span>
	                                @elseif ($order->state_pol == 5)
	                                    <span class="label label-warning">EXPIRADO</span>
	                                @elseif ($order->state_pol == 6)
	                                    <span class="label label-danger">DECLINADO</span>
	                                @endif
	                            </td>
	                            <td>{{ $order->transaction_date->format('d-m-Y') }}</td>
	                            <td>
	                            	{{ $order->SincePurchase() }}
	                            </td>
	                            <td>
	                                @if 	($order->shipping_state == 1)
	                                    <span class="label label-primary">Enviado</span>
	                                @elseif ($order->shipping_state == 2)
	                                    <span class="label label-warning">Pendiente</span>
	                                @elseif ($order->shipping_state == 3)
	                                    <span class="label label-danger">Cancelado</span>
	                                @endif
	                            </td>
	                            <td>{{ $order->shipping_address }}</td>
	                            <td>{{ $order->shipping_city }}</td>
	                            <td>{{ $order->phone }}</td>
	                            <td  class="text-center">
	                                <a href="{{ route('form-shipping', $order->reference_sale) }}" class="btn btn-info btn-xs">Envío</a>
	                                	<input type="hidden" value="{{$order->reference_sale}}" name="ref_order">
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
@endsection

@push('css_files')
	<!-- FooTable -->
	<link href="{{ asset('admin/css/plugins/footable/footable.css') }}" rel="stylesheet">
	<!-- datepicker -->
	<link href="{{ asset('admin/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
	<!-- Sweet Alert -->
    <link href="{{ asset('admin/css/plugins/sweetalert/sweetalert.css')  }}" rel="stylesheet">

@endpush

@push('js_files')
	<!-- FooTable -->
	<script src="{{ asset('admin/js/plugins/footable/footable.js') }}"></script>
	<!-- Data picker -->
	<script src="{{ asset('admin/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
	 <!-- Sweet alert -->
    <script src="{{ asset('admin/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
@endpush

@section('scripts')
	<script>
	    $(document).ready(function() {
			$('.footable').footable({
				"paging": {
					"enabled"	: true,
					"container"	: "#paging-ui-container",
					"size"		: 20,
				},
				"breakpoints": {
					"xs": 575,
					"sm": 767,
					"md": 991,
					"lg": 1199,
				},
				"filtering": {
					"enabled"		: true,
					"dropdownTitle"	: "Buscar en:",
					"focus"			: true,
					"placeholder"	: "Filtrar por...",
					"container"		: "#filter-form-container",
					"position"		: "left",
				}
			});

	        $('#date_added').datepicker({
	            todayBtn: "linked",
	            keyboardNavigation: false,
	            forceParse: false,
	            calendarWeeks: true,
	            autoclose: true
	        });

	        $('#date_modified').datepicker({
	            todayBtn: "linked",
	            keyboardNavigation: false,
	            forceParse: false,
	            calendarWeeks: true,
	            autoclose: true,
	        });

	    });
	</script>
@endsection

