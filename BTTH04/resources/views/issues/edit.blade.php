@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Issue</h1>
    <form action="{{ route('issues.update', $issue) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="computer_id" class="form-label">Computer</label>
            <select class="form-select" id="computer_id" name="computer_id" required>
                @foreach ($computers as $computer)
                    <option value="{{ $computer->id }}" {{ $issue->computer_id == $computer->id ? 'selected' : '' }}>{{ $computer->computer_name }} ({{ $computer->model }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="reported_by" class="form-label">Reported By</label>
            <input type="text" class="form-control" id="reported_by" name="reported_by" value="{{ $issue->reported_by }}">
        </div>
        <div class="mb-3">
            <label for="reported_date" class="form-label">Reported Date</label>
            <input type="datetime-local" class="form-control" id="reported_date" name="reported_date" value="{{ $issue->reported_date->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $issue->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="urgency" class="form-label">Urgency</label>
            <select class="form-select" id="urgency" name="urgency" required>
                <option value="Low" {{ $issue->urgency == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $issue->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $issue->urgency == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
                <option value="In Progress" {{ $issue->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
