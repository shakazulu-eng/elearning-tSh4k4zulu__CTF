@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Results</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Score</th>
                <th>Posted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td>{{ $result->subject }}</td>
                <td>{{ $result->score }}</td>
                <td>{{ $result->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
