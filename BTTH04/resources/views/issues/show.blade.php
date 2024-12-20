@extends('layouts.app')

@section('content')
    <h1>Report Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Report ID: {{ $issue->id }}</h5>
            <p class="card-text"><strong>Computer Name:</strong> {{ $issue->computer->computer_name }}</p>
            <p class="card-text"><strong>Model:</strong> {{ $issue->computer->model }}</p>
            <p class="card-text"><strong>Reported By:</strong> {{ $issue->reported_by }}</p>
            <p class="card-text"><strong>Report Date:</strong> {{ $issue->reported_date }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $issue->description }}</p>
            <p class="card-text"><strong>Urgency:</strong> {{ $issue->urgency }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $issue->status }}</p>
            <a href="{{ route('issues.index') }}" class="btn btn-primary"> Back </a>
        </div>
    </div>
@endsection