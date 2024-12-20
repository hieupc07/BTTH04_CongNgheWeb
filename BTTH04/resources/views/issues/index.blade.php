
<div class="container">
    <h1>Issue List</h1>
    <a href="{{ route('issues.index') }}" class="btn btn-primary">Add New Issue</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Computer Name</th>
                <th>Model</th>
                <th>Reported By</th>
                <th>Reported Date</th>
                <th>Urgency</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($issues as $issue)
            <tr>
                <td>{{ $issue->id }}</td>
                <td>{{ $issue->computer->computer_name }}</td>
                <td>{{ $issue->computer->model }}</td>
                <td>{{ $issue->reported_by }}</td>
                <td>{{ $issue->reported_date }}</td>
                <td>{{ $issue->urgency }}</td>
                <td>{{ $issue->status }}</td>
                <td>
                    <a href="{{ route('issues.show', $issue->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('issues.edit', $issue) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('issues.destroy', $issue) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $issues->links() }}
</div>


