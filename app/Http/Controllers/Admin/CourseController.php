<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function create()
    {
        return view('admin.create-course');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'file' => 'required|file'
        ]);

        $path = $request->file('file')->store('courses', 'public');

        Course::create([
             'name' => $request->title, // 🔥 FIX HAPA
            //'title' => $request->title,
            'type' => $request->type,
            'file' => $path,
        ]);

        return redirect()->back()->with('success', 'Uploaded Successfully');
    }
}
