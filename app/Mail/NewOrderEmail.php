<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->order = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $asunto = "Happy Pets at Home - Nueva Orden";
        $plantilla ='admin.ecommerce.emailNewOrder';
        return $this->from('hpathome.mkt@gmail.com', 'Ordenes - Happy Pets at Home')
                ->view($plantilla)
                ->subject($asunto);
    }
}
