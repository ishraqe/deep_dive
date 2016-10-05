<header class="navbar-hed">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <a class="navbar-brand" href="{{url('/')}}"><img src="{{URL::to('images/logo1.png')}}"></a>
                @if(!Auth::guest() && Auth::user()->admin)
                    <a class="navbar-brand" id="header_admin_a1" href="{{url('/admin/tag')}}">Tags</a>
                    <a class="navbar-brand" id="header_admin_a2" href="#">User</a>
                    <a class="navbar-brand" id="header_admin_a3" href="#">Rules</a>
                @endif

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <div>
                        <ul class="nav navbar-nav">
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else

                                @if(!Auth::guest() && Auth::user()->admin)

                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->username }} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-sign-out"></i>Admin Panel</a></li>

                                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                                        </ul>
                                    </li>

                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{ Auth::user()->username }} <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('/home') }}"><i class="fa fa-btn fa-sign-out"></i>Profile</a></li>
                                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                        </ul>

                                    </li>
                                @endif

                            @endif

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Help<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('/tour')}}">Tour</a></li>
                                    <li><a href="#">Help Center</a></li>
                                    <li><a href="#">About Us</a></li>

                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-left" role="search" action="{{url('/search')}}" >
                            <div class="form-group">
                                <input type="text" class="form-control" name="query" placeholder="Search for questions">
                            </div>
                            <button type="submit" style="position: absolute; left: -9999px" class="btn btn-default">Submit</button>


                        </form>

                    </div>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>