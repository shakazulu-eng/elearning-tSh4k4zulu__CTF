```html
<!DOCTYPE html>
<html>
<head>
    <title>Upload Material</title>
</head>
<body>

@if(session('success'))
    <div style="color:green;">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ url('/admin/materials/store') }}" enctype="multipart/form-data">
    @csrf

    <label>Title</label>
    <br>
    <input type="text" name="title" required>
    <br><br>

    <label>File</label>
    <br>
<input type="file"
       name="file"
       accept=".pdf,.doc,.docx,.ppt,.pptx,.mp4,.mov,.avi,.mkv"
       required>
    <br><br>

    <button type="submit">
        Upload Material
    </button>
</form>

</body>
</html>
```
