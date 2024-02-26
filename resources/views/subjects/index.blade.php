@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Subject Screening Data</h1>
            </div>
            <div class="col-md-6">
                <a class="btn btn-success" href="{{url("subjects/create")}}" style="float: right;">+New Subject</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Date of Birth</th>
                <th>Migraine Frequency</th>
                <th>Daily Migraine Frequency</th>
                <th>Cohort</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->first_name }}</td>
                    <td>{{ $subject->date_of_birth }}</td>
                    <td>{{ $subject->migraine_frequency }}</td>
                    <td>{{ $subject->daily_migraine_frequency ?? '-' }}</td>
                    <td>{{ $subject->cohort ?? '-' }}</td>
                    <td>{{ $subject->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

