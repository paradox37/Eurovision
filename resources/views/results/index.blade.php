@extends('layout')
@section('content')
    <h3 class="mb-5">Voting results:</h3>
    @if(@count($results))
        <table class="table table-striped">
            <thead>
            <tr>
                <th>County</th>
                <th>Points</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
                <tr>
                    <td>{{ $result->title }}</td>
                    <td>{{ $result->sum }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Currently there are not votes, please check later.</p>
    @endif
    <div>
        <a class="btn btn-dark btn-lg" href="/">Home page</a>
    </div>
@endsection