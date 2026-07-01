<!DOCTYPE html>
<html>
<head>
    <title>Manage Materials</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Uploaded Materials</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>File</th>
            <th>Action</th>
        </tr>

        @foreach($materials as $material)

        <tr>

            <td>{{ $material->id }}</td>

            <td>{{ $material->title }}</td>

            <td>{{ $material->file }}</td>

            <td>

                <form action="/admin/materials/{{ $material->id }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">
                        Delete
                    </button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

</div>

</body>
</html>
