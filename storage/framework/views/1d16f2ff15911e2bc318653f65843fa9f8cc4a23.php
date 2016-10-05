<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?php echo $__env->yieldContent('title'); ?></title>
    <?php /*<link href="<?php echo e(URL::to('asset/css/dropzone.css')); ?>" rel="stylesheet">*/ ?>
    <link href="<?php echo e(URL::to('asset/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::to('asset/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::to('asset/css/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::to('asset/css/lightbox.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::to('asset/css/main.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(URL::to('asset/css/responsive.css')); ?>" rel="stylesheet">



    <!--[if lt IE 9]>
    <script src="<?php echo e(URL::asset('asset/js/html5shiv.js')); ?>"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo e(URL::asset('asset/images/ico/favicon.ico')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(URL::asset('asset/images/ico/apple-touch-icon-144-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(URL::asset('asset/images/ico/apple-touch-icon-114-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(URL::asset('asset/images/ico/apple-touch-icon-72-precomposed.png')); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(URL::asset('asset/images/ico/apple-touch-icon-57-precomposed.png')); ?>">
</head><!--/head-->

<body>
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 overflow">
                <div class="social-icons pull-right">
                    <ul class="nav nav-pills">
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                        <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <h1><img style="height: 40px " src="<?php echo e(URL::asset('asset/images/logo1.png')); ?>" alt="logo"></h1>
                </a>

            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                    <?php elseif(!Auth::guest() && Auth::user()->admin): ?>


                            <li class="dropdown"><a class="profile" href="#">
                                    <img style="height: 25px; width: 25px" src="<?php echo e(auth::user()->user_image); ?>" /><span><?php echo e(ucfirst(Auth::user()->username)); ?> </span>
                                     <i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">

                                    <li><a href="<?php echo e(url('/admin')); ?>"><i class="fa fa-btn fa-sign-out"></i>Admin Panel</a></li>
                                    <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>


                                </ul>
                            </li>

                    <?php else: ?>
                        <?php
                            $notification = DB::table('users')

                                    ->join('notification', 'users.id', '=', 'notification.comments_user_id')
                                    ->select('users.*', 'notification.*')
                                    ->orderBy('notification.created_at','desc')

                                    ->where('notification.question_user_id',auth()->user()->id)
                                    ->groupBy('notification.question_id')
                                    ->get();


                            ?>

                            <li id="notification">

                                <a class="profile" id="notyClick" href="#">

                                    <img height="20px" src="<?php echo e(URL::asset('asset/images/notification1.png')); ?>">
                                    <?php if(count($notification)): ?>
                                    <span class="badge" style="background-color: #00AEEF "><?php echo e(count($notification)); ?></span>
                                    <?php endif; ?>
                                    <i class="fa fa-angle-down"></i>
                                </a>

                                <div class="notyBox">
                                    <div class="media">
                                        <?php if(count($notification)): ?>
                                            <?php foreach($notification as $notifications): ?>

                                                <div class="pull-left">
                                                    <a  href="#"><img height="45px" width="40px" src="<?php echo e($notifications->user_image); ?>"> </a>

                                                </div>

                                                <div class="media-body">
                                                    <h4><a href="<?php echo e(action('questionController@show',[$notifications->question_id])); ?>"><?php echo e($notifications->username); ?> has replied on your question</a></h4>
                                                </div>
                                                <hr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <div class="alert alert-info">
                                               you have no notification yet !!!
                                            </div>

                                        <?php endif; ?>

                                    </div>
                                </div>
                            </li>
                            <li class="dropdown"><a class="profile" href="#">
                                    <?php if(auth::user()->user_image): ?>
                                        <img style="height: 25px; width: 25px" src="<?php echo e(auth::user()->user_image); ?>" />
                                    <?php endif; ?>
                                        <span><?php echo e(ucfirst( Auth::user()->username)); ?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>

                                <ul role="menu" class="sub-menu">
                                     <li><a href="<?php echo e(url('/home')); ?>"><i class="fa fa-btn fa-sign-out"></i>Profile</a></li>
                                    <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>


                                </ul>
                            </li>




                    <?php endif; ?>
                    <li class="dropdown"><a href="#">Help <i class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="sub-menu">
                            <li><a href="<?php echo e(url('/tour')); ?>">Tour</a></li>
                            <li><a href="<?php echo e(url('/about_us')); ?>">About us</a></li>

                            <li><a href="<?php echo e(url('/contact_us')); ?>">Contact Us</a></li>

                        </ul>
                    </li>

                </ul>
            </div>
            <div class="search col-md-4">
                <form  role="search" action="<?php echo e(url('/search')); ?>">
                    <i class="fa fa-search"></i>
                    <div class="field-toggle">
                        <input type="text" class="form-control" name="query" placeholder="Search for questions">
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
<section >
    <?php echo $__env->make('content.center_content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</section>

<?php if(Auth::guest()): ?>
<section id="home-slider">
    <div class="container">
        <div class="row">
            <div class="main-slider">
                <div class="slide-text">
                    <h1>We Are Creative Nerds</h1>
                    <p>we are deep dive .</p>
                    <a href="<?php echo e(url('/register')); ?>" class="btn btn-common">SIGN UP</a>
                </div>
                <img src="<?php echo e(URL::asset('asset/images/home/slider/hill.png')); ?>" class="slider-hill" alt="slider image">
                <img src="<?php echo e(URL::asset('asset/images/home/slider/house.png')); ?>" class="slider-house" alt="slider image">
                <img src="<?php echo e(URL::asset('asset/images/home/slider/sun.png')); ?>" class="slider-sun" alt="slider image">
                <img src="<?php echo e(URL::asset('asset/images/home/slider/birds1.png')); ?>" class="slider-birds1" alt="slider image">
                <img src="<?php echo e(URL::asset('asset/images/home/slider/birds2.png')); ?>" class="slider-birds2" alt="slider image">
            </div>
        </div>
    </div>



    <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>




</section>
<?php else: ?>

<?php endif; ?>
<section>
    <div class="container content-container">

        <?php echo $__env->yieldContent('content'); ?>
    </div>
</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center bottom-separator">
                <img src="<?php echo e(URL::asset('asset/images/home/under.png')); ?>" class="img-responsive inline" alt="">
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="testimonial bottom">
                    <h2>Testimonial</h2>
                    <div class="media">
                        <div class="pull-left">
                            <a href="#"><img src="<?php echo e(URL::asset('asset/images/home/profile1.png')); ?>" alt=""></a>
                        </div>
                        <div class="media-body">
                            <blockquote>Impressive.</blockquote>
                            <h3><a href="#">- Mh Mehedi </a></h3>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <a href="#"><img src="<?php echo e(URL::asset('asset/images/home/profile2.png')); ?>" alt=""></a>
                        </div>
                        <div class="media-body">
                            <blockquote>Very good</blockquote>
                            <h3><a href="">- Fuad syed</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="contact-info bottom">
                    <a href="#"><h2>Contacts</h2></a>
                    <address>
                        E-mail: <a href="#">email@email.com</a> <br>
                        Phone: +1 (123) 456 7890 <br>
                        Fax: +1 (123) 456 7891 <br>
                    </address>

                    <h2>Address</h2>
                    <address>
                        75/1,Shukrabad <br>
                        Road no-32, <br>
                        Dhanmondi, Dhaka <br>
                        Bangladesh <br>
                    </address>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="contact-form bottom">
                    <h2>Send a message</h2>
                    <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email Id">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your text here"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="copyright-text text-center">
                    <p>&copy; <span>Spurs</span> <img style="height: 50px" src="<?php echo e(URL::asset('asset/images/helmet.png')); ?>">  | <?php echo e(current_year()); ?>. All Rights Reserved.</p>
                    <p>Crafted by <a target="_blank" href="http://designscrazed.org/">Ish</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/#footer-->
<?php /*<script type="text/javascript" src="<?php echo e(URL::asset('asset/js/dropzone.js')); ?>"></script>*/ ?>
<script type="text/javascript" src="<?php echo e(URL::asset('asset/js/jquery.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('asset/js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('asset/js/lightbox.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('asset/js/wow.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('asset/js/main.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('asset/js/gmaps.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('asset/js/inputScript.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('asset/js/main2.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('asset/js/classie.js')); ?>"></script>
<script>
//    $('div.alert').delay(3000).slideUp(300);

</script>
<script>
    $(document).ready(function(){
        $("#notyClick").click(function(){
            $(".notyBox").toggle();
        });
    });
</script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

</body>
</html>
