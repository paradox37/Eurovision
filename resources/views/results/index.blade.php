@extends('layout')
@section('content')
    <h3 class="mb-5">Voting results:</h3>
    @if(@count($results))
        <div class="table-responsive mb-5">
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
        </div>

        <h3 class="mb-5">Voting matrix:</h3>
        <div class="table-responsive mb-5">
            <table class="table table-striped table-bordered table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    @foreach($countries as $country)
                        <th>{{ $country->title }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($countries as $country)
                    <tr>
                        <th>{{ $country->title }}</th>
                        @foreach($countries as $c)
                            @php
                                $score = $c->countryVote ($c, $country);
                            @endphp
                            <td title="{{ ($c->title != $country->title && $score != '') ? $c->title.' to '. $country->title : ''}}">
                                {{ $score }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>Currently there are not votes, please check later.</p>
    @endif
    <div>
        <a class="btn btn-dark btn-lg" href="/">Home page</a>
    </div>
@endsection