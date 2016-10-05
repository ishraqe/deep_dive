@extends('layouts.master')
@section('title')
    Tag's
@endsection
@section('heading')
Tag's
@endsection
@section('content')
<div class="admin_main_content">






    <div class="col-md-8">


            <table class="table table-bordered" id="table_admin">
                <thead>
                <tr>
                    <th>Index</th>
                    <th>Tag Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($tag as $tags)
                        <td>{{$index++}}</td>
                        <td>{{$tags->tag_name}}</td>
                        <td>{{$tags->description}}</td>
                        <td><a href="{{action('tagController@update',[$tags->id])}}">Edit</a></td>
                        <td><a href="{{action('tagController@destroy',[$tags->id])}}">Delete</a></td>


                </tr>
                <tr>

                @endforeach
                </tbody>
            </table>

    </div>


    <div class="col-md-4">


            <h1>Add new Tag: </h1>
            <form action="{{action('tagController@add')}}" method="post" class="col-md-20"><input name="_token" type="hidden" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="tag_name">Tag name </label>
                    <input type="text" class="form-control"  name="tag_name"  required>
                </div>

                <div class="form-group">
                    <label for="description">Descriptiom</label>

                    <textarea class="form-control" rows="10" cols="15" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>


    </div>



</div>
@stop