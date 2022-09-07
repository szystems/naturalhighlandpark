<?php

namespace sisVentasWeb\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReservacionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $reserva,$cli,$usures;

    public function __construct($reserva, $cli, $usures)
    {
        $this->reserva = $reserva;
        $this->cli = $cli;
        $this->usures = $usures;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.reservacion');
    }
}
