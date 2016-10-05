<?php $__env->startSection('title'); ?>
    Result
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <h3>Your search for "<?php echo e(Request::input('query')); ?>"</h3><br >
    <?php if(!$question->count()): ?>
        <p>No results found,sorry</p>
     <?php else: ?>
    <?php foreach($question as $questions): ?>
        <h1>
            <a href="<?php echo e(action('questionController@show',[$questions->id])); ?>"><?php echo e($questions->title); ?></a>
        </h1>
        <br>
        <p> Created at: <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($questions->created_at))->diffForHumans()); ?></p>
        <p>by <a href="<?php echo e(action('userController@getUser',[$questions->user['id']])); ?>"> <?php echo e($questions->user['username']); ?></a>  | Tag:<a href="<?php echo e(action('tagController@description',[$questions->tag_id])); ?>"> <?php echo e($questions->tag['tag_name']); ?></a> </p>
        <hr>

    <?php endforeach; ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>