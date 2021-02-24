<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('productoId')->unique();            
            $table->index('productoId');
            $table->string('name',50);
            $table->string('descripcion',250);
            $table->string('resena',250);
            $table->float('price', 8, 2);
            $table->integer('stock');            
            $table->integer('stock_min');            
            $table->integer('stock_max');   
            $table->string('imagen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
