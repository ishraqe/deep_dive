<?php $__env->startSection('title'); ?>
    Update Tag

<?php $__env->stopSection(); ?>
<?php $__env->startSection('heading'); ?>
    Edit Tag
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="admin_main_content">
        <div class="tag_edit col-md-7">
            <form action="<?php echo e(action('tagController@postUpdate',[$user->id])); ?>" method="post" class="col-md-20"><input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                <div class="form-group">
                    <label for="tag_name">Tag name </label>
                    <input type="text" class="form-control"  name="tag_name" value="<?php echo e($user->username); ?>" required>
                </div>


                <?php /*<div class="form-group">*/ ?>
                    <?php /*<label for="description">Description</label>*/ ?>

                    <?php /*<textarea class="form-control" rows="10" cols="15" name="description" ><?php echo e($tag->description); ?></textarea>*/ ?>
                <?php /*</div>*/ ?>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>