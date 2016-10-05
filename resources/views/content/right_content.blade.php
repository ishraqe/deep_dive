<div class="col-md-4">

    <div class="sidebar-item  recent">

        <h3>Top User</h3>
        <div class="media">
            @foreach($topUser as $ids)

                    <div class="pull-left">
                        <a  href="#">@if($ids->badges==1) <img style="height:45px;" src="{{URL::asset('asset/images/services/1s.png')}}"> @elseif($ids->badges==2)<img style="height:45px;" src="{{URL::asset('asset/images/services/2s.png')}}">@elseif($ids->badges==3)<img style="height:45px;" src="{{URL::asset('asset/images/services/3s.png')}}">@elseif($ids->badges==4)<img style="height:45px;" src="{{URL::asset('asset/images/services/4s.png')}}"> @else <img style="height:45px;" src="{{URL::asset('asset/images/services/premium.png')}}"> @endif</a>

                    </div>
                    <div class="media-body">
                        <h4><a href="{{action('userController@getUser',[$ids->id])}}">  {{ ucfirst($ids->username)}}</a></h4>
                        <h5>Rating: {{$ids->rating}}</h5>
                    </div>
                    <hr>
            @endforeach
        </div>

    </div>
    <div class="sidebar-item  recent">
        <h3>Adds</h3>
    <div class="col-sm-11 col-xs-2">
        <div class="team-single-wrapper">
            <div class="team-single">
                <div class="person-thumb">
                  <a href="#"><img src="{{URL::asset('asset/images/services/add1.jpg')}}" class="img-responsive" alt=""></a>
                </div>

            </div>

        </div>
    </div>
    </div>
</div>