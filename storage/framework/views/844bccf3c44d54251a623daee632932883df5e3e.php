<?php $__env->startSection('title'); ?>
    Admin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('heading'); ?>
    All Admin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                    <?php foreach($admin as $admins): ?>
                        <td><?php echo e($index++); ?></td>
                        <td><?php echo e(ucfirst($admins->username)); ?></td>
                        <td><a href="<?php echo e(action('AdminController@destroy',[$admins->id])); ?>">Delete</a></td>


                </tr>
                <tr>

                <?php endforeach; ?>
                </tbody>
            </table>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>