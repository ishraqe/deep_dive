<?php $__env->startSection('title'); ?>
Deep Dive
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('content.left_content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('content.right_content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>