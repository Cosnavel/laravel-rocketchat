<?php

namespace Cosnavel\RocketChat;

use Illuminate\Support\ServiceProvider;

class RocketChatServiceProvider extends ServiceProvider
{
    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/rocketchat.php' => config_path('rocketchat.php'),
            ], 'rocketchat-config');
        }
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/rocketchat.php', 'rocketchat');

        $this->app->singleton('RocketChat', function () {
            return new RocketChat();
        });
    }
}
