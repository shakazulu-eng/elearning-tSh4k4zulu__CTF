<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | TSH4K4ZULU</title>

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

<body class="flex items-center justify-center py-10">

<div class="glass w-full max-w-lg rounded-3xl p-8 shadow-2xl">

<div class="text-center mb-8">

<h1 class="logo">
TSH4K4ZULU
</h1>

<p class="text-gray-300 mt-2">
Create Your AI Learning Account
</p>

</div>

<form method="POST" action="{{ route('register') }}">

@csrf

<div class="mb-5">

<label class="text-white">
Full Name
</label>

<input
type="text"
name="name"
value="{{ old('name') }}"
required
class="w-full rounded-lg p-3 mt-2">

@error('name')
<p class="text-red-400 mt-2">{{ $message }}</p>
@enderror

</div>


<div class="mb-5">

<label class="text-white">
Email Address
</label>

<input
type="email"
name="email"
value="{{ old('email') }}"
required
class="w-full rounded-lg p-3 mt-2">

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
class="w-full rounded-lg p-3 mt-2">

@error('password')
<p class="text-red-400 mt-2">{{ $message }}</p>
@enderror

</div>


<div class="mb-6">

<label class="text-white">
Confirm Password
</label>

<input
type="password"
name="password_confirmation"
required
class="w-full rounded-lg p-3 mt-2">

@error('password_confirmation')
<p class="text-red-400 mt-2">{{ $message }}</p>
@enderror

</div>


<button
class="w-full bg-cyan-500 hover:bg-cyan-400 py-3 rounded-lg text-lg font-bold">

CREATE ACCOUNT

</button>

</form>

<div class="text-center mt-6">

<a
href="{{ route('login') }}"
class="text-cyan-300 hover:text-white">

Already have an account? Login

</a>

</div>

<div class="text-center mt-3">

<a
href="{{ url('/') }}"
class="text-gray-300 hover:text-white">

⬅ Back Home

</a>

</div>

</div>

</body>
</html>
