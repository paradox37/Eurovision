@extends('layout')
@section('content')
    @if(@count($countries))
        <h3 class="mb-5">Please click on your country to vote</h3>
        <div class="row">
            @foreach($countries as $country)
                <div class="col-4 col-sm-4 col-md-3 col-lg-2 mb-4">
                    <div class="shadow-sm d-flex flex-grow-1 align-self-center" style="height: 100%">
                        <a class="{{@count($country->voted) ? 'voted' : 'not-voted'}}"
                           href="{{ @count($country->voted) ? '#' : route('country', ['id' => $country->id])  }}">
                            <img class="img-fluid" src="/images/{{$country->code}}.svg" alt="{{$country->title}}">
                            <h5 class="p-2 text-center m-0">{{ $country->title }}</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection