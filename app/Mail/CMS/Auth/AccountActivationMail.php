<?php

namespace App\Mail\CMS\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountActivationMail extends Mailable
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
        $mailTitle = 'Account Activation';
        $mailSubject = $mailTitle . ' | ' . env('APP_NAME');
        $mailFrom = env('MAIL_FROM_ADDRESS');
        $mailTo = $this->data['email'];
        $mailMarkdown = 'mail.account-activation';
        $mailData = [
            'title' => $mailTitle,
            'url' => route('cms.auth.register.activate', ['email' => $mailTo]),
        ];

        return $this
            ->subject($mailSubject)
            ->from($mailFrom)
            ->to($mailTo)
            ->markdown($mailMarkdown)
            ->with($mailData);
    }
}
