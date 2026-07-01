<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;

class AIController extends Controller
{
    public function chat(Request $request)
    {
        try {
            $request->validate([
                'message' => 'required|string'
            ]);



$user = Auth::user();

$course = $user->course;

if (!$course) {
    return response()->json([
        'reply' => 'No course assigned to this student.'
    ]);
}





            // =========================
            // TOPIC CHECK
            // =========================
           /* $topics = AllowedTopic::pluck('topic')->toArray();

            if (!empty($topics)) {
                $allowed = false;

                foreach ($topics as $topic) {
                    if (stripos($request->message, $topic) !== false) {
                        $allowed = true;
                        break;
                    }
                }

                if (!$allowed) {
                    return response()->json([
                        'reply' => 'Topic not allowed by admin'
                    ]);
                }
            }*/

            // =========================
            // MEMORY
            // =========================
            $history = ChatMessage::where('user_id', Auth::id())
                ->latest()
                ->take(5)
                ->get();

            $messages = [
                [
                    'role' => 'system',
                   'content' => 'You are a university educational AI assistant. 
This student belongs to the course: ' . $course->name . '. 
Only answer questions related to this course. 
If the student asks something unrelated to the course, reply exactly with:
"This question is outside your assigned course."'
                ]
            ];

            foreach ($history->reverse() as $chat) {
                $messages[] = [
                    'role' => 'user',
                    'content' => $chat->message
                ];

                $messages[] = [
                    'role' => 'assistant',
                    'content' => $chat->reply
                ];
            }

            $messages[] = [
                'role' => 'user',
                'content' => $request->message
            ];

            // =========================
            // API REQUEST
            // =========================
            $response = Http::timeout(60)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
                    'Content-Type' => 'application/json',
                ])
                ->post('https://api.groq.com/openai/v1/chat/completions', [
                    'model' => 'llama-3.1-8b-instant',
                    'messages' => $messages
                ]);

            $data = $response->json();

            // =========================
            // FORCE SAFE EXTRACTION
            // =========================
            $reply = $data['choices'][0]['message']['content']
                ?? $data['error']['message']
                ?? 'AI is currently unavailable. Please try again.';

            // =========================
            // SAVE CHAT
            // =========================
            ChatMessage::create([
                'user_id' => Auth::id(),
                'message' => $request->message,
                'reply' => $reply
            ]);

            // =========================
            // RETURN (ALWAYS reply EXISTS)
            // =========================
            return response()->json([
                'reply' => $reply
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'reply' => 'Server error: ' . $e->getMessage()
            ]);
        }
    }
}





//' => 'llama-3.1-8b-instant',
