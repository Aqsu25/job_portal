<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('hello', function (BotMan $bot) {
            $bot->reply('Hello! I am your friendly chatbot 🤖');
        });

        $botman->hears('how are you', function (BotMan $bot) {
            $bot->reply('I am doing great! How about you? 😊');
        });

        $botman->fallback(function (BotMan $bot) {
            $bot->reply("Sorry, I didn't understand that. Please try again.");
        });

        $botman->listen();
    }
}
