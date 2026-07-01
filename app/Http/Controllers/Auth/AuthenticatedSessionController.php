<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */


public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();

    if (!auth()->user()->is_approved) {

        auth()->logout();

        return back()->withErrors([
            'email' => 'Your account is waiting for admin approval.'
        ]);
    }

    return redirect()->intended(route('dashboard'));
}

//public function store(LoginRequest $request): RedirectResponse
//{
  //  $request->authenticate();

   // $request->session()->regenerate();

   // if (Auth::user()->role == 'admin') {
    //    return redirect('/admin/dashboard');
   // }

   // if (Auth::user()->role == 'lecturer') {
     //   return redirect('/lecturer/dashboard');
   // }

    //return redirect('/student/dashboard');
//}






//hapa ni marekebisho
/*    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

       if (Auth::user()->role === 'admin') {
    return redirect('/admin/dashboard');
}

return redirect('/student/dashboard');

    }*/



    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
