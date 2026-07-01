<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f5f7fb;
        }

        .course-card{
            border:none;
            border-radius:12px;
            overflow:hidden;
            box-shadow:0 4px 15px rgba(0,0,0,0.08);
            transition:0.3s;
        }

        .course-card:hover{
            transform:translateY(-5px);
        }

        .navbar{
            background:#111827;
        }

        .file-box{
            height:220px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#eef2ff;
            font-size:70px;
        }

        .video-box video{
            width:100%;
            height:220px;
            object-fit:cover;
        }

        .ai-btn{
            position:fixed;
            bottom:20px;
            right:20px;
            padding:15px 25px;
            border:none;
            border-radius:50px;
            background:#4f46e5;
            color:white;
            font-weight:bold;
            box-shadow:0 4px 12px rgba(0,0,0,0.2);
            text-decoration:none;
        }

        .ai-btn:hover{
            background:#4338ca;
            color:white;
        }

    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">

    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="#">
            🎓 Student Dashboard
        </a>

        <div class="d-flex align-items-center gap-3">

            <span class="text-white">
                My Course:
                <b>
                    {{ auth()->user()->course->name ?? 'No course assigned' }}
                </b>
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-danger btn-sm">
                    Logout
                </button>
            </form>

        </div>

    </div>

</nav>

<!-- CONTENT -->
<div class="container mt-5">

    <h2 class="text-center mb-4 fw-bold">
        📚 Learning Materials
    </h2>

    <div class="row">

        @foreach($materials as $material)

        <div class="col-md-4 mb-4">

            <div class="card course-card h-100">

                {{-- VIDEO --}}
                @if(Str::endsWith($material->file, ['.mp4','.mov','.avi']))

                    <div class="video-box">

                        <video controls>
                            <source src="{{ asset('storage/' . $material->file) }}">
                        </video>

                    </div>

                {{-- DOCUMENT --}}
                @else

                    <div class="file-box">
                        📄
                    </div>

                @endif

                <div class="card-body text-center">

                    <h5 class="card-title">
                        {{ $material->title }}
                    </h5>

                    <p class="text-muted small">
                        {{ $material->file }}
                    </p>

                    {{-- DOWNLOAD --}}
                    @if(!Str::endsWith($material->file, ['.mp4','.mov','.avi']))

                        <a href="{{ asset('storage/' . $material->file) }}"
                           class="btn btn-primary mt-2"
                           target="_blank">

                            Download Document

                        </a>

                    @endif

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

<!-- AI BUTTON -->
<a href="{{ url('/ai-chat') }}" class="ai-btn">
    🧠 Open AI Assistant
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

