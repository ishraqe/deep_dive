@extends('layouts.main')
@section('title')
    {{$tag->tag_name}}
@endsection
@section('content')
    <div class="col-md-8">
        <div style="height: 100%">
            <h1>{{ucfirst($tag->tag_name)}}</h1>
            <blockquote>" {{ucfirst($tag->description)}} "</blockquote>
            <h3>Question under this tag</h3>
            @if(!$similarQuestion->count())
                <p>no question yet under this tag!!<p>
            @else
                    @foreach($similarQuestion as $similarQuestions)

                        <div class="pull-left">
                            <a href=" {{action('questionController@show',[$similarQuestions->id])}}"><img style="height: 30px" src="{{URL::asset('asset/images/faq.png')}}" alt=""></a>
                        </div>
                        <div class="media-body">

                            <h4><a href="{{action('questionController@show',[$similarQuestions->id])}} "> {{$similarQuestions->title}}</a></h4>
                            <p>posted on  {{ \Carbon\Carbon::createFromTimeStamp(strtotime($similarQuestions->created_at))->diffForHumans()}}||By:<a href="{{action('userController@getUser',[$similarQuestions->user['id']])}}">{{ucfirst($similarQuestions->user['username'])}}</a> </p>



                        </div>

                    @endforeach
                @endif

        </div>
    </div>
    <div class="col-md-4">
            <h2>Similiar tags</h2>
        @foreach($similarTag as $similarTags)
                <h3><a href="{{action('tagController@description',[$similarTags->id])}}">{{ucfirst($similarTags->tag_name)}}</a></h3>
            <br>
            <hr>
        @endforeach
    </div>

@endsection