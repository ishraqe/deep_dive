@extends('layouts.main')
@section('title')
    Tag Result
@endsection
@section('content')
    <h3>Your search for "{{Request::input('query')}}"</h3><br >
    @if(!$tag->count())
        <p>No results found,sorry</p>
    @else
        @foreach($tag as $tags)
            <h1>
                <a href="{{action('tagController@description',[$tags->id])}}">{{ucfirst($tags->tag_name)}}</a>
            </h1>
            <br>



        @endforeach
    @endif

@endsection