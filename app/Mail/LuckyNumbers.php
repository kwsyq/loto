<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class LuckyNumbers extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $numbers;

    /**
     * Create a new message instance.
     */
    public function __construct($numbers, $userName)
    {
        $this->userName=$userName;
        $this->numbers=$numbers;
    }

    /**
     * Get the message content definition.
     */

    public function build()
    {
        $a=$this->userName;
        $b=$this->numbers;
        return $this->view('mail.luckymail');
    }
}
