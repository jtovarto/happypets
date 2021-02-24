<?php

namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
Use Cart;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_productos = Productos::all();
        return view('layouts.adminsection.incluirProducto',['list_productos'=>$list_productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen="SinImagen";

        if (($request->hasFile('imagen')) && ($request->file('imagen')->isValid()))  {

            
            $public_path = public_path();
            $destinationPath= $public_path."/images/productos";
            $fileName = $request->productoId;
            $request->file('imagen')->move($destinationPath, $fileName);
            $imagen = $fileName;
        }

        $producto = new Productos;
        
        $producto->name = $request->name;
        $producto->productoId = $request->productoId;
        $producto->descripcion = $request->descripcion;
        $producto->resena = $request->resena;
        $producto->price = $request->price;
        $producto->stock = $request->stock;
        $producto->stock_min = $request->stock_min;
        $producto->stock_max = $request->stock_max;
        $producto->imagen = $imagen;

        $producto->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Productos::findOrFail(4);
        $producto->price = $this->numberFormat($producto->price, 2, ',', '.');
        
        return  view('pages.producto', ['producto' => $producto,  ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $productos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $productos)
    {
        //
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

}
