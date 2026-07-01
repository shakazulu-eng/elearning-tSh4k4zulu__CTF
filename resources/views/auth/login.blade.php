<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | TSH4K4ZULU</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body{
            background:linear-gradient(135deg,#0f172a,#020617,#0f766e);
            min-height:100vh;
        }

        .glass{
            background:rgba(255,255,255,.08);
            backdrop-filter:blur(15px);
            border:1px solid rgba(255,255,255,.15);
        }

        .logo{
            font-size:45px;
            font-weight:bold;
            color:#22d3ee;
            text-shadow:0 0 20px cyan;
            letter-spacing:3px;
        }
    </style>

</head>

<body class="flex items-center justify-center">

<div class="glass w-full max-w-md rounded-3xl p-8 shadow-2xl">

<div class="text-center">

<h1 class="logo">
TSH4K4ZULU
</h1>

<p class="text-gray-300 mt-2">
AI Powered E-Learning Platform
</p>

</div>

@if(session('status'))
<div class="bg-green-600 text-white p-3 rounded-lg mt-6">
{{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('login') }}" class="mt-6">

@csrf

<div class="mb-5">

<label class="text-white">
Email
</label>

<input
type="email"
name="email"
value="{{ old('email') }}"
required
class="w-full mt-2 rounded-lg p-3 text-black">

@error('email')
<p class="text-red-400 mt-2">{{ $message }}</p>
@enderror

</div>

<div class="mb-5">

<label class="text-white">
Password
</label>

<input
type="password"
name="password"
required
class="w-full mt-2 rounded-lg p-3 text-black">

@error('password')
<p class="text-red-400 mt-2">{{ $message }}</p>
@enderror

</div>

<div class="flex justify-between items-center text-white mb-6">

<label>

<input type="checkbox" name="remember">

Remember Me

</label>

@if(Route::has('password.request'))

<a href="{{ route('password.request') }}"
class="text-cyan-300 hover:text-cyan-200">

Forgot Password?

</a>

@endif

</div>

<button
class="w-full bg-cyan-500 hover:bg-cyan-400 py-3 rounded-lg font-bold text-lg">

LOGIN

</button>

</form>

<div class="text-center mt-6">

<a
href="{{ url('/') }}"
class="text-cyan-300 hover:text-white">

⬅ Back Home

</a>

</div>

@if(Route::has('register'))

<div class="text-center mt-3 text-white">

Don't have an account?

<a
href="{{ route('register') }}"
class="text-cyan-300">

Register

</a>

</div>

@endif

</div>

</body>
</html>
