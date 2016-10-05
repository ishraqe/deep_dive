<?php $__env->startSection('title'); ?>
    Tag's
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="col-md-8">


    <h3>Tag</h3><hr>
    <h1 style="color: black">A tag is a keyword or label that categorizes your question with other, similar questions. Using the right tags makes it easier for others to find and answer your question.</h1>
    <br>
    <form class="navbar-form" role="search" action="<?php echo e(url('/tagSearch')); ?>" >
        <div class="form-group">
            <label for="query">Type to find tag: </label>
            <input type="text" class="form-control" name="query" placeholder="Search for tags">
        </div>
        <button type="submit" style="position: absolute; left: -9999px" class="btn btn-default">Submit</button>


    </form><br>
        <div id="feature-container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-header">Tag's</h2>
                </div>
                <?php foreach($tag as  $tags): ?>

                <div class="col-sm-3 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                    <div class="feature-inner">

                        <h2><a style="  display: inline-block; margin-right: auto;   font-size: large" href="<?php echo e(action('tagController@description',[$tags->id])); ?>"><?php echo e(ucfirst($tags->tag_name)); ?></a></h2>

                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>








<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>