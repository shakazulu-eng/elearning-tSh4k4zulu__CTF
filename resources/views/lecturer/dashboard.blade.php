<!DOCTYPE html>
<html>
<head>
    <title>Lecturer Dashboard</title>

    <style>
        body{
            font-family: Arial;
            background:#f5f5f5;
            padding:40px;
        }

        .card{
            background:white;
            padding:30px;
            border-radius:10px;
            max-width:700px;
            margin:auto;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        .btn{
            display:inline-block;
            padding:12px 20px;
            background:#2563eb;
            color:white;
            text-decoration:none;
            border-radius:6px;
            margin-top:15px;
        }

        .logout-btn{
            background:red;
            border:none;
            color:white;
            padding:12px 20px;
            border-radius:6px;
            cursor:pointer;
            margin-top:15px;
        }
    </style>

</head>
<body>

<div class="card">

    <h1>Lecturer Dashboard 🎓</h1>

    <hr><br>

    <h3>
        Welcome:
        {{ Auth::user()->name }}
    </h3>

    <h3>
        Assigned Course:
        {{ Auth::user()->course->name ?? 'No Course Assigned' }}
    </h3>

    <br>

    <a href="/ai-chat" class="btn">
        Open AI Assistant
    </a>

    <br><br>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit" class="logout-btn">
            Logout
        </button>
    </form>

</div>

</body>
</html>
