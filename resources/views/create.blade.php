@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Result</h1>

    <form method="POST" action="{{ url('/results') }}">
        @csrf

        <div class="mb-3">
            <label for="student_id" class="form-label">Student</label>
            <select name="student_id" class="form-select" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="score" class="form-label">Score</label>
            <input type="number" name="score" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-success">Save Result</button>
    </form>
</div>
@endsection
