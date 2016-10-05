<?php $__env->startSection('title'); ?>
Admin panel
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>



<div class="admin_main_content">
    <h1>Welcome admin, </h1>

<div class="row">
    <div class="col-md-12">
        <form class="form-group" action="<?php echo e(action('userController@updateImage',[auth()->user()->id])); ?>" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input class="form-control" type="file" name="user_image" ><br>
            <button class="btn btn-primary" type="submit" value="Upload Image" name="submit" >Submit</button>
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

        </form>


    </div>
</div>
<img src="<?php echo e(auth()->user()->user_image); ?>">
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>