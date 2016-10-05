<?php $__env->startSection('title'); ?>
    <?php echo e($tag->tag_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-8">
        <div style="height: 100%">
            <h1><?php echo e(ucfirst($tag->tag_name)); ?></h1>
            <blockquote>" <?php echo e(ucfirst($tag->description)); ?> "</blockquote>
            <h3>Question under this tag</h3>
            <?php if(!$similarQuestion->count()): ?>
                <p>no question yet under this tag!!<p>
            <?php else: ?>
                    <?php foreach($similarQuestion as $similarQuestions): ?>

                        <div class="pull-left">
                            <a href=" <?php echo e(action('questionController@show',[$similarQuestions->id])); ?>"><img style="height: 30px" src="<?php echo e(URL::asset('asset/images/faq.png')); ?>" alt=""></a>
                        </div>
                        <div class="media-body">

                            <h4><a href="<?php echo e(action('questionController@show',[$similarQuestions->id])); ?> "> <?php echo e($similarQuestions->title); ?></a></h4>
                            <p>posted on  <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($similarQuestions->created_at))->diffForHumans()); ?>||By:<a href="<?php echo e(action('userController@getUser',[$similarQuestions->user['id']])); ?>"><?php echo e(ucfirst($similarQuestions->user['username'])); ?></a> </p>



                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>

        </div>
    </div>
    <div class="col-md-4">
            <h2>Similiar tags</h2>
        <?php foreach($similarTag as $similarTags): ?>
                <h3><a href="<?php echo e(action('tagController@description',[$similarTags->id])); ?>"><?php echo e(ucfirst($similarTags->tag_name)); ?></a></h3>
            <br>
            <hr>
        <?php endforeach; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>