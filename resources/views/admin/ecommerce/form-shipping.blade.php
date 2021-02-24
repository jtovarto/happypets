@extends('admin.main')

@section('page-title', 'Registro de envío')

@section('breadcrumb-title', 'Registro de envío')

@section('breadcrumb-links')
	<li>
		<a href="{{ route('orders-pending') }}">Órdenes</a>
	</li>
	<li>
		<strong>Registro de envío</strong>
	</li>
@endsection

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
		<div class="ibox">
			@if ($errors->any())
	    	<div class="ibox-title ">
	    		<div class="alert alert-danger alert-dismissable">
	                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<ul>
					@foreach ($errors->all() as $error)
					    <li>{{ $error }}</li>
					@endforeach
					</ul>
	             </div>
	    	</div>
	    	@endif
			<div class="ibox-content">
				<div class="row">
					<div class="col-sm-6 m-t-xs b-r">
						<h3 class="m-t-none m-b bg-primary p-xs">Registro de Envío</h3>
						<div class="row p-w-sm">
							<div class="col-sm-12">
						        <form action="{{ route('save-shipping') }}" method="post">
						        	@csrf
						        	<input type="hidden" value="{{$order->reference_sale}}" name="reference_sale" required>
						        	<div class="row">
							            <div class="form-group col-lg-12">
							            	<label for="company">Empresa contratada</label>
							            	<input type="text" name="shipping_company" id="company" placeholder="Nombre de la empresa de envíos" class="form-control" required>
							            </div>
						                <div class="form-group col-lg-6">
						                    <label for="shipping_guide_id">Nro. de guía</label>
						                    <input id="shipping_guide_id" type="text" name="shipping_guide_id" class="form-control" required placeholder="Introduzca el número de guía">
						                </div>
							            <div class="form-group col-lg-6">
						                    <label class="control-label" for="shipping_date">Fecha</label>
						                    <div class="input-group date">
						                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						                        <input id="shipping_date" type="text" name="shipping_date" class="form-control" value="{{date('d/m/Y')}}" readonly required style="background-color: white;">
						                    </div>
						                </div>
						        	</div>
						            <div>
						            	<hr>
						                <button class="btn btn-sm btn-info pull-right m-t-n-xs" type="submit">
						                	<strong>Registrar</strong>
						                </button>
						            </div>
						        </form>
							</div>
						</div>
				    </div>

				    <div class="col-sm-6 m-t-xs">
					    <h3 class="m-t-none m-b bg-primary p-xs">Registro de Envío</h3>
				    	<div class="row p-w-sm">
				            <div class="form-group col-xs-6 col-sm-5 col-md-6 col-lg-3">
				                <label class="control-label">Ref. Orden</label>
				                <p>{{$order->reference_sale}}</p>
				            </div>
				            <div class="form-group col-xs-6 col-sm-7 col-md-6 col-lg-9">
				            	<label class="control-label">Status</label>
				            	<p>
				                @if 	($order->shipping_state == 1)
								    <span class="label label-primary">Enviado</span>
								@elseif ($order->shipping_state == 2)
								    <span class="label label-warning">Pendiente</span>
								@elseif ($order->shipping_state == 3)
								    <span class="label label-danger">Cancelado</span>
								@endif
				            	</p>
							</div>
				            <div class="form-group col-xs-12 col-md-6 col-lg-4">
				                <label class="control-label">Cliente</label>
				                <p>{{$order->email_buyer}}</p>
				            </div>
				            <div class="form-group col-xs-6  col-sm-5 col-md-6 col-lg-4">
				                <label class="control-label">Telefóno</label>
				                <p>{{$order->phone}}</p>
				            </div>
				            <div class="form-group col-xs-6  col-sm-7 col-lg-3">
				                <label class="control-label">Ciudad</label>
				                <p>{{$order->shipping_city}}</p>
				            </div>
				            <div class="form-group col-sm-12 col-lg-8">
				                <label class="control-label">Dirección de envío</label>
				                <p>{{$order->shipping_address}}</p>
				            </div>
				    	</div>
				    </div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('css_files')
	<!-- datepicker -->
	<link href="{{ asset('admin/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
@endpush

@push('js_files')
	<!-- Data picker -->
	<script src="{{ asset('admin/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
@endpush

@section('scripts')
	<script>
		$(document).ready(function() {
			$('#shipping_date').datepicker({
		        keyboardNavigation: false,
                forceParse: true,
                autoclose: true,
                format:'dd/mm/yyyy',
                todayBtn: "linked",
                todayHighlight: true,
		    });
		})
	</script>
@endsection