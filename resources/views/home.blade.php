@extends('templates.master')

@section('title', 'Home')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/home.css') }}">
@endsection

@section('content')
    <div id="heading">
        <h2>
            Welcome back, {{ $user->name }}!
        </h2>

        <a href="/new-entry" id="new-entry">
            <span class="material-icons-sharp">
                add_circle
            </span>
            New Entry
        </a>
    </div>

    <div id="entry-list">
        @foreach ($entries as $entry)
            <a href="/entry/{{ $entry->id }}">
                <div class="entry-container">
                    @if ($entry->image)
                        <img src="{{ Storage::url($entry->image) }}" alt="{{ $entry->title }}">
                    @endif

                    <div class="details">
                        <p class="date">{{ $entry->created_at }}</p>

                        <h3 class="title">{{ $entry->title }}</h3>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
