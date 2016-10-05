@extends('layouts.main')
@section('title')
    Result
@endsection
@section('content')
    <h3>Your search for "{{Request::input('query')}}"</h3><br >
    @if(!$question->count())
        <p>No results found,sorry</p>
     @else
    @foreach($question as $questions)
        <h1>
            <a href="{{action('questionController@show',[$questions->id])}}">{{$questions->title}}</a>
        </h1>
        <br>
        <p> Created at: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($questions->created_at))->diffForHumans()}}</p>
        <p>by <a href="{{action('userController@getUser',[$questions->user['id']])}}"> {{ $questions->user['username']}}</a>  | Tag:<a href="{{action('tagController@description',[$questions->tag_id])}}"> {{$questions->tag['tag_name']}}</a> </p>
        <hr>

    @endforeach
    @endif

@endsection