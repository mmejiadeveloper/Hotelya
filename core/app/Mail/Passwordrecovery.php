<?php

namespace hotelya\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Passwordrecovery extends Mailable
{
    use Queueable, SerializesModels; 

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mmejiadeveloper@gmail.com','EsteHotel')->subject("Recuperación de la contraseña")
        ->view('mails.password_recovery');
    }
}
