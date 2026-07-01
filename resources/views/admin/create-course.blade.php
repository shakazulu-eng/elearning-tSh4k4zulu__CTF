<!DOCTYPE html>
<html>
<head>
    <title>Upload Course</title>
</head>
<body>
    <h2>Upload Video / Document</h2>

    <form method="POST" action="/admin/courses/store" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title" placeholder="Title"><br><br>

        <select name="type">
            <option value="video">Video</option>
            <option value="document">Document</option>
        </select><br><br>

        <input type="file" name="file"><br><br>

        <button type="submit">Upload</button>
    </form>
</body>
</html>
