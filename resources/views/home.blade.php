@extends('layouts.main')

@section('content')
<div class="container">


    <div id="accordion-container">
        <h1 class="page-header">My Account</h1>
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
                                    <h2 class="page-header">Active From: {{ auth()->user()->created_at->format('F j, Y')}} </h2>
                                </div>
                                <div class="col-sm-3 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                                    <div class="feature-inner">
                                        <div class="icon-wrapper">
                                            <i class="fa fa-2x fa-user"></i>
                                        </div>
                                        <h2>Username</h2>
                                        <p>{{ucfirst(auth()->user()->username)}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-3 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="600ms">
                                    <div class="feature-inner">
                                        <div class="icon-wrapper">
                                            <i class="fa fa-2x fa-envelope-o"></i>
                                        </div>
                                        <h2>E-mail</h2>
                                        <p>{{auth()->user()->email}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-3 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="900ms">
                                    <div class="feature-inner">
                                        <div class="icon-wrapper">
                                            <i class="fa fa-2x fa-star-o"></i>
                                        </div>
                                        <h2>Ratting</h2>
                                        <p>{{auth()->user()->rating}}</p>
                                    </div>
                                </div>
                                <div class="col-sm-3 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="1200ms">
                                    <div class="feature-inner">
                                        <div class="icon-wrapper">
                                            <i class="fa fa-2x fa-graduation-cap"></i>
                                        </div>
                                        <h2>Badges</h2>
                                        <p>
                                        @if(auth()->user()->badges==1) <img style="height:35px;" src="{{URL::asset('asset/images/services/1s.png')}}"> @elseif(auth()->user()->badges==2)<img style="height:35px;" src="{{URL::asset('asset/images/services/2s.png')}}">@elseif(auth()->user()->badges==3)<img style="height:35px;" src="{{URL::asset('asset/images/services/3s.png')}}">@elseif(auth()->user()->badges==4)<img style="height:35px;" src="{{URL::asset('asset/images/services/4s.png')}}"> @else <img style="height:35px;" src="{{URL::asset('asset/images/services/premium.png')}}"> @endif

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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                           Profile Picture
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div id="feature-container">
                            <div class="row">

                                <div class="col-sm-3 ">
                                    <div class="feature-inner">

                                        <h2>Image</h2>
                                        <p> <img style="height: 160px" src="{{auth()->user()->user_image}}"></p>
                                    </div>
                                </div>

                                <div class="col-sm-3  " style="margin-left: 300px">
                                    <div class="feature-inner">

                                        <h2>Change Profile Picture</h2>
                                        <p><form class="form-group" action="{{action('userController@updateImage',[auth()->user()->id])}}" method="post" enctype="multipart/form-data">
                                            Select image to upload:
                                            <input class="form-control" type="file" name="user_image" ><br>
                                            <button class="btn btn-primary" type="submit" value="Upload Image" name="submit" >Submit</button>
                                            <input type="hidden" name="_token" value="{{csrf_token()}}" />

                                        </form></p>
                                    </div>
                                </div>
                            </div>
                        </div><!--/#feature-container-->




                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Question Asked so far!!
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        @if(!$question->count())

                            <div class="alert alert-warning">
                                <p style="color: black">
                                    No question by this user till now  <span style="font-style: italic">  </span> so far !!!
                                </p>
                            </div>

                        @else

                        @foreach($question as $questions)
                            <h2>
                                <a href="{{action('questionController@show',[$questions->id])}}">{{$questions->title}}</a>
                            </h2>
                            <br>
                            <p>Created at: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($questions->created_at))->diffForHumans()}}| By:<a href="#">{{ucfirst( $questions->user['username'])}}</a>|tag:<a href="{{action('tagController@description',[$questions->tag_id])}}">{{ucfirst($questions->tag['tag_name'])}}</a> </p>

                            <hr>

                        @endforeach
                                {{$question->render()}}

                        @endif

                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Change Password
                        </a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ action('userController@updatePass',[auth()->user()->id]) }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/#accordion-->
    </div>

</div>
@endsection
