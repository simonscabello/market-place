<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegisteredEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Conta no MarketPlace criada com sucesso.')
            ->replyTo('simoncabello@gmail.com')
            ->view('emails.user-registered')->with(['user' => $this->user]);
    }
}
