<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotManController extends Controller
{

public function handle()
{
    $botman = app('botman');

    $botman->hears('start', function (BotMan $bot) {
        $bot->startConversation(new ExampleConversation());
    });

    $botman->listen();
}

}
