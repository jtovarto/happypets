@extends('admin.main')

@section('page-title', 'Historial de Ordenes')

@section('breadcrumb-title', 'Historial de Ordenes de ventas')

@section('breadcrumb-links')
<li>
    <a href="{{ route('orders-history') }}">Ordenes</a>
</li>
<li class="active">
    <strong>Pendientes de envío</strong>
</li>
@endsection

@section('style')
<style>
	tr:nth-child(even) {background: #eee}
</style>
@endsection

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="ibox">
	            	<div class="ibox-title ">
	            		<div class="row">
	            			<div class="col-xs-12 col-sm-5 col-lg-3 col-lg-offset-5">
			                	<div class="form-group">
					            	<label for="company">Bucar</label>
					            	<div id="filter-form-container"></div>
					            </div>
	                		</div>
	                		<div class="col-xs-12 col-sm-7 col-lg-4">
	                			<label for="company">Filtra por fecha</label>
	                			<form class="form" role="form" action="{{ route('orders-history') }}" method="POST">
	                				@csrf
	                				<div class="form-group" id="filter_date">
					                	<div class="input-daterange input-group" id="datepicker">
					                		<span class="input-group-addon">Desde</span>
	                                   		<input type="text" class="input-sm form-control" name="dateStart" value="{{ $dateStart ?? '' }}" readonly style="background-color: white;">
	                                    	<span class="input-group-addon">hasta</span>
	                                    	<input type="text" class="input-sm form-control" name="dateEnd" value=" {{ $dateEnd ?? '' }}" readonly style="background-color: white;">

	                                    </div>
	                				</div>
	                                <button type="submit" class="btn btn-info btn-sm pull-right "><i class="fa fa-filter m-r-xs"></i> Filtrar</button>
	                			</form>
	                		</div>
	                	</div>
	            	</div>
	                <div class="ibox-content">
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
		                 <table class="footable table table-stripped">
		                    <thead>
		                        <tr>
		                            <th>Ref.</th>
		                            <th data-breakpoints="xs">Email</th>
		                            <th data-breakpoints="all">Dirección de envío</th>
		                            <th data-breakpoints="xs sm md">Ciudad</th>
		                            <th data-breakpoints="all" data-filterable="false">Monto</th>
		                            <th data-breakpoints="xs">Fec. Pago</th>
		                            <th data-breakpoints="all">Nro Transacción</th>
		                            <th >Pago</th>
		                            <th data-breakpoints="xs">Envío</th>
		                        	<th data-filterable="false" class="text-right">Acción</th>
		                        </tr>
		                    </thead>
		                    <tbody>

		                     @foreach ($orders as $order)
	                         <tr>
	                            <td>{{ $order->reference_sale }}</td>
	                            <td>{{ $order->email_buyer }}</td>
	                            <td>{{ $order->shipping_address }}</td>
	                            <td>{{ $order->shipping_city }}</td>
	                            <td>COP ${{ number_format($order->value,2,',','.') }}</td>
	                            <td>{{ $order->transaction_date->format('d-m-Y') }}</td>
	                            <td>{{ $order->reference_pol }}</td>
	                            <td>
	                                @if 	($order->state_pol == 4)
	                                    <span class="label label-primary">Aceptado</span>
	                                @elseif ($order->state_pol == 5)
	                                    <span class="label label-warning">Expirado</span>
	                                @elseif ($order->state_pol == 6)
	                                    <span class="label label-danger">Declinado</span>
	                                @endif
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
	                            <td  class="text-right">
									<a href="{{ route('order-show', $order->reference_sale) }}" class="btn btn-default btn-xs">Detalle</a>

								</td>
							</tr>
							@endforeach
		                    </tbody>
		                    <tfoot>
		                    	<tr>
		                    		<td colspan="10">
		                    			<div id="paging-ui-container"></div>
		                    		</td>
		                    	</tr>
		                    </tfoot>
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
	<!-- DatePicker -->
 	<link href="{{ asset('admin/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
@endpush

@push('js_files')
	<!-- FooTable -->
	<script src="{{ asset('admin/js/plugins/footable/footable.js') }}"></script>
	<!-- DataPicker -->
    <script src="{{ asset('admin/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
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

			 $('#filter_date .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format:'dd/mm/yyyy',
                todayBtn: "linked",
                todayHighlight: true,
            });
	    });
	</script>
@endsection

