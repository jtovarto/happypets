@extends('admin.main')

@section('page-title', 'Historial ordenes de venta')

@section('breadcrumb-title', 'Historial de Ordenes')

@section('breadcrumb-links')
	<li class="active">
	    <strong>Órdenes</strong>
	</li>
@endsection

@section('content')
	<div class="wrapper wrapper-content animated fadeInRight ecommerce">
		@if (session()->has('success'))
			<div class="ibox-title">
	        	<div class="ibox-title ">
	        		<div class="alert alert-success alert-dismissable">
	                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	                    {{ session()->get('success') }}
	                 </div>
	        	</div>
			</div>
        @endif
	    <div class="ibox-content m-b-sm border-bottom">
	    	<div class="table-responsive">
	    		<table class="table table-striped table-bordered table-hover history-dataTables" >
	    			<thead>
                        <tr>
                            <th>Ref.</th>
                            <th>Nro Transacción</th>
                            <th>Cliente</th>
                            <th>Dir. envío</th>
                            <th>Ciudad</th>
                            <th>Telf.</th>
                            <th>Fecha</th>
                            <th>Pago</th>
                            <th>Fec. Envío</th>
                            <th>Envío</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                         <tr>
                            <td>{{ $order->reference_sale }}</td>
                            <td>{{ $order->reference_pol }}</td>
                            <td>{{ $order->email_buyer }}</td>
                            <td>{{ $order->shipping_address }}</td>
                            <td>{{ $order->shipping_city }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->transaction_date }}</td>
                            <td>
                                @if 	($order->state_pol == 4)
                                    <span>Pagado</span>
                                @elseif ($order->state_pol == 5)
                                    <span>Pendiente</span>
                                @elseif ($order->state_pol == 6)
                                    <span>Cancelado</span>
                                @endif
                            </td>
                            <td>{{ $order->shipping_date }}</td>
                            <td>
                                @if 	($order->shipping_state == 1)
                                    <span>Enviado</span>
                                @elseif ($order->shipping_state == 2)
                                    <span>Pendiente</span>
                                @elseif ($order->shipping_state == 3)
                                    <span>Cancelado</span>
                                @elseif ($order->shipping_state == 4)
									<span>Contactar</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
					</tbody>
					<tfoot>
                        <tr>
                            <th>Nro Transacción</th>
                            <th>Ref.</th>
                            <th>Monto</th>
                            <th>Cliente</th>
                            <th>Dir. envío</th>
                            <th>Ciudad</th>
                            <th>Telf.</th>
                            <th>Fecha</th>
                            <th>Fec. Envío</th>
                            <th>Envío</th>
                        </tr>
                    </tfoot>
	    		</table>
	    	</div>
	    </div>
	</div>
@endsection

@push('css_files')
	<!-- DataTable -->
	<link href="{{ asset('admin/datatable/datatables.min.css') }}" rel="stylesheet">
@endpush

@push('js_files')
	<!-- DataTable -->
	<script src="{{ asset('admin/datatable/datatables.min.js') }}"></script>
@endpush

@section('scripts')
<script>
    $(document).ready(function(){
        $('.history-dataTables').DataTable({
             "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "No se encontraron resultados",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "search":         "Buscar:",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Último",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                }
            },
            select: true,
            colReorder: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel'
            ]

        });

    });
</script>
@endsection

