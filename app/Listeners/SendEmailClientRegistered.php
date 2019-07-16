<?php

namespace App\Listeners;

use Mail;
use App\Events\ClientRegistered;
use App\Mail\ClientRegistered as ClientReg;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailClientRegistered
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ClientRegistered  $event
     * @return void
     */
    public function handle(ClientRegistered $event)
    {
        $client = $event->client;

        Mail::to($client->email)->send(new ClientReg($client));
        //dd($event->client);
    }
}
