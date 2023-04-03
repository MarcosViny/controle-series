<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\SeriesCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\SeriesCreated as SeriesCreatedEvent;


class EmailUsersAboutSeriesCreated implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(SeriesCreatedEvent $event)
    {
        $userList = User::all();
        foreach ($userList as $index => $user) {

            $email = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->seriesSeasonsQty,
                $event->seriesEpisodePerSeason,
            );

            // Delay adicionado pois a versão gratuita do maitrap só permite envio de 05 e-mails a cada 10 segundos
            $when = now()->addSeconds($index * 5);
            Mail::to($user)->later($when, $email);
        }
    }
}
