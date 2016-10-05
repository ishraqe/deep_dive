<div class="center_content">
    <div class="row">
        <div class="col-md-8" >



        </div>
        <div class="col-md-4">

            <div class="center_button">

                <a class="active" href="{{ action('questionController@index') }}" > <button type="button" class="btn btn-default">Question</button></a>

                <a href="{{url('/tags')}}" ><button  type="button" class="btn btn-default">Tag </button></a>
                <a href="{{url('/badges')}}" ><button  type="button" class="btn btn-default"> Badges</button></a>
                <a href="{{action('questionController@create')}}" ><button  type="button" class="btn btn-default"> Ask Questions </button></a>
            </div>



        </div>
    </div>

</div>