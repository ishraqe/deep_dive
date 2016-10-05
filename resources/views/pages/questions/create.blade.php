@extends('layouts.main')
@section('title')
    Create
@endsection
@section('content')
    <div class="col-md-8">


        <div id="tab-group">

                <form action="{{url('questions')}}" method="post" class="col-md-20"><input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="title">Title: </label>

                        <input type="text" class="form-control" id="title-input"  name="title"  value="{{ old('title') }}" required>

                    <div class="alert alert-success hideit inputAlertBox" id="title-input-msg-slide">
                        <h1>How to write the title </h1>
                        <ul class="list-group">


                            <li class="list-group-item list-group-item-info">
                                <i class="fa fa-info-circle" aria-hidden="true">
                                    We prefer questions that can be answered, not just discussed.
                                </i>
                            </li>
                            <li class="list-group-item list-group-item-info">
                                <i class="fa fa-info-circle" aria-hidden="true">
                                    Provide details. Share your research.
                                </i>
                            </li>
                            <li class="list-group-item list-group-item-info">
                                <i class="fa fa-info-circle" aria-hidden="true">
                                    Make the title specific but as small as possible
                                </i>
                            </li>

                        </ul>
                        <h4></h4>
                    </div>

                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>

                        <textarea class="form-control" id="body-input" rows="14" cols="15" name="body"  required>{{ old('body') }}</textarea>
                    </div>

                    <div class="alert alert-success hideit inputAlertBox" id="body-input-msg-slide">
                        <h1>How to write the body?</h1>

                             <ul class="list-group inputbox">
                                 <li class="list-group-item list-group-item-info"><i class="fa fa-info-circle" aria-hidden="true"></i> Describe the symptoms of your problem or bug carefully and clearly.</li>
                                 <li class="list-group-item list-group-item-info"><i class="fa fa-info-circle" aria-hidden="true"></i> Describe the environment in which it occurs (machine, OS, application, whatever). Provide you r vendor's distribution and release level (e.g.: “Fedora Core 7”, “Slackware 9.1”, etc.).</li>
                                 <li class="list-group-item list-group-item-info"><i class="fa fa-info-circle" aria-hidden="true"></i> Describe the research you did to try and understand the problem before you asked the question.</li>
                                 <li class="list-group-item list-group-item-info"><i class="fa fa-info-circle" aria-hidden="true"></i> Describe any possibly relevant recent changes in your computer or software configuration.</li>
                                 <li class="list-group-item list-group-item-info"><i class="fa fa-info-circle" aria-hidden="true"></i> If at all possible, provide a way to reproduce the problem in a controlled environment.</li>
                                 <li class="list-group-item list-group-item-info"><i class="fa fa-info-circle" aria-hidden="true"></i> Write the description anywhere in the body , before or after the code(if u have any)</li>
                                 <li class="list-group-item list-group-item-info"><i class="fa fa-info-circle" aria-hidden="true"></i> When writing code make sure you indent them the way you manually do in the editor</li>
                             </ul>

                    </div>

                    <input type="button" name="answer" value="Show Tag:" onclick="showDiv()" class="form-control" id="buttonScript" /><br>

                    <div id="welcomeDiv"  style="display:none;   color: black " class="answer_list" >

                        <div id="feature-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="page-header">Tag's</h2>
                                </div>

                                         @foreach($tag as $tags)
                                            <div class="col-sm-2 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                                                <div class="feature-inner">
                                                     <div class="form-group">

                                                            <input id="radio" type="radio"  value="{{$tags->id}}" name="tag_id">

                                                            <label for="tag_id" >

                                                                {{$tags->tag_name}}

                                                            </label>
                                                     </div>
                                                </div>
                                            </div>

                                        @endforeach

                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    {{--<input type="hidden" value="0" name="marking" >--}}
                </form>



            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>


    <script>
        function showDiv() {
            document.getElementById('welcomeDiv').style.display = "block";
        }

    </script>
@endsection