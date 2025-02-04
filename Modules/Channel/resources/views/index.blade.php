@extends('channel::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('channel.name') !!}</p>
@endsection
