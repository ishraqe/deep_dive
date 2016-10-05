@extends('layouts.master')
@section('title')
   Update Tag

@endsection
@section('heading')
Edit Tag
@endsection
@section('content')
<div class="admin_main_content">
        <div class="tag_edit col-md-7">
            <form action="{{action('tagController@postUpdate',[$tag->id])}}" method="post" class="col-md-20"><input name="_token" type="hidden" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="tag_name">Tag name </label>
                    <input type="text" class="form-control"  name="tag_name" value="{{$tag->tag_name}}" required>
                </div>


                <div class="form-group">
                    <label for="description">Description</label>

                    <textarea class="form-control" rows="10" cols="15" name="description" >{{$tag->description}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
</div>
@endsection