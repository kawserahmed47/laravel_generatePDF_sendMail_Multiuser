<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class USBmail extends Mailable
{
    use Queueable, SerializesModels;

    public $details, $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$subject)
    {
        $this->details= $details;
        $this->subject= $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->subject($this->subject)
                     ->view('mails.usbMail');
    }
}
