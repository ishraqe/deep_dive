<div class="col-md-8">
<div class="left_content">
    <div id="tab-container"style="border: 1px solid black; border-spacing: 1px;" >
        <div class="row">
            <div class="col-md-12" style="margin-left: 14px">
                <h2 class="page-header">Question's</h2>
            </div>

            <div class="col-md-12">
                <ul id="tab2" class="nav nav-pills" style="margin-left: 14px">
                    <li class="active"><a href="#tab2-item1" data-toggle="tab">RECENT</a></li>
                    <li><a href="#tab2-item2" data-toggle="tab">TOP</a></li>

                </ul>

                <div class="tab-content">
                    <hr>
                    <div class="tab-pane fade active in" id="tab2-item1" style="margin-left: 14px">
                        @if(!$question->count())
                            <h2>No, question published yet</h2>
                        @else
                             @foreach($question as $questions)
                                <h2>
                                    <a href="{{action('questionController@show',[$questions->id])}}">{{$questions->title}}</a>
                                </h2>
                                <br>
                                <p>Created at: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($questions->created_at))->diffForHumans()}} |  By:<a href="{{action('userController@getUser',[$questions->user['id']])}}">{{ ucfirst($questions->user['username'])}}</a> | Tag:<a href="{{action('tagController@description',[$questions->tag_id])}}">{{ucfirst($questions->tag['tag_name'])}}</a> </p>

                                <hr>

                            @endforeach
                                {{$question->render()}}

                        @endif
                    </div>
                    <div class="tab-pane fade" id="tab2-item2">
                        @if(!$questionMark->count())
                            <h2>No, question published yet</h2>
                        @else
                            @foreach($questionMark as $questionMarks)
                                <h2>
                                    <a href="{{action('questionController@show',[$questionMarks->id])}}" > {{$questionMarks->title}}</a>
                                </h2>
                                <br>
                                <p>Created at: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($questionMarks->created_at))->diffForHumans()}} | By :<a href="{{action('userController@getUser',[$questionMarks->user['id']])}}">{{ucfirst( $questionMarks->user['username'])}}</a> | Tag:<a href="{{action('tagController@description',[$questionMarks->tag_id])}} ">{{ucfirst($questionMarks->tag['tag_name'])}}</a> </p>

                                <hr>

                            @endforeach

                            {{$questionMark->render()}}
                         @endif
                    </div>

                </div>
            </div>
        </div>
    </div>



</div>
</div>
