@extends('layout')
@section('content')

    <h1>Welcome to Eurovision voting</h1>
    <p>Please click on the button Countries to vote or on the Results to see the current voting results</p>

    <a href="{{ route('countries') }}" type="button" class="btn btn-secondary btn-lg">Countries</a>
    <a href="{{ route('results') }}" type="button" class="btn btn-secondary btn-lg">Results</a>

@endsection