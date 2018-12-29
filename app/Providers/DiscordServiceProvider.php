<?php

namespace App\Providers;

use App;
use \Wohali\OAuth2\Client\Provider\Discord;
use Illuminate\Support\ServiceProvider;

class DiscordServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      App::singleton(Discord::class, function() {
          return new Discord([
            'clientId'     => config('services.discord.clientid'),
            'clientSecret' => config('services.discord.secret'),
            'redirectUri' => config('app.url').'connected',
          ]);
      });
    }
}
