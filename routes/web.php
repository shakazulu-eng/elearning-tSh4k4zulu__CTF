<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\UserCourseController;
use App\Http\Controllers\Admin\CourseMaterialController;

use App\Http\Controllers\AIController;
use App\Http\Controllers\ResultController;

use App\Models\Course;


//CTF CHALLENGES ROUTERS 
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ChallengeController;
use App\Http\Controllers\Student\CTFController;
use App\Http\Controllers\Student\SubmissionController;
use App\Http\Controllers\PublicAIController;


use App\Models\User;
use Illuminate\Support\Facades\Hash;



/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| MAIN DASHBOARD REDIRECT
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if (Auth::user()->role == 'admin') {
        return redirect('/admin/dashboard');
    }

    if (Auth::user()->role == 'lecturer') {
        return redirect('/lecturer/dashboard');
    }

    return redirect('/student/dashboard');

})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| STUDENT DASHBOARD
|--------------------------------------------------------------------------
*/






use App\Models\CourseMaterial;

Route::get('/student/dashboard', function () {

    $materials = CourseMaterial::all();

    return view('student.dashboard', compact('materials'));

})->middleware('auth')->name('student.dashboard');






/*Route::get('/student/dashboard', function () {

    $courses = Course::all();

    return view('student.dashboard', compact('courses'));

})->middleware('auth')->name('student.dashboard');*/

/*
|--------------------------------------------------------------------------
| LECTURER DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/lecturer/dashboard', function () {

    return view('lecturer.dashboard');

})->middleware('auth')->name('lecturer.dashboard');

/*
|--------------------------------------------------------------------------
| RESULTS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/results', [ResultController::class, 'index']);

    Route::get('/results/create', [ResultController::class, 'create']);

    Route::post('/results', [ResultController::class, 'store']);

});

Route::middleware(['auth', 'role:student'])->group(function () {

    Route::get('/my-results', [ResultController::class, 'studentResults']);

});

/*
|--------------------------------------------------------------------------
| COURSES
|--------------------------------------------------------------------------
*/

Route::post('/admin/courses/store', [CourseController::class, 'store']);

Route::get('/admin/courses/create', [CourseController::class, 'create']);

/*
|--------------------------------------------------------------------------
| USER COURSE ASSIGNMENT
|--------------------------------------------------------------------------
*/

Route::get('/admin/users', [UserCourseController::class, 'index']);

Route::get('/admin/users/{id}/assign-course', [UserCourseController::class, 'edit']);

Route::post('/admin/users/{id}/assign-course', [UserCourseController::class, 'update']);

/*
|--------------------------------------------------------------------------
| AI CHAT
|--------------------------------------------------------------------------
*/

Route::post('/ai-chat', [AIController::class, 'chat']);

Route::get('/ai-chat', function () {

    return view('student.ai-chat');

})->middleware('auth');

/*
|--------------------------------------------------------------------------
| COURSE MATERIALS
|--------------------------------------------------------------------------
*/

Route::get('/admin/materials/create', [CourseMaterialController::class, 'create']);

Route::post('/admin/materials/store', [CourseMaterialController::class, 'store']);

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/


Route::delete('/admin/materials/{id}', [CourseMaterialController::class, 'destroy']);
Route::get('/admin/materials', [CourseMaterialController::class, 'index']);

// CTF CHALLENGES
Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::resource('rooms', RoomController::class);

    Route::resource('challenges', ChallengeController::class);

});


Route::middleware(['auth'])->group(function () {

    Route::get('/ctf', [CTFController::class, 'index'])
        ->name('ctf.index');

    Route::get('/ctf/room/{room}', [CTFController::class, 'room'])
        ->name('ctf.room');

    Route::get('/ctf/challenge/{challenge}', [CTFController::class, 'challenge'])
        ->name('ctf.challenge');

    Route::post('/submit-flag', [SubmissionController::class, 'submit'])
        ->name('flag.submit');

});


Route::middleware(['auth'])
    ->get('/ctf/labs/xss-basic', function () {
        return view('ctf.labs.xss-basic');
    })
    ->name('ctf.lab.xss');



Route::get('/scoreboard', function () {

    $leaders = \App\Models\Scoreboard::with('user')
        ->orderByDesc('total_points')
        ->get();

    return view(
        'ctf.scoreboard',
        compact('leaders')
    );

})->middleware('auth');




Route::post('/admin/users/{id}/approve', function ($id) {

    $user = \App\Models\User::findOrFail($id);

    $user->is_approved = true;

    $user->save();

    return back()->with('success', 'User approved successfully');

})->middleware('auth');



Route::get('/assistant', function () {
    return view('assistant');
});

Route::post('/assistant/chat', [PublicAIController::class,'chat']);

///
Route::get('/create-admin', function () {

    User::updateOrCreate(
        ['email' => 'salummuhidini748@gmail.com'],
        [
            'name' => 'Th4kazulu',
            'password' => Hash::make('Mlanz1.2'),
            'role' => 'admin',
        ]
    );

    return 'Admin created successfully!';
});
require __DIR__.'/auth.php';
