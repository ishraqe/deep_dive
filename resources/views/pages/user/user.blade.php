@extends('layouts.main');
@section('title')
        {{ucfirst($user->username)}}
@endsection
@section('content')
    <div class="container">


        <div id="accordion-container">
            <h1 class="page-header"> {{ucfirst($user->username)}}'s Account</h1>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                Account Detail
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div id="feature-container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="page-header">Active From: {{ $user->created_at->format('F j, Y')}} </h2>
                                    </div>
                                    <div class="col-sm-3 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                                        <div class="feature-inner">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-2x fa-user"></i>
                                            </div>
                                            <h2>Username</h2>
                                            <p>{{ucfirst($user->username)}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="600ms">
                                        <div class="feature-inner">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-2x fa-envelope-o"></i>
                                            </div>
                                            <h2>E-mail</h2>
                                            <p>{{$user->email}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="900ms">
                                        <div class="feature-inner">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-2x fa-star-o"></i>
                                            </div>
                                            <h2>Ratting</h2>
                                            <p>{{$user->rating}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="1200ms">
                                        <div class="feature-inner">
                                            <div class="icon-wrapper">
                                                <i class="fa fa-2x fa-graduation-cap"></i>
                                            </div>
                                            <h2>Badges</h2>
                                            <p>
                                                @if($user->badges==1)
                                                    <img style="height:35px;" src="{{URL::asset('asset/images/services/1s.png')}}">
                                                @elseif($user->badges==2)
                                                    <img style="height:35px;" src="{{URL::asset('asset/images/services/2s.png')}}">
                                                @elseif($user->badges==3)
                                                    <img style="height:35px;" src="{{URL::asset('asset/images/services/3s.png')}}">
                                                @elseif($user->badges==4)
                                                    <img style="height:35px;" src="{{url::asset('asset/images/services/4s.png')}}">
                                                @else
                                                    <img style="height:35px;" src="{{url::asset('asset/images/services/premium.png')}}">
                                                @endif

                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    Question Asked so far by {{ucfirst($user->username)}}!!
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                @if(!$question->count())

                                    <div class="alert alert-warning">
                                        <p style="color: black">
                                            No question by  <span style="font-style: italic"> {{ucfirst($user->username)}} </span> so far !!!
                                        </p>
                                    </div>

                                @else

                                    @foreach($question as $questions)
                                        <h2>
                                            <a href="{{action('questionController@show',[$questions->id])}}">{{$questions->title}}</a>
                                        </h2>
                                        <br>
                                        <p>Created at: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($questions->created_at))->diffForHumans()}} | Tag: <a href="{{action('tagController@description',[$questions->tag_id])}}"> {{ucfirst($questions->tag['tag_name'])}}</a> </p>

                                        <hr>


                                    @endforeach

                                        {{$question->render()}}
                                @endif
                            </div>
                        </div>
                </div>

                </div><!--/#accordion-->
            </div>

        </div>
@endsection