<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AddExpireAlertNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     private $data;
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
         return $this->view('emails.add-expire-alert-mail')->subject('Ads Expiring Alert')->with('data', $this->data);
     }
}
