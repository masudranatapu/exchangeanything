<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendmailtoAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     private $data;
     public function __construct()
     {
     }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
         return $this->view('frontend.mail.sendmailtoadmin')->subject('New message received’');
     }
}