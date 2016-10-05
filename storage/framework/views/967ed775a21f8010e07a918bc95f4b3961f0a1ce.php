<div class="col-md-4">

    <div class="sidebar-item  recent">

        <h3>Top User</h3>
        <div class="media">
            <?php foreach($topUser as $ids): ?>

                    <div class="pull-left">
                        <a  href="#"><?php if($ids->badges==1): ?> <img style="height:45px;" src="<?php echo e(URL::asset('asset/images/services/1s.png')); ?>"> <?php elseif($ids->badges==2): ?><img style="height:45px;" src="<?php echo e(URL::asset('asset/images/services/2s.png')); ?>"><?php elseif($ids->badges==3): ?><img style="height:45px;" src="<?php echo e(URL::asset('asset/images/services/3s.png')); ?>"><?php elseif($ids->badges==4): ?><img style="height:45px;" src="<?php echo e(URL::asset('asset/images/services/4s.png')); ?>"> <?php else: ?> <img style="height:45px;" src="<?php echo e(URL::asset('asset/images/services/premium.png')); ?>"> <?php endif; ?></a>

                    </div>
                    <div class="media-body">
                        <h4><a href="<?php echo e(action('userController@getUser',[$ids->id])); ?>">  <?php echo e(ucfirst($ids->username)); ?></a></h4>
                        <h5>Rating: <?php echo e($ids->rating); ?></h5>
                    </div>
                    <hr>
            <?php endforeach; ?>
        </div>

    </div>
    <div class="sidebar-item  recent">
        <h3>Adds</h3>
    <div class="col-sm-11 col-xs-2">
        <div class="team-single-wrapper">
            <div class="team-single">
                <div class="person-thumb">
                  <a href="#"><img src="<?php echo e(URL::asset('asset/images/services/add1.jpg')); ?>" class="img-responsive" alt=""></a>
                </div>

            </div>

        </div>
    </div>
    </div>
</div>