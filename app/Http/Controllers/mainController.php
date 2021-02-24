<?php

namespace App\Http\Controllers;
use App\Productos;
use App\Compras;
use App\Mailing;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnvioEmailContacto;

class mainController extends Controller
{
    //

    public function send_mail(Request $mensaje)
    {
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
        $recaptcha_secret = '6Lc3hrsZAAAAAEZ3f5v3_UIJKSFBQugmIAKJ2pmW';
        $recaptcha_response = $mensaje->recaptcha_response; 
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $recaptcha = json_decode($recaptcha);
        
        if($recaptcha->score >= 0.7) {
            $receivers = 'atencionalcliente@happypetsathome.com.co';
            Mail::to($receivers)->send(new EnvioEmailContacto($mensaje));
            return back()->withSuccess('El mensaje ha isdo enviado exitosamente');
            
        } else {
            return back()->withSuccess('Hubo un problema al enviar su solicitud');
        
        }
        
    }
    public function home(){
        
        $producto = Productos::findOrFail(4);
        $producto->price = $this->numberFormat($producto->price, 2, ',', '.');
        
        return  view('pages.home', ['producto' => $producto,  ]);

    }

    public function lista_productos(){

    	return view('layouts.shopSections.listProducts', ['list_productos'=>Productos::all()]);
    	
    }

    public function detalle_producto($id){

    	return  view('layouts.shopSections.productoDetails', [
            'producto' => Productos::findOrFail($id),
            'list_productos'=> Productos::all(), 
        ]);

    }

    public function checkout(){

        $departamentos = [
            1 => 'AMAZONAS',
            2 => 'ANTIOQUIA',
            3 => 'ARAUCA',
            4 => 'ATLANTICO',
            5 => 'BOLIVAR',
            6 => 'BOYACA',
            7 => 'CALDAS',
            8 => 'CAQUETA',
            9 => 'CASANARE',
            10 => 'CAUCA',
            11 => 'CESAR',
            12 => 'CHOCO',
            13 => 'CORDOBA',
            14 => 'CUNDINAMARCA',
            15 => 'GUAINIA',
            16 => 'GUAJIRA',
            17 => 'GUAVIARE',
            18 => 'HUILA',
            19 => 'MAGDALENA',
            20 => 'META',
            21 => 'N SANTANDER',
            22 => 'NARINO',
            23 => 'PUTUMAYO',
            24 => 'QUINDIO',
            25 => 'RISARALDA',
            26 => 'SAN ANDRES',
            27 => 'SANTANDER',
            28 => 'SUCRE',
            29 => 'TOLIMA',
            30 => 'VALLE DEL CAUCA',
            31 => 'VAUPES',
            32 => 'VICHADA',
        ];

        $ApiKey =  '8qEPs046ALUwTiTJBesl6b1Rt3';//'4Vj8eK4rloUd272L48hsrarnUA';
        $merchantId =  '830771';//'508029';
        $accountId =  '512321';//'512321';
        $referenceCode = "HP".date("dm").$this->generarCodigo(5);//'TestPayU'.$this->generarCodigo(5);
        $amount = number_format(Cart::instance('shopping')->subtotal_number(), 2, '.', '');//"20000";
        $tax = 0;
        $currency ="COP";

        $formData = [
            'merchantId'=>$merchantId,
            'referenceCode' =>  $referenceCode,     
            'signature'=> hash('md5', $ApiKey ."~". $merchantId ."~". $referenceCode ."~". $amount ."~". $currency ),
            //'accountId'=> $accountId,
            'currency'=> $currency,            
            'tax' =>  $tax,
            'amount' =>  $amount,
            'taxReturnBase'=>$amount,
            'extra1'=>Cart::instance('shopping')->count(),

        ];

        return  view('pages.checkout', [
            'departamentos' => $departamentos,
            'list_productos'=> Productos::all(), 
            'formData' => $formData,
        ]);

    }

    private function generarCodigo($longitud) {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
    }   
    
     private function numberFormat($value, $decimals, $decimalPoint, $thousandSeperator)
    {
        if(is_null($decimals)){
            $decimals = is_null(config('cart.format.decimals')) ? 2 : config('cart.format.decimals');
        }
        if(is_null($decimalPoint)){
            $decimalPoint = is_null(config('cart.format.decimal_point')) ? '.' : config('cart.format.decimal_point');
        }
        if(is_null($thousandSeperator)){
            $thousandSeperator = is_null(config('cart.format.thousand_seperator')) ? ',' : config('cart.format.thousand_seperator');
        }

        return number_format($value, $decimals, $decimalPoint, $thousandSeperator);
    }
    
    
    public function mailing(Request $request){
        $mailing = new Mailing;
        
        $mailing->nombre = $request->nombre;
        $mailing->apellido = $request->apellido;
        $mailing->compania = $request->compania;
        $mailing->email = $request->email;
        $mailing->telefono = $request->telefono;
        $mailing->departamento = $request->departamento;
        $mailing->asunto = $request->asunto;
        $mailing->mensaje = $request->mensaje;
        

        $mailing->save();
        return back()->with(['msg'=>"Nuestro equipo te contactará a la brevedad posible"]);
        
    }
  public function respuesta(Request $request){
        Cart::instance('shopping')->destroy();
        $carrito = Cart::instance('shopping')->destroy();
        return $request;
    }
    

}
