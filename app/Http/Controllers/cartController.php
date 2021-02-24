<?php


namespace App\Http\Controllers;
use App\Productos;
use Illuminate\Database\Eloquent\Builder;
Use Cart;
use App\Libraries\ShaHash\SHAHasher;

use Illuminate\Http\Request;

class cartController extends Controller
{
    //
    public function add_item($id){
		
		//$anterior= redirect()->getUrlGenerator()->previous();
    	
    	$producto = Productos::findOrFail($id);

    	Cart::instance('shopping')->add([
    		'id' 	=> $producto->productoId,
    		'name'	=> $producto->name,
    		'price'	=> $producto->price,
    		'qty'	=> 1,
            'tax'=>0,
            'taxRate'=>0,
            'option' => [
            'descripcion'=>$producto->descripcion,
        ],
    		
    	]);
            
      return ['cesta'=> Cart::instance('shopping')->count()];
    }	


    public function remove_item($rowId){
      
      $Carrito=Cart::instance('shopping')->remove($rowId);
      
       return back();
    }

	
  	public function show_car (){

      return view('pages.carrito');
    }


    public function destroy_car(){
		  //Cart::instance('shopping')->destroy();
    }


    
    public function update_car($rowId, $qty){
		
      Cart::instance('shopping')->update($rowId, ['qty' => $qty]); 

      if (Cart::instance('shopping')->Count() < 1) {
        return back();
      }
      // Will update the name
		return [
      'cesta'=> Cart::instance('shopping')->count(),
      'total'=> Cart::instance('shopping')->total(),
      'subtotal'=> Cart::instance('shopping')->subtotal(),
    ];
	}



	//Obtener Items
  //Cart::instance('shopping')->get($rowId);
  
  	//Obtener todo el contenido (coleccion)
  //Cart::instance('shopping')->content();
  
  	//Obtener el total
  //Cart::instance('shopping')->total($decimals, $decimalSeperator, $thousandSeperator);
  
  //Cart::instance('shopping')->tax($decimals, $decimalSeperator, $thousandSeperator);
  //Cart::instance('shopping')->subtotal($decimals, $decimalSeperator, $thousandSeperator);
  	
  	//Obtener recuento de items en el carrito
  //Cart::instance('shopping')->count();
}
