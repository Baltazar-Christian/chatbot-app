<?php

namespace App\Providers;

use BotMan\BotMan\BotMan;
use Illuminate\Support\ServiceProvider;
use BotMan\BotMan\Drivers\DriverManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //    DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

        $botman = app('botman');

        $botman->hears('hello', function (BotMan $bot) {
            $bot->reply('Hello there!');
        });
    }
}
