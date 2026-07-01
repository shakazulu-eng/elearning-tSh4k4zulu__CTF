<x-app-layout>

<h2>CTF Scoreboard</h2>

<table>

<tr>
    <th>Rank</th>
    <th>Name</th>
    <th>Points</th>
</tr>

@foreach($leaders as $index => $leader)

<tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $leader->user->name }}</td>
    <td>{{ $leader->total_points }}</td>
</tr>

@endforeach

</table>

</x-app-layout>
