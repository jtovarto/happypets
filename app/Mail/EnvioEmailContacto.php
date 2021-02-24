<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvioEmailContacto extends Mailable
{
    use Queueable, SerializesModels;

    public $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensaje)
    {
        //
        $this->mail = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $asunto = "Dpto: " . $this->mail->departamento . " - " . $this->mail->asunto;
        return $this->from('hpathome.mkt@gmail.com', 'Contacto - Happy Pets at Home')->view('mails.mailContacto')->subject($asunto);
    }
}
