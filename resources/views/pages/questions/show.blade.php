@extends('layouts.main')
@section('title')
        Question's
@endsection
@section('content')

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Question Details</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->

    <section id="blog-details" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="single-blog blog-details two-column">

                                <div class="post-content overflow">
                                 <div class="mark">

                                     @if (Auth::guest())
                                         <form  action="{{url('/login')}}" method="post" class="col-md-1 arrow-up"><input name="_token" type="hidden" value="{{ csrf_token() }}">

                                             <div class="form-group" style="margin-right: 6px">
                                                 <button name="marking"  ><img style="height: 20px; " src="{{URL::asset('asset/images/coming-soon4.png')}}"></button>
                                             </div>



                                         </form>
                                         <a href="#" class="mark-count">{{$questions->marking}}</a>

                                         <form  action="{{url('/login')}}" method="post" class="col-md-1 arrow-down"><input name="_token" type="hidden" value="{{ csrf_token() }}">

                                             <div class="form-group" style="margin-right: 6px">
                                                 <button type="submit" ><img style="height: 20px; " src="{{URL::asset('asset/images/coming-soon3.png')}}"></button>

                                             </div>



                                         </form>
                                     @else
                                         <form  action="{{action('questionController@addMark',[$questions->id])}}" method="post" class="col-md-1 arrow-up"><input name="_token" type="hidden" value="{{ csrf_token() }}">

                                             <div class="form-group" style="margin-right: 6px">
                                                 <button name="marking"  ><img style="height: 20px; " src="{{URL::asset('asset/images/coming-soon4.png')}}"></button>
                                             </div>



                                         </form>
                                                 <a href="#" class="mark-count">{{$questions->marking}}</a>

                                         <form  action="{{action('questionController@minusMark',[$questions->id])}}" method="post" class="col-md-1 arrow-down"><input name="_token" type="hidden" value="{{ csrf_token() }}">

                                             <div class="form-group" style="margin-right: 6px">
                                                 <button type="submit" ><img style="height: 20px; " src="{{URL::asset('asset/images/coming-soon3.png')}}"></button>

                                             </div>



                                         </form>
                                     @endif

                                 </div>
                                 <div class="title">
                                    <h2 class="post-title bold">{{$questions->title}}</h2>
                                    <h3 class="post-author">Posted by: <a href="{{action('userController@getUser',[$questions->user['id']])}}"> {{ucfirst($questions->user->getUsername())}}  </a> || Created at: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($questions->created_at))->diffForHumans()}} </h3>

                                    <br><br><hr><br><p><pre>{{htmlspecialchars($questions->body)}}</pre></p>
                                    <div class="post-bottom overflow">
                                        <ul class="nav navbar-nav post-nav">
                                            <li><a href="{{action('tagController@description',[$questions->tag_id])}}"><i class="fa fa-tag"></i>{{ucfirst($questions->tag['tag_name'])}}</a></li>
                                            <li><a href="#"><i class="fa fa-reddit-alien"></i>Mark:  {{$questions->marking}} </a></li>
                                            <li><a href="#"><i class="fa fa-comments"></i>{{$count}} Comments</a></li>
                                        </ul>
                                    </div>


                                   <br>
                                 </div>
                                    <div class="response-area">
                                        <h2 class="bold">Answers: </h2>
                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="post-comment">
                                                    @foreach($reply as $replies)
                                                    <div class="media-body">
                                                        <div class="mark">
                                                            @if (Auth::guest())
                                                                    <form  action="" method="post" class="col-md-1 arrow-up-answer"><input name="_token" type="hidden" value="{{ csrf_token() }}">

                                                                        <div class="form-group" style="margin-right: 6px">
                                                                            <button name="marking" ><img style="height: 20px; " src="{{URL::asset('asset/images/coming-soon4.png')}}"></button>

                                                                        </div>



                                                                    </form>
                                                                    <a href="#" class="mark-count">0</a>

                                                                    <form  action="#" method="post" class="col-md-1 arrow-down-answer"><input name="_token" type="hidden" value="{{ csrf_token() }}">

                                                                        <div class="form-group" style="margin-right: 6px">
                                                                            <button ><img style="height: 20px; " src="{{URL::asset('asset/images/coming-soon3.png')}}"></button>

                                                                        </div>



                                                                    </form>
                                                                @else
                                                                    <form  action="{{action('questionController@addCommentMark',[$replies->id])}}" method="post" class="col-md-1 arrow-up-answer"><input name="_token" type="hidden" value="{{ csrf_token() }}">

                                                                        <div class="form-group" style="margin-right: 6px">
                                                                            <button name="marking" ><img style="height: 20px; " src="{{URL::asset('asset/images/coming-soon4.png')}}"></button>

                                                                        </div>



                                                                    </form>
                                                                    <a href="#" class="mark-count">{{$replies->marking}}</a>

                                                                    <form  action="{{action('questionController@minusCommentMark',[$replies->id])}}" method="post" class="col-md-1 arrow-down-answer"><input name="_token" type="hidden" value="{{ csrf_token() }}">

                                                                        <div class="form-group" style="margin-right: 6px">
                                                                            <button ><img style="height: 20px; " src="{{URL::asset('asset/images/coming-soon3.png')}}"></button>
                                                                        </div>

                                                                    </form>




                                                                 @endif
                                                        </div>

                                                        <span><i class="fa fa-user"></i>Posted by <a href="{{action('userController@getUser',[$replies->user['id']])}}">{{ucfirst($replies->user->getUsername())}} </a></span>
                                                        <p><pre>{{ htmlspecialchars($replies->body)}}</pre></p>
                                                        <ul class="nav navbar-nav post-nav">
                                                            <li><a href="#"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($replies->created_at))->diffForHumans()}}</a></li>

                                                        </ul>
                                                    </div>
                                                        <br>
                                                        <div class="answer-comment col-sm-12">
                                                            <form action="{{action('questionController@addComment',[$replies->id])}}" method="post">
                                                                <div class="form-group">
                                                                    <label for="comment">Add Comment:</label>
                                                                    <textarea class="form-control answer-comment-textarea" rows="2" cols="1" id="comment" name="body"></textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-default">Submit</button>
                                                                <input name="_token" type="hidden" value="{{ csrf_token() }}">

                                                            </form>
                                                        </div>

                                                    @endforeach

                                                </div>

                                            </li>
                                        </ul>
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if (Auth::guest())
                                            <form action="{{url('/login')}}" method="">
                                                <div class="form-group">
                                                    <label for="comment">Add Comment:</label>
                                                    <textarea class="form-control" rows="3" id="comment"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-default">Submit</button>

                                            </form>
                                        @else
                                            <form style="margin-top: 10px;" action="{{action('questionController@addAnswer',[$questions->id])}}" method="post" class="col-md-10"><input name="_token" type="hidden" value="{{ csrf_token() }}">

                                                <div class="form-group">
                                                    <label for="body">Add your answer here: </label>
                                                    <textarea class="form-control" rows="10" cols="15" name="body" required>{{ old('body') }}</textarea>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Submit</button>

                                            </form>
                                        @endif
                                    </div><!--/Response-area-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                            <h3>Similar Question's </h3>
                            <div class="media">
                                @foreach($similarQuestion as $similarQuestions)
                                <div class="pull-left">
                                    <a href=" {{action('questionController@show',[$similarQuestions->id])}}"><img src="{{URL::asset('asset/images/home/activeicon.png')}}" alt=""></a>
                                </div>
                                <div class="media-body">

                                        <h4><a href="{{action('questionController@show',[$similarQuestions->id])}} "> {{$similarQuestions->title}}</a></h4>
                                        <p>posted on  {{ \Carbon\Carbon::createFromTimeStamp(strtotime($similarQuestions->created_at))->diffForHumans()}}</p>



                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="sidebar-item tag-cloud">
                            <h3>Tag Cloud</h3>
                            <ul class="nav nav-pills">
                                <li><a href="{{action('tagController@description',[$questions->tag_id])}}">{{ucfirst($questions->tag['tag_name'])}}</a></li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>





@endsection