<?php

namespace TestDeveloper\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSecretFriend extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;
    /**
     * @var
     */
    public $secret;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($participant, $secret)
    {
        $this->participant = $participant;
        $this->secret = $secret;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('leivitoncs@gmail.com','Amigo Secreto ADM')
            ->subject('Sorteio amigo secreto')->markdown('mail.sendsecretfriend');
    }
}
