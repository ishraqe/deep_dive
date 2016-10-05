<?php $__env->startSection('title'); ?>
    Admin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('heading'); ?>
    Ban user
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="admin_main_content">
        <div class="col-md-8">
            <?php if(! count($user)): ?>
                <div class="alert alert-info" role="alert">
                    No, user found.
                </div>
            <?php else: ?>

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

                    <?php foreach($user as $users): ?>
                        <td><?php echo e($index++); ?></td>
                        <td><?php echo e(ucfirst($users->username)); ?></td>
                        <td></td>
                        <td><a href="<?php echo e(action('AdminController@destroy',[$users->id])); ?>">Delete</a></td>


                </tr>
                <tr>

                <?php endforeach; ?>
                </tbody>
            </table>
           <?php endif; ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>