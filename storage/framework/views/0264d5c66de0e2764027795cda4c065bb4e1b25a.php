<?php $__env->startSection('title'); ?>
    Orders
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <div class='centre'>
    <h1>Orders</h1>
    <table class="bordered"> 
        <tr><th>Customer</th><th>Address</th><th>Dish</th><th>Date&Time</th></tr>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr><td><?php echo e($order->customer_name); ?></td><td><?php echo e($order->customer_address); ?></td><td><?php echo e($order->dish_name); ?></td><td><?php echo e($order->created_at); ?></td></tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </table>
    <a href='<?php echo e(url("user")); ?>'>Home</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment2/resources/views/orders_restaurant.blade.php ENDPATH**/ ?>