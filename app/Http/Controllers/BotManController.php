<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BotManController extends Controller
{
    public function handle(Request $request)
    {
        $botman = app('botman');

        $botman->hears('.*', function ($bot) use ($request) {
            $message = $bot->getMessage()->getText();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a friendly Job Portal Assistant.'],
                    ['role' => 'user', 'content' => $message],
                ],
            ]);

            $reply = $response['choices'][0]['message']['content'] ?? "Sorry, I didn't understand that.";

            $bot->reply($reply);
        });

        $botman->listen();
    }
}
