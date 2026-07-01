<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SecurityLog;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with('student')->get();
        return view('results.index', compact('results'));
    }

    public function create()
    {
        $students = User::where('role', 'student')->get();
        return view('results.create', compact('students'));
    }

    public function store(Request $request)
    {
        // ✅ VALIDATION
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'subject' => 'required|string',
            'score' => 'required|numeric',
        ]);

        // 🚨 SECURITY: XSS ATTEMPT DETECTION
        if (preg_match('/<script|javascript:/i', $request->subject)) {
            SecurityLog::create([
                'type' => 'XSS Attempt in Result',
                'ip' => $request->ip(),
                'payload' => $request->subject,
                'user_id' => auth()->id(),
            ]);
        }

        // ✅ SAVE RESULT
        Result::create([
            'student_id' => $request->student_id,
            'subject' => $request->subject,
            'score' => $request->score,
        ]);

        return redirect('/results')->with('success', 'Result added successfully');
    }

    public function studentResults()
    {
        $results = Result::where('student_id', auth()->id())->get();
        return view('results.student', compact('results'));
    }
}

