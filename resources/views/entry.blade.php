@extends('templates.master')

@section('title', 'Entry')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/entry.css') }}">
@endsection

@section('content')
    <div id="icons">
        <a href="/" class="icon">
            <span class="material-icons-sharp">
                arrow_back
            </span>
        </a>

        <form action="/entry/{{ $entry->id }}" enctype="multipart/form-data" method="POST">
            @method('DELETE')
            @csrf
    
            <button type="submit" class="icon" id="delete">
                <span class="material-icons-sharp">
                    delete
                </span>
            </button>
        </form>
    </div>

    <div id="entry-container">
        <img src="{{ Storage::url($entry->image) }}" alt="{{ $entry->title }}">
        
        <div id="caption">
            <h2 id="title">
                {{ $entry->title }}
            </h2>
    
            <p id="date">
                {{ $entry->created_at }}
            </p>
        </div>

        <div id="body">
            {{ $entry->body }}
        </div>
    </div>

@endsection
