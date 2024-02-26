@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Subject Screening Form</h1>
        <form method="POST" action="{{ url('subjects') }}">
            @csrf

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name') }}">
                @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
                @error('date_of_birth')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="migraine_frequency">Migraine Frequency</label>
                <select id="migraine_frequency" name="migraine_frequency" class="form-control">
                    <option value="Monthly" @if(old('migraine_frequency')=="Monthly") selected @endif>Monthly</option>
                    <option value="Weekly" @if(old('migraine_frequency')=="Weekly") selected @endif>Weekly</option>
                    <option value="Daily" @if(old('migraine_frequency')=="Daily") selected @endif>Daily</option>
                </select>
                @error('migraine_frequency')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" id="daily_migraine_frequency_field" @if(old('migraine_frequency')!="Daily") style="display: none;" @endif>
                <label for="daily_migraine_frequency">Daily Migraine Frequency</label>
                <select id="daily_migraine_frequency" name="daily_migraine_frequency" class="form-control">
                    <option value="" @if(old('daily_migraine_frequency')=="") selected @endif>Select any one</option>
                    <option value="1-2" @if(old('daily_migraine_frequency')=="1-2") selected @endif>1-2</option>
                    <option value="3-4" @if(old('daily_migraine_frequency')=="3-4") selected @endif>3-4</option>
                    <option value="5+" @if(old('daily_migraine_frequency')=="5+") selected @endif>5+</option>
                </select>
                @error('daily_migraine_frequency')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@push('body-scripts')
    <script>
        $(document).ready(function() {
            $('#migraine_frequency').on('change', function() {
                var $dailyMigraineField = $('#daily_migraine_frequency_field');
                if ($(this).val() === 'Daily') {
                    $dailyMigraineField.show();
                } else {
                    $dailyMigraineField.hide();
                }
            });
        });
    </script>
@endpush
