@extends('layouts.app')

@section('content')
    <div class="container">
        @if($eligible)
            <p>{{ $message }}</p>
        @else
            <p>{{ $message }}</p>
        @endif
    </div>
@endsection
