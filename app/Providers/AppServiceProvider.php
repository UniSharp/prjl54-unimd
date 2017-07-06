<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\Console\Output\ConsoleOutput;
use App\Swoole\WebSocket;
use Swoole\WebSocket\Server;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('websocket', function ($app) {
            return new Server(config('swoole.websocket.server'), config('swoole.websocket.port'));
        });
        $this->app->singleton('output', function ($app) {
            return $app->make(ConsoleOutput::class);
        });
    }
}
