<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | TSH4K4ZULU</title>

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

        input{
            color:black;
        }
    </style>

</head>

<body class="flex items-center justify-center">

<div class="glass w-full max-w-lg rounded-3xl p-8 shadow-2xl">

<div class="text-center mb-8">

<h1 class="logo">
TSH4K4ZULU
</h1>

<p class="text-gray-300">
Password Recovery
</p>

</div>

<p class="text-gray-200 text-center mb-6">
Enter your email address below and we will send you a password reset link.
</p>

@if(session('status'))

<div class="bg-green-600 text-white p-3 rounded-lg mb-6">

{{ session('status') }}

</div>

@endif

<form method="POST" action="{{ route('password.email') }}">

@csrf

<div class="mb-6">

<label class="text-white">

Email Address

</label>

<input
type="email"
name="email"
value="{{ old('email') }}"
required
autofocus
class="w-full rounded-lg p-3 mt-2">

@error('email')

<p class="text-red-400 mt-2">

{{ $message }}

</p>

@enderror

</div>

<button
class="w-full bg-cyan-500 hover:bg-cyan-400 py-3 rounded-lg font-bold">

SEND RESET LINK

</button>

</form>

<div class="text-center mt-6">

<a
href="{{ route('login') }}"
class="text-cyan-300 hover:text-white">

⬅ Back to Login

</a>

</div>

<div class="text-center mt-3">

<a
href="{{ url('/') }}"
class="text-gray-300 hover:text-white">

🏠 Home

</a>

</div>

</div>

</body>
</html>
