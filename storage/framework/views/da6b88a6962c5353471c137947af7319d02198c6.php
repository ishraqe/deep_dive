<?php $__env->startSection('title'); ?>
        Question's
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Question Details</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->

    <section id="blog-details" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="single-blog blog-details two-column">

                                <div class="post-content overflow">
                                 <div class="mark">

                                     <?php if(Auth::guest()): ?>
                                         <form  action="<?php echo e(url('/login')); ?>" method="post" class="col-md-1 arrow-up"><input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                                             <div class="form-group" style="margin-right: 6px">
                                                 <button name="marking"  ><img style="height: 20px; " src="<?php echo e(URL::asset('asset/images/coming-soon4.png')); ?>"></button>
                                             </div>



                                         </form>
                                         <a href="#" class="mark-count"><?php echo e($questions->marking); ?></a>

                                         <form  action="<?php echo e(url('/login')); ?>" method="post" class="col-md-1 arrow-down"><input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                                             <div class="form-group" style="margin-right: 6px">
                                                 <button type="submit" ><img style="height: 20px; " src="<?php echo e(URL::asset('asset/images/coming-soon3.png')); ?>"></button>

                                             </div>



                                         </form>
                                     <?php else: ?>
                                         <form  action="<?php echo e(action('questionController@addMark',[$questions->id])); ?>" method="post" class="col-md-1 arrow-up"><input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                                             <div class="form-group" style="margin-right: 6px">
                                                 <button name="marking"  ><img style="height: 20px; " src="<?php echo e(URL::asset('asset/images/coming-soon4.png')); ?>"></button>
                                             </div>



                                         </form>
                                                 <a href="#" class="mark-count"><?php echo e($questions->marking); ?></a>

                                         <form  action="<?php echo e(action('questionController@minusMark',[$questions->id])); ?>" method="post" class="col-md-1 arrow-down"><input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                                             <div class="form-group" style="margin-right: 6px">
                                                 <button type="submit" ><img style="height: 20px; " src="<?php echo e(URL::asset('asset/images/coming-soon3.png')); ?>"></button>

                                             </div>



                                         </form>
                                     <?php endif; ?>

                                 </div>
                                 <div class="title">
                                    <h2 class="post-title bold"><?php echo e($questions->title); ?></h2>
                                    <h3 class="post-author">Posted by: <a href="<?php echo e(action('userController@getUser',[$questions->user['id']])); ?>"> <?php echo e(ucfirst($questions->user->getUsername())); ?>  </a> || Created at: <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($questions->created_at))->diffForHumans()); ?> </h3>

                                    <br><br><hr><br><p><pre><?php echo e(htmlspecialchars($questions->body)); ?></pre></p>
                                    <div class="post-bottom overflow">
                                        <ul class="nav navbar-nav post-nav">
                                            <li><a href="<?php echo e(action('tagController@description',[$questions->tag_id])); ?>"><i class="fa fa-tag"></i><?php echo e(ucfirst($questions->tag['tag_name'])); ?></a></li>
                                            <li><a href="#"><i class="fa fa-reddit-alien"></i>Mark:  <?php echo e($questions->marking); ?> </a></li>
                                            <li><a href="#"><i class="fa fa-comments"></i><?php echo e($count); ?> Comments</a></li>
                                        </ul>
                                    </div>


                                   <br>
                                 </div>
                                    <div class="response-area">
                                        <h2 class="bold">Answers: </h2>
                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="post-comment">
                                                    <?php foreach($reply as $replies): ?>
                                                    <div class="media-body">
                                                        <div class="mark">
                                                            <?php if(Auth::guest()): ?>
                                                                    <form  action="" method="post" class="col-md-1 arrow-up-answer"><input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                                                                        <div class="form-group" style="margin-right: 6px">
                                                                            <button name="marking" ><img style="height: 20px; " src="<?php echo e(URL::asset('asset/images/coming-soon4.png')); ?>"></button>

                                                                        </div>



                                                                    </form>
                                                                    <a href="#" class="mark-count">0</a>

                                                                    <form  action="#" method="post" class="col-md-1 arrow-down-answer"><input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                                                                        <div class="form-group" style="margin-right: 6px">
                                                                            <button ><img style="height: 20px; " src="<?php echo e(URL::asset('asset/images/coming-soon3.png')); ?>"></button>

                                                                        </div>



                                                                    </form>
                                                                <?php else: ?>
                                                                    <form  action="<?php echo e(action('questionController@addCommentMark',[$replies->id])); ?>" method="post" class="col-md-1 arrow-up-answer"><input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                                                                        <div class="form-group" style="margin-right: 6px">
                                                                            <button name="marking" ><img style="height: 20px; " src="<?php echo e(URL::asset('asset/images/coming-soon4.png')); ?>"></button>

                                                                        </div>



                                                                    </form>
                                                                    <a href="#" class="mark-count"><?php echo e($replies->marking); ?></a>

                                                                    <form  action="<?php echo e(action('questionController@minusCommentMark',[$replies->id])); ?>" method="post" class="col-md-1 arrow-down-answer"><input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                                                                        <div class="form-group" style="margin-right: 6px">
                                                                            <button ><img style="height: 20px; " src="<?php echo e(URL::asset('asset/images/coming-soon3.png')); ?>"></button>

                                                                        </div>



                                                                    </form>
                                                                 <?php endif; ?>
                                                        </div>

                                                        <span><i class="fa fa-user"></i>Posted by <a href="<?php echo e(action('userController@getUser',[$replies->user['id']])); ?>"><?php echo e(ucfirst($replies->user->getUsername())); ?> </a></span>
                                                        <p><pre><?php echo e(htmlspecialchars($replies->body)); ?></pre></p>
                                                        <ul class="nav navbar-nav post-nav">
                                                            <li><a href="#"><i class="fa fa-clock-o"></i> <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($replies->created_at))->diffForHumans()); ?></a></li>

                                                        </ul>
                                                    </div>
                                                        <br>
                                                    <?php endforeach; ?>

                                                </div>

                                            </li>
                                        </ul>
                                        <?php if(count($errors) > 0): ?>
                                            <div class="alert alert-danger">
                                                <ul>
                                                    <?php foreach($errors->all() as $error): ?>
                                                        <li><?php echo e($error); ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(Auth::guest()): ?>
                                            <form action="<?php echo e(url('/login')); ?>" method="">
                                                <div class="form-group">
                                                    <label for="comment">Add Comment:</label>
                                                    <textarea class="form-control" rows="3" id="comment"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-default">Submit</button>

                                            </form>
                                        <?php else: ?>
                                            <form action="<?php echo e(url('comment')); ?>" method="post" class="col-md-10"><input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                                                <div class="form-group">
                                                    <label for="body">Add your comments here: </label>
                                                    <textarea class="form-control" rows="10" cols="15" name="body" required><?php echo e(old('body')); ?></textarea>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                <input type="hidden" class="form-control"  name="title"  value=" title" >
                                                <input type="hidden" value="0" name="marking" >
                                                <input type="hidden" value="<?php echo e($questions->id); ?>" name="parent_id">
                                                <input type="hidden" class="form-control"  name="tag" value="tag">

                                            </form>
                                        <?php endif; ?>
                                    </div><!--/Response-area-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                            <h3>Similar Question's </h3>
                            <div class="media">
                                <?php foreach($similarQuestion as $similarQuestions): ?>
                                <div class="pull-left">
                                    <a href=" <?php echo e(action('questionController@show',[$similarQuestions->id])); ?>"><img src="<?php echo e(URL::asset('asset/images/home/activeicon.png')); ?>" alt=""></a>
                                </div>
                                <div class="media-body">

                                        <h4><a href="<?php echo e(action('questionController@show',[$similarQuestions->id])); ?> "> <?php echo e($similarQuestions->title); ?></a></h4>
                                        <p>posted on  <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($similarQuestions->created_at))->diffForHumans()); ?></p>



                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="sidebar-item tag-cloud">
                            <h3>Tag Cloud</h3>
                            <ul class="nav nav-pills">
                                <li><a href="<?php echo e(action('tagController@description',[$questions->tag_id])); ?>"><?php echo e(ucfirst($questions->tag['tag_name'])); ?></a></li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



























<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>