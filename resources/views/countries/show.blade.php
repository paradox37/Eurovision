@extends('layout')
@section('content')
    <countries-component :country_id="{{ $country->id }}"></countries-component>
@endsection