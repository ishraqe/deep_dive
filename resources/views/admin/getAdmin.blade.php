@extends('layouts.master')
@section('title')
    Admin
@endsection
@section('heading')
    All Admin
@endsection
@section('content')
    <div class="admin_main_content">
        <div class="col-md-8">


            <table class="table table-bordered" id="table_admin">
                <thead>
                <tr>
                    <th>Index</th>
                    <th>Admin Name</th>


                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($admin as $admins)
                        <td>{{$index++}}</td>
                        <td>{{ucfirst($admins->username)}}</td>
                        <td><a href="{{action('AdminController@destroy',[$admins->id])}}">Delete</a></td>


                </tr>
                <tr>

                @endforeach
                </tbody>
            </table>

        </div>

    </div>

@endsection
