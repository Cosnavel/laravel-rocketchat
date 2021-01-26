<?php

namespace Cosnavel\RocketChat;

use Illuminate\Support\ServiceProvider;

class RocketChatServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/rocketchat.php' => config_path('rocketchat.php'),
            ], 'rocketchat-config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/rocketchat.php', 'rocketchat');

        $this->app->singleton('RocketChat', function () {
            return new RocketChat(
                $this->app['config']->get('rocketchat.ROCKET_CHAT_API_BASE_URL'),
                $this->app['config']->get('rocketchat.ROCKET_CHAT_AUTH_TOKEN'),
                $this->app['config']->get('rocketchat.ROCKET_CHAT_USER_ID'),
            );
        });
    }
}
