@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Results (Admin)</h1>

    <a href="{{ url('/results/create') }}" class="btn btn-primary mb-3">Add Result</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student</th>
                <th>Subject</th>
                <th>Score</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td>{{ $result->student->name }}</td>
                <td>{{ $result->subject }}</td>
                <td>{{ $result->score }}</td>
                <td>{{ $result->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
