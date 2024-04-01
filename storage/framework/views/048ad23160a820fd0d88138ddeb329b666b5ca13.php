<?php $__env->startSection('title'); ?>
    Order Successful
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <h1>Order Successful</h1>
    <h3>The order for <?php echo e($dish->name); ?> has been placed.</h3>
    <?php if(($dish->discount)==NULL): ?>
        <h3>The price is $<?php echo e($dish->price); ?>.</h3>
    <?php else: ?>
        <h3>The price is $<?php echo e($dish->discounted_price); ?>.</h3>
    <?php endif; ?>
    <h3>It will be delivered to <?php echo e($customer->address); ?>.</h3>

    
    <a href='<?php echo e(url("user")); ?>'>Start New Order</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment2/resources/views/order_complete.blade.php ENDPATH**/ ?>