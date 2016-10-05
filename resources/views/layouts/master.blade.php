<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> @yield('title')</title>
    <link href="{{URL::to('asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('asset/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('asset/css/normalize.css')}}" rel="stylesheet">
    <link href="{{URL::to('asset/css/demo.css')}}" rel="stylesheet">
    <link href="{{URL::to('asset/css/menu_sideslide.css')}}" rel="stylesheet">


    <!--[if lt IE 9]>
    <script src="{{URL::asset('asset/js/html5shiv.js')}}"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="menu-wrap">
        <nav class="menu">
            <div class="icon-list">
                <div class="profile"><img style="height: 30px" src="{{URL::asset('asset/images/helmet.png')}}"/><span style="color: whitesmoke"> {{ucfirst(auth()->user()->username)}}</span></div>
                <a href="{{ url('/admin') }}"><i class="fa fa-user-secret"></i><span>My profile</span></a>
                <a href="{{url('/admin/newAdmin')}}"><i class="fa fa-user-secret"></i><span>Add admin</span></a>
                <a href="{{url('/admin/deleteAdmin')}}"><i class="fa fa-ban"></i><span>Delete admin</span></a>
                <a href="{{url('/admin/getUser')}}"><i class="fa fa-ban"></i><span>Ban user</span></a>

                <a href="{{url('/admin/tag')}}"><i class="fa fa-tag"></i><span>Tag</span></a>
                <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i><span>Analytics</span></a>
                <a href="#"><i class="fa fa-cart-plus"></i><span>Add advertisement</span></a>
                <a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i><span>Log out</span></a>
            </div>
        </nav>
        <button class="close-button" id="close-button">Close Menu</button>
    </div>
    <button  class="menu-button" id="open-button">Open Menu</button>

    <div class="content-wrap">
        <div class="content">
            <header class="codrops-header">

                <h1>@yield('heading') </h1>

            </header>

        </div>
        <section>
            <div class="container content-container" style="background-color: white">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success flash" id="#flash">{{Session::get('flash_message')}}</div>
                @endif

            </div>
        </section>

        @yield('content')

    </div><!-- /content-wrap -->
</div>


<script>
    $(document).ready(function(){
        $('.flash').delay(3000).slideUp(300);
        console.log('hello');


    });


</script>
<script type="text/javascript" src="{{URL::asset('asset/js/main2.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('asset/js/classie.js')}}"></script>


</body>
</html>
