<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GroqService
{
    public function chat($message, $course)
    {
        $apiKey = config('services.groq.key');

        $prompt = "You are an AI tutor for course: {$course}.
Only answer within this course context. Question: {$message}";

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$apiKey}",
            'Content-Type' => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model' => 'llama3-70b-8192',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => $prompt
                ],
                [
                    'role' => 'user',
                    'content' => $message
                ]
            ],
            'temperature' => 0.7
        ]);

        return $response->json()['choices'][0]['message']['content']
            ?? 'No response from AI';
    }
}
