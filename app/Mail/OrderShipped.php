<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->mail = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $asunto = "Happy Pets at Home - Envio de pedido";
        $plantilla ='admin.ecommerce.emailShipping';
        return $this->from('hpathome.mkt@gmail.com', 'Envíos - Happy Pets at Home')
                ->view($plantilla)
                ->subject($asunto);
    }
}
