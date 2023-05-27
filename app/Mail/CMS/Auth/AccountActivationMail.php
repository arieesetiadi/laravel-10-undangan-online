<?php

namespace App\Mail\CMS\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountActivationMail extends Mailable
{
    use Queueable;
    use SerializesModels;

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
        $mailSubject = $mailTitle.' | '.config('app.name');
        $mailFrom = config('mail.from.address');
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
