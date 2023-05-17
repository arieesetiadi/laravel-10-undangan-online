<?php

namespace App\Listeners;

use App\Events\AdministratorRegistered;
use App\Mail\CMS\Auth\AccountActivationMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendAcountActivationMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AdministratorRegistered  $event
     * @return void
     */
    public function handle(AdministratorRegistered $event)
    {
        // Queue | Send account-activation email
        $credentials = $event->credentials;
        Mail::queue(new AccountActivationMail($credentials));
    }
}
