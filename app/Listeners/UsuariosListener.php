<?php

namespace App\Listeners;

use App\Events\NuevoUsuarioEvent;
use App\Notifications\NumeroUsuariosNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class UsuariosListener
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
        $usuario = auth()->user();
        Notification::send($usuario, new NumeroUsuariosNotification($event->usuariosPorPais));
    }
}
