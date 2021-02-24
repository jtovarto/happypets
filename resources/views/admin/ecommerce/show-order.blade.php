@extends('admin.main')

@section('page-title', 'Orden de Venta')

@section('breadcrumb-title', 'Orden de Venta')

@section('breadcrumb-links')
	<li>
		<a href="{{ route('orders-history') }}">Órdenes</a>
	</li>
	<li>
		<strong>Mostrar Orden</strong>
	</li>
@endsection

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
		<div class="ibox">
	    	<div class="ibox-title ">
	    		<h3 class="m-t-none m-b">Datos de Compra Ref.: {{ $order->reference_sale }}</h3>
	    	</div>
			<div class="ibox-content">
				<div class="row">
				{{--DATOS DE PAGO--}}
					<div class="col-xs-12 col-sm-7 b-r">
						<h3 class="m-t-none bg-primary p-xs">Datos de Pago</h3>
						<div class="row p-w-sm">
							<div class="form-group col-xs-12 col-md-8">
				                <label class="control-label">Identificador de Transacción</label>
				                <p>{{$order->transaction_id}}</p>
				            </div>
				            <div class="form-group col-xs-6 col-sm-4 col-lg-4">
				                <label class="control-label">Fecha</label>
				                <p>{{$order->transaction_date->format('d-m-Y')}}</p>
				            </div>
							<div class="form-group col-xs-6 col-sm-4 col-lg-4">
				                <label class="control-label">ID Transacción</label>
				                <p>{{$order->reference_pol}}</p>
				            </div>
				            <div class="form-group col-xs-6 col-sm-4 col-lg-4">
				                <label class="control-label">Método</label>
				                <p>{{$order->payment_method_name}}</p>
				            </div>
				            <div class="form-group col-xs-6 col-sm-4 col-lg-4">
				            	<label class="control-label">Status PayU</label>
				            	<p>
				                @if 	($order->state_pol == 4)
		                            <span class="label label-primary">APROBADO</span>
		                        @elseif ($order->state_pol == 5)
		                            <span class="label label-warning">EXPIRADO</span>
		                        @elseif ($order->state_pol == 6)
		                            <span class="label label-danger">DECLINADO</span>
		                        @endif
		                        </p>
				            </div>
						</div>
				    </div>
				{{--DATOS DE ENVIO--}}
				    <div class="col-xs-12 col-sm-5">
					    <h3 class="m-t-none bg-primary p-xs">Datos de Envío</h3>
				    	<div class="row p-w-sm">
				            <div class="form-group col-xs-12 col-lg-3">
				                <label class="control-label">Ciudad</label>
				                <p>{{$order->shipping_city}}</p>
				            </div>
					    	<div class="form-group col-xs-12 col-lg-9">
				                <label class="control-label">Dirección de envío</label>
				                <p>{{$order->shipping_address}}</p>
				            </div>
				            <div class="form-group col-xs-6 col-lg-3">
				                <label class="control-label">Nro de Guía</label>
				                <p>{{$order->shipping_guide_id ?? 'Sin registrar'}}</p>
				            </div>
				            <div class="form-group col-xs-6 col-lg-3">
				                <label class="control-label">Empresa</label>
				                <p>{{$order->shipping_company ?? 'Sin registrar'}}</p>
				            </div>
				            <div class="form-group col-xs-6 col-lg-3">
				                <label class="control-label">Fecha del Envío</label>
				                <p>{{$order->shipping_date ?? 'Sin registrar'}}</p>
				            </div>
				            <div class="form-group col-xs-6 col-sm-6 col-lg-3">
				            	<label class="control-label">Estatus del Envío</label>
				            	<p>
				                @if 	($order->shipping_state == 1)
		                            <span class="label label-primary">ENVIADO</span>
		                        @elseif ($order->shipping_state == 2)
		                            <span class="label label-warning">PENDIENTE</span>
		                        @elseif ($order->shipping_state == 3)
		                            <span class="label label-danger">CANCELADO</span>
		                        @endif
				            	</p>
				            </div>
				    	</div>
				    </div>
				</div>
			</div>
			<div class="ibox-content">
				<div class="row">
				{{--DATOS DE USUARIO--}}
					<div class="col-sm-12">
						<h3 class="m-t-none m-b bg-primary p-xs">Detalles de la Orden</h3>
						<div class="row p-w-sm">
							<div class="form-group col-xs-12 col-sm-3 col-lg-2">
				                <label class="control-label">Cliente</label>
				                <p>{{$order->email_buyer}}</p>
				            </div>
				            <div class="form-group col-xs-12 col-sm-9 col-lg-3">
				                <label class="control-label">Dirección</label>
				                <p>{{$order->billing_address}}</p>
				            </div>
				            <div class="form-group col-xs-6 col-sm-3 col-lg-2">
				                <label class="control-label">Teléfono</label>
				                <p>{{$order->phone}}</p>
				            </div>
				            <div class="form-group col-xs-6 col-sm-3 col-lg-2">
				                <label class="control-label">Teléfono móvil</label>
				                <p>{{$order->mobile_phone ?? 'no registrado'}}</p>
				            </div>
				            <div class="form-group col-xs-6 col-sm-3 col-lg-2">
				            	<label class="control-label">Ciudad</label>
				                <p>{{$order->billing_city}}</p>
				            </div>
				            <div class="form-group col-xs-6 col-sm-3 col-lg-1">
				            	<label class="control-label">Pais</label>
				                <p>{{$order->billing_country}}</p>
				            </div>
						</div>
				    </div>
				{{--DETALLE DE COMPRA--}}
					<div class="col-sm-12 p-w-md">
						<table class="footable table table-stripped">
		                    <thead style="background-color: #EEE">
		                        <tr>
		                            <th>Cod.</th>
		                            <th data-hide="phone">Producto</th>
		                            <th data-hide="phone">Precio</th>
		                            <th data-hide="tablet" class="text-center">Cantidad</th>
		                            <th>Subtotal</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                     <tr>
		                        <td>HP001</td>
		                        <td>PUPPY SORB</td>
		                        <td>COP ${{ number_format($order->extra2,1,',','.') }}</td>
		                        <td class="text-center">{{ $order->extra1 }}</td>
		                        <td>
		                        	COP ${{ number_format($order->extra1 * $order->extra2,1,',','.') }}
		                        </td>
							</tr>
		                    </tbody>
		                    <tfoot>
		                        <tr>
		                            <td colspan="5" class="text-right">
		                              <strong>Total: COP ${{ number_format($order->value,2,',','.') }}</strong>
		                            </td>
		                        </tr>
		                    </tfoot>
		                </table>
					</div>
				</div>
			</div>
			<div class="ibox-content">
				<div class="row">
					<div class="col-sm-12 text-right">
	            		<a href="{{ route('orders-history') }}" class="btn btn-info"><i class="fa fa-undo m-r-sm"></i>Regresar</a>
	            	</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('css_files')
	<!-- datepicker -->
	<link href="{{ asset('admin/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
	<!-- FooTable -->
	<link href="{{ asset('admin/css/plugins/footable/footable.core.css') }}" rel="stylesheet">
@endpush

@push('js_files')
	<!-- Data picker -->
	<script src="{{ asset('admin/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
	<!-- FooTable -->
	<script src="{{ asset('admin/js/plugins/footable/footable.all.min.js') }}"></script>
@endpush

@section('scripts')
	<script>
		$(document).ready(function() {
			$('.footable').footable();

			$('#shipping_date').datepicker({
		        todayBtn: "linked",
		        keyboardNavigation: false,
		        forceParse: false,
		        calendarWeeks: true,
		        autoclose: true,
		        format: "yyyy/mm/dd"
		    });
		})
	</script>
@endsection