<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;


class UserCourseController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $courses = Course::all();

        return view('admin.assign-course', compact('user', 'courses'));
    }


public function update(Request $request, $id)
{
    $request->validate([
        'course_id' => 'required|exists:courses,id',
        'role' => 'required|string'
    ]);

    $user = User::findOrFail($id);

    $user->course_id = $request->course_id;

    $user->role = $request->role;

    $user->save();

    return back()->with('success', 'User updated successfully');
}




/*    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $user = User::findOrFail($id);
        $user->course_id = $request->course_id;
        $user->save();

        return back()->with('success', 'Course assigned successfully');
    }*/
public function index()
{
    $users = \App\Models\User::with('course')->get();
    return view('admin.users', compact('users'));
}

}
