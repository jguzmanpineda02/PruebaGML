<?php

namespace App\Listeners;

use App\Events\NuevoUsuarioEvent;
use App\Notifications\BienvenidaNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class BienvenidoListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(NuevoUsuarioEvent $event)
    {
        Notification::send($event->usuario, new BienvenidaNotification($event->usuario));
    }
}
