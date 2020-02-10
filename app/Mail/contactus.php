<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactus extends Mailable
{
    use Queueable, SerializesModels;
 public $name;
 public $Email;
 public $subject;
 public $body;
 /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$Email,$subject,$body)
    {
        $this->name=$name;
        $this->Email=$Email;
        $this->subject=$subject;
        $this->body=$body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Email.contactus')->from("asew80@yahoo.com");
    }
}
