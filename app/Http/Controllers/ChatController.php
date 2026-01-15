<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
  public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful Job Portal Assistant.'],
                ['role' => 'user', 'content' => $request->message],
            ],
        ]);

        return response()->json([
            'reply' => $response['choices'][0]['message']['content'] ?? 'Sorry, try again.'
        ]);
    }
}
