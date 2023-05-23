<?php

namespace App\Mail\WEB\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
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
        // Mail data
        $mailTitle = 'Request for Password Reset';
        $mailSubject = $mailTitle.' | '.config('app.name');
        $mailFrom = config('mail.from.address');
        $mailTo = $this->data['email'];
        $mailMarkdown = 'mail.forgot-password';
        $mailData = [
            'title' => $mailTitle,
            'url' => route('web.auth.forgot-password.index', ['email' => $mailTo]),
        ];

        return $this
            ->subject($mailSubject)
            ->from($mailFrom)
            ->to($mailTo)
            ->markdown($mailMarkdown)
            ->with($mailData);
    }
}
