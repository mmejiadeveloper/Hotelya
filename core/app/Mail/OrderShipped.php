<?php

namespace hotelya\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use hotelya\User;

class OrderShipped extends Mailable
{
		use Queueable, SerializesModels;
		
		public $demo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mmejiadeveloper@gmail.com','EsteHotel')
					->view('mails.demo')
					->text('mails.demo_plain')
					->with(
						[
									'testVarOne' => '1',
									'testVarTwo' => '2',
						]);
						
    }
}
