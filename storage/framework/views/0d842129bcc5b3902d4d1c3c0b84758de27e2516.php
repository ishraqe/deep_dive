<div class="col-md-8">
<div class="left_content">
    <div id="tab-container"style="border: 1px solid black; border-spacing: 1px;" >
        <div class="row">
            <div class="col-md-12" style="margin-left: 14px">
                <h2 class="page-header">Question's</h2>
            </div>

            <div class="col-md-12">
                <ul id="tab2" class="nav nav-pills" style="margin-left: 14px">
                    <li class="active"><a href="#tab2-item1" data-toggle="tab">RECENT</a></li>
                    <li><a href="#tab2-item2" data-toggle="tab">TOP</a></li>

                </ul>

                <div class="tab-content">
                    <hr>
                    <div class="tab-pane fade active in" id="tab2-item1" style="margin-left: 14px">
                        <?php if(!$question->count()): ?>
                            <h2>No, question published yet</h2>
                        <?php else: ?>
                             <?php foreach($question as $questions): ?>
                                <h2>
                                    <a href="<?php echo e(action('questionController@show',[$questions->id])); ?>"><?php echo e($questions->title); ?></a>
                                </h2>
                                <br>
                                <p>Created at: <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($questions->created_at))->diffForHumans()); ?> |  By:<a href="<?php echo e(action('userController@getUser',[$questions->user['id']])); ?>"><?php echo e(ucfirst($questions->user['username'])); ?></a> | Tag:<a href="<?php echo e(action('tagController@description',[$questions->tag_id])); ?>"><?php echo e(ucfirst($questions->tag['tag_name'])); ?></a> </p>

                                <hr>

                            <?php endforeach; ?>
                                <?php echo e($question->render()); ?>


                        <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="tab2-item2">
                        <?php if(!$questionMark->count()): ?>
                            <h2>No, question published yet</h2>
                        <?php else: ?>
                            <?php foreach($questionMark as $questionMarks): ?>
                                <h2>
                                    <a href="<?php echo e(action('questionController@show',[$questionMarks->id])); ?>" > <?php echo e($questionMarks->title); ?></a>
                                </h2>
                                <br>
                                <p>Created at: <?php echo e(\Carbon\Carbon::createFromTimeStamp(strtotime($questionMarks->created_at))->diffForHumans()); ?> | By :<a href="<?php echo e(action('userController@getUser',[$questionMarks->user['id']])); ?>"><?php echo e(ucfirst( $questionMarks->user['username'])); ?></a> | Tag:<a href="<?php echo e(action('tagController@description',[$questionMarks->tag_id])); ?> "><?php echo e(ucfirst($questionMarks->tag['tag_name'])); ?></a> </p>

                                <hr>

                            <?php endforeach; ?>

                            <?php echo e($questionMark->render()); ?>

                         <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>



</div>
</div>
