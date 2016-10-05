<?php $__env->startSection('title'); ?>
    Tag's
<?php $__env->stopSection(); ?>
<?php $__env->startSection('heading'); ?>
Tag's
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                    <?php foreach($tag as $tags): ?>
                        <td><?php echo e($index++); ?></td>
                        <td><?php echo e($tags->tag_name); ?></td>
                        <td><?php echo e($tags->description); ?></td>
                        <td><a href="<?php echo e(action('tagController@update',[$tags->id])); ?>">Edit</a></td>
                        <td><a href="<?php echo e(action('tagController@destroy',[$tags->id])); ?>">Delete</a></td>


                </tr>
                <tr>

                <?php endforeach; ?>
                </tbody>
            </table>

    </div>


    <div class="col-md-4">


            <h1>Add new Tag: </h1>
            <form action="<?php echo e(action('tagController@add')); ?>" method="post" class="col-md-20"><input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>