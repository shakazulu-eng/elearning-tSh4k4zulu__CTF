<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Challenge;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SubmissionController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'challenge_id' => 'required',
            'flag' => 'required'
        ]);

        $challenge = Challenge::findOrFail(
            $request->challenge_id
        );

        $correct = Hash::check(
            trim($request->flag),
            $challenge->flag
        );

        Submission::create([
            'user_id' => Auth::id(),
            'challenge_id' => $challenge->id,
            'submitted_flag' => $request->flag,
            'is_correct' => $correct,
            'earned_points' => $correct
                ? $challenge->points
                : 0
        ]);

        if ($correct) {

    $board = Scoreboard::firstOrCreate(
        ['user_id' => Auth::id()],
        ['total_points' => 0]
    );

    $board->increment(
        'total_points',
        $challenge->points
    );

    return back()->with(
        'success',
        'Correct Flag 🎉'
    );
}

        return back()->with(
            'error',
            'Incorrect Flag'
        );
    }
}
