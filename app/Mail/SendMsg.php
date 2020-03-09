<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
//use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMsg extends Mailable
{
    use Queueable, SerializesModels;

    public $body;
    private $email;

    /**
     * Create a new message instance.
     *
     * @param array $email
     * @return void
     */
    public function __construct(array $email)
    {
        $this->body = $email['phone'] . "\n" . $email['message'];
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        return $this->from($this->email['email'])
            ->subject($this->email['name'])
            ->view('email');
    }
}
