<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
           $table->increments('id');

            // identificador de la orden
            $table->string('reference_sale')->unique();
            $table->index('reference_sale');

            // datos de transaccion payu
            $table->string('transaction_id');       // identificador
            $table->string('reference_pol');        // referencia
            $table->string('state_pol');            // status
            $table->string('response_code_pol');    // codigo de respuesta (tabla confirmacion)
            $table->string('response_message_pol'); // mensaje de respuesta (tabla confirmacion)
            $table->string('value');                // monto de la transaccion
            $table->date('transaction_date');       // fecha de la transaccion en el banco

            //metodos de pago
            $table->float('commision_pol')->default(0);         // comision
            $table->string('payment_method_name');  // nombre del metodo
            $table->unsignedSmallInteger('payment_method')->nullable();    // codigo segun payu
            $table->unsignedSmallInteger('payment_method_id')->nullable(); // codigo segun tabla

            // solo TC
            $table->unsignedTinyInteger('installments_number')->nullable(); //numero de cuotas

            // TC y alunos cash
            $table->string('authorization_code')->nullable();

            // only PSE
            $table->string('cus')->nullable();
            $table->string('pse_bank')->nullable();
            $table->string('pse_reference1')->nullable();
            $table->string('pse_reference2')->nullable();
            $table->string('pse_reference3')->nullable();
            $table->unsignedSmallInteger('pseCycle')->nullable();

            //user data
            $table->string('email_buyer');
            $table->string('phone');
            $table->string('mobile_phone')->nullable();
            $table->string('billing_address');
            $table->string('billing_city');
            $table->string('billing_country');
            $table->string('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_country');

            //misc
            $table->string('extra1')->nullable(); // cantidad de productos
            $table->string('extra2')->nullable(); // json del contenido
            $table->string('extra3')->nullable(); // nombre de usuario

            $table->unsignedTinyInteger('shipping_state')->nullable();
            $table->date('shipping_date')->nullable();
            $table->string('shipping_guide_id')->nullable();
            $table->string('shipping_company')->nullable();

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
        Schema::dropIfExists('compras');
    }
}
