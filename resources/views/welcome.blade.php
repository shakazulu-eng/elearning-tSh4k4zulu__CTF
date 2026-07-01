<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSH4K4ZULU E-Learning</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body{
            background:linear-gradient(135deg,#0f172a,#020617,#0f766e);
            min-height:100vh;
        }

        .glass{
            background:rgba(255,255,255,.08);
            backdrop-filter:blur(12px);
            border:1px solid rgba(255,255,255,.15);
        }

        .glow{
            box-shadow:0 0 25px cyan;
        }

        .logo{
            font-size:55px;
            font-weight:900;
            letter-spacing:4px;
            color:#22d3ee;
            text-shadow:0 0 20px cyan;
        }

        .typing{
            overflow:hidden;
            white-space:nowrap;
            border-right:3px solid cyan;
            animation:typing 4s steps(35,end),blink .7s infinite;
        }

        @keyframes typing{
            from{width:0}
            to{width:100%}
        }

        @keyframes blink{
            50%{border-color:transparent;}
        }

    </style>

</head>

<body class="text-white">

<div class="container mx-auto px-6 py-8">

<nav class="flex justify-between items-center">

<div class="logo">
TSH4K4ZULU
</div>

<div>

<a href="{{ route('login') }}"
class="bg-cyan-500 hover:bg-cyan-400 px-5 py-2 rounded-lg mr-3">

Login

</a>

<a href="{{ route('register') }}"
class="bg-white text-black px-5 py-2 rounded-lg">

Register

</a>

</div>

</nav>


<div class="mt-24 text-center">

<h1 class="text-6xl font-bold mb-5">

E-Learning Platform with AI Assistant

</h1>

<p class="typing text-xl w-fit mx-auto">

Learn • Practice • Secure • Grow

</p>

</div>


<div class="grid md:grid-cols-2 gap-8 mt-20">

<div class="glass rounded-3xl p-8">

<h2 class="text-3xl font-bold text-cyan-300">

About Platform

</h2>

<ul class="mt-8 space-y-4 text-lg">

<li>✅ AI Assistant</li>

<li>✅ Cyber Security Courses</li>

<li>✅ PDF Notes</li>

<li>✅ Video Lessons</li>

<li>✅ Course Management</li>

<li>✅ Secure Authentication</li>

<li>✅ Student Dashboard</li>

<li>✅ Admin Dashboard</li>

</ul>

</div>


<div class="glass rounded-3xl p-8 glow">

<h2 class="text-3xl font-bold text-cyan-300 mb-5">

🤖 Ask AI

</h2>

<div id="chat"
class="bg-slate-900 rounded-lg p-4 h-80 overflow-y-auto mb-4">

<div class="text-green-400">

Karibu 😊<br>

Naweza kukusaidia kuhusu:

<ul class="mt-3 ml-6 list-disc">

<li>Kozi</li>

<li>Malipo</li>

<li>Registration</li>

<li>Login</li>

<li>System Help</li>

</ul>

</div>

</div>

<input

id="question"

type="text"

placeholder="Uliza swali..."

class="w-full rounded-lg p-3 text-black">

<button

onclick="askAI()"

class="mt-4 w-full bg-cyan-500 hover:bg-cyan-400 rounded-lg py-3">

Send

</button>

</div>

</div>

<footer class="text-center mt-20 text-gray-300">

© 2026 TSH4K4ZULU E-Learning Platform

</footer>

</div>

<script>

function askAI(){

let q=document.getElementById('question').value.toLowerCase();

let answer="Samahani, naomba uliza swali lingine.";

if(q.includes("kulipia") || q.includes("payment") || q.includes("lipa")){

answer=`
<div class="text-cyan-300">

💳 PAYMENT DETAILS

<br><br>

📱 Halotel

<br>

0613885633

<br>

SALUMU M. MLANZI

<br><br>

📱 M-Pesa

<br>

Business Number:

35884969

<br>

MWAJUMA MUHIDINI MLANZI

</div>
`;

}

else if(q.includes("register")){

answer="Bonyeza Register hapo juu kutengeneza account.";

}

else if(q.includes("login")){

answer="Bonyeza Login hapo juu kuingia kwenye mfumo.";

}

else if(q.includes("course") || q.includes("kozi")){

answer="Kozi zinapatikana baada ya account yako kuidhinishwa na Admin.";

}

else if(q.includes("hello") || q.includes("habari") || q.includes("mambo")){

answer="Karibu sana kwenye TSH4K4ZULU AI 😊";

}

document.getElementById("chat").innerHTML+=`

<div class="mt-4">

<div class="text-yellow-300">

<b>You:</b> ${q}

</div>

<div class="text-green-400 mt-2">

<b>AI:</b>

${answer}

</div>

<hr class="my-4">

</div>

`;

document.getElementById("question").value="";

document.getElementById("chat").scrollTop=document.getElementById("chat").scrollHeight;

}

</script>

</body>

</html>
