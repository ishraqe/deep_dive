@extends('layouts.master')
@section('title')
Admin panel
@endsection
@section('content')



<div class="admin_main_content">
    <h1>Welcome admin, </h1>

<div class="row">
    <div class="col-md-12">
        <form class="form-group" action="{{action('userController@updateImage',[auth()->user()->id])}}" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input class="form-control" type="file" name="user_image" ><br>
            <button class="btn btn-primary" type="submit" value="Upload Image" name="submit" >Submit</button>
            <input type="hidden" name="_token" value="{{csrf_token()}}" />

        </form>


    </div>
</div>
<img src="{{auth()->user()->user_image}}">
</div>
@stop