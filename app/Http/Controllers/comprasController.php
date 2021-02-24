<?php

namespace App\Http\Controllers;
use Cart;
use Carbon\Carbon;
use App\Compras;
use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use App\Mail\NewOrderEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class comprasController extends Controller
{
     // Trae grupo de ordenes dentro de un rango de fechas
    public function orderHistory(Request $request)
    {
        if (isset($request->dateEnd))
            $dEnd = Carbon::createFromFormat('d/m/Y',$request->dateEnd);
         else
            $dEnd = Carbon::today();


        if (isset($request->dateStart)) {
            $dStart = Carbon::createFromFormat('d/m/Y',$request->dateStart);
        }
        else   {
            $dStart = new Carbon($dEnd);
            $dStart->subMonths(1);
        }

        if ($dStart->greaterThan($dEnd)) {
            return redirect()->back()->withErrors(['Errors' => 'La fecha de inicio no pude ser mayor a la fecha final']);
        }


        $orders = Compras::orderBy('transaction_date', 'desc')
                            ->whereBetween('transaction_date', [$dStart, $dEnd])
                            ->get(['reference_pol', 'reference_sale',
                                    'value', 'email_buyer','state_pol',
                                    'shipping_address', 'shipping_city',
                                    'phone', 'transaction_date', 'shipping_state',
                                    'shipping_date'
                            ]);
        $dateStart = $dStart->format('d/m/Y');
        $dateEnd   = $dEnd->format('d/m/Y');
        return view('admin.ecommerce.history-orders', compact('orders', 'dateStart', 'dateEnd'));
    }

    // Trae grupo de ordenes pendientes por envío
    public function shipping()
    {
        $orders = Compras::needsToBeSent()->get();
        return view('admin.ecommerce.shipping-orders', compact('orders'));
    }

    // Busca orden segun $ref y lo muestra
    public function show($ref)
    {
        $order = Compras::findOrFail($ref);
        return view('admin.ecommerce.show-order', compact('order'));
    }

    // Busca orden segun $ref para registrar envío
    public function formShipping($ref)
    {
        $order = Compras::where('reference_sale', $ref)->firstOrFail();
        if ($order->CanBeShipping())
            return view('admin.ecommerce.form-shipping', compact('order'));
        else
            return view('admin.errors.404');

    }

    // Obtiene datos del formulario para registro de envío
    public function saveShipping(Request $request)
    {
        $validator = $request->validate([
            'shipping_company' => 'required',
            'shipping_date'    => 'required|date_format:d/m/Y',
            'reference_sale'    => 'required'
        ]);

        $order = Compras::findOrFail($request->reference_sale);

        if (!$order->scopeCanBeShipping())
            return redirect()->route('orders-pending')
                             ->withErrors([
                                'error' => 'El estado actual de la orden impide registrar su envío'
                            ]);

        $cleanData = $request->except(['_token', 'reference_sale']);
        foreach ($cleanData as $key => $value) {
            $order->{$key} = $value;
        }

        $date  = Carbon::createFromFormat('d/m/Y',$request->shipping_date);

        $order->shipping_date = $date;
        $order->shipping_state = 1;
        
        /*$order->save();*/
        $this->sendShippingNotification($order);
        $success = 'Se ha registrado el envío de la orden N° '. $request->reference_sale.' El sitema procederá a notificar al cliente vía email';
        return redirect()->route('orders-pending')->withSuccess($success);
    }

    // Cancela un orden actaulizando su estado shipping_order
    public function cancelShipping(Request $request)
    {
        $order = Compras::findOrFail($request->ref_order);
        if ($order->shipping_state <> 2)
            return redirect()->back()->withErrors(['error' => 'El estado actual de la orden impide su cancelación']);

        $order->shipping_state = 3;
        $order->save();
        $success = 'La orden  N° '. $request->ref_order.' ha sido cancelada';
        return redirect()->route('orders-pending')->withSuccess($success);
    }

    public function reportOrders()
    {

        $orders = Compras::all('reference_pol', 'reference_sale',
                            'value', 'email_buyer','state_pol',
                            'shipping_address', 'shipping_city',
                            'phone', 'transaction_date', 'shipping_state',
                            'shipping_date');
        return view('admin.ecommerce.report-orders', compact('orders'));
    }
    
    public function consultarOrden($numOrden)
    {
         $consulta = Compras::where('reference_pol',$numOrden)->firstOrFail();
         if    ($consulta->shipping_state == 1){
            $estado_envio = 'ENVIADO';
         }
        elseif ($consulta->shipping_state == 2){
            $estado_envio = 'PENDIENTE';
        }
        elseif ($consulta->shipping_state == 3){
            $estado_envio = 'CANCELADO';
        }

         return [
            'cantidad'  => $consulta->extra1,
            'empresa'   => $consulta->shipping_company,
            'estpago'   => $consulta->response_message_pol,
            'fecpago'   => $consulta->transaction_date->format('d/m/Y'),
            'estenvio'  => $estado_envio,
            'guia'      => $consulta->shipping_guide_id,
        ];
    }
    
    private function sendShippingNotification($order)
    {
        $data['user_name']        = $order->extra3;
        $data['transaction_ref']  = $order->reference_sale;
        $data['transaction_id']   = $order->reference_pol;
        $data['shipping_company'] = $order->shipping_company;
        $data['shipping_date']    = $order->shipping_date->format('d/m/Y');
        $data['shipping_id']      = $order->shipping_guide_id;
        $data['shipping_state']   = $order->shipping_state;
        
        $receivers = $order->email_buyer;
        Mail::to($receivers)->send(new OrderShipped((object)$data));
        
        
        Mail::to('atencionalcliente@happypetsathome.com.co')->send(new OrderShipped((object)$data));
        
        return back()->withSuccess('El mensaje ha isdo enviado exitosamente');

    }
    
    public function confirmacion($request)
    {
        $ref = $request['reference_pol'];
        $compras = Compras::firstOrNew(['reference_pol' => $ref]);
        
        foreach ($request as $key => $value) {
            if (Schema::hasColumn('compras', $key)){
                if (empty($value))
                    $value = 0;
               $compras->{$key} = $value;

            }
        }

        if ((empty($compras->shipping_address)) || (is_null($compras->shipping_address)))
            $compras->shipping_address = $compras->billing_address;

        if ((empty($compras->shipping_city)) || (is_null($compras->shipping_city)))
            $compras->shipping_city = $compras->billing_city;

        $compras->shipping_city = strtoupper($compras->shipping_city);
        $compras->billing_city  = strtoupper($compras->billing_city);
        
        if ($compras->state_pol == 4)
            $compras->shipping_state = 2;
        else
            $compras->shipping_state = 3;
        
        
        $compras->save();
        $carrito = Cart::instance('shopping')->destroy();
        $this->senNewOrderNotification($compras);
    }

    private function senNewOrderNotification($order)
    {
        $receivers = 'atencionalcliente@happypetsathome.com.co';
        Mail::to($receivers)->send(new NewOrderEmail($order));
    }

}
