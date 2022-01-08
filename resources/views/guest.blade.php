@extends('templates.master')

@section('title', 'Home')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/home.css') }}">
@endsection

@section('content')
    <p id="guest-text">
        Please <a href="/login">log in</a> or <a href="/register">register</a> to continue.
    </p>
@endsection
