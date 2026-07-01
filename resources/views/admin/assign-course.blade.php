<!DOCTYPE html>
<html>
<head>
    <title>Assign Course</title>
</head>
<body>

<h2>Assign Course to {{ $user->name }}</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST">
    @csrf

    <select name="course_id">
        <option value="">Select Course</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}"
                {{ $user->course_id == $course->id ? 'selected' : '' }}>
                {{ $course->name }}
            </option>
        @endforeach
    </select>


<br><br>

<label>User Role</label>

<select name="role">

    <option value="student"
        {{ $user->role == 'student' ? 'selected' : '' }}>
        Student
    </option>

    <option value="lecturer"
        {{ $user->role == 'lecturer' ? 'selected' : '' }}>
        Lecturer
    </option>

</select>



    <button type="submit">Assign</button>
</form>

</body>
</html>
