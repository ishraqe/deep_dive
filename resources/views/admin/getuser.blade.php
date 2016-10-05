@extends('layouts.master')
@section('title')
    Admin
@endsection
@section('heading')
    Ban user
@endsection
@section('content')
    <div class="admin_main_content">
        <div class="col-md-8">
            @if(! count($user))
                <div class="alert alert-info" role="alert">
                    No, user found.
                </div>
            @else

            <table class="table table-bordered" id="table_admin">
                <thead>
                <tr>
                    <th>Index</th>
                    <th>UserName</th>

                    <th>Reputation</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>

                    @foreach($user as $users)
                        <td>{{$index++}}</td>
                        <td>{{ucfirst($users->username)}}</td>
                        <td></td>
                        <td><a href="{{action('AdminController@destroy',[$users->id])}}">Delete</a></td>


                </tr>
                <tr>

                @endforeach
                </tbody>
            </table>
           @endif

        </div>

    </div>
@endsection