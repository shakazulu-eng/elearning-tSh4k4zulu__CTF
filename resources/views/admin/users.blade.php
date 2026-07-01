```html
<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
</head>
<body>

<h2>All Users</h2>

@if(session('success'))
    <p style="color:green;">
        {{ session('success') }}
    </p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Course</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @foreach($users as $user)
    <tr>

        <td>{{ $user->name }}</td>

        <td>{{ $user->email }}</td>

        <td>{{ $user->role }}</td>

        <td>{{ $user->course->name ?? 'Not Assigned' }}</td>

        <td>
            @if($user->is_approved)
                <span style="color:green;">Approved</span>
            @else
                <span style="color:red;">Pending</span>
            @endif
        </td>

        <td>

            <a href="/admin/users/{{ $user->id }}/assign-course">
                Assign Course
            </a>

            <br><br>

            @if(!$user->is_approved)

            <form method="POST"
                  action="/admin/users/{{ $user->id }}/approve">

                @csrf

                <button type="submit">
                    Approve User
                </button>

            </form>

            @endif

        </td>

    </tr>
    @endforeach

</table>

</body>
</html>
```
