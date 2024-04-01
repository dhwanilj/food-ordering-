<?php $__env->startSection('title'); ?>
    Top 5 Dishes
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <div class="centre">
        <h1>Top 5 Dishes</h1><br><br>
        <table class="bordered"> 
            <tr><th>Name</th><th>Restaurant</th><th>Orders</th></tr>
            <?php $__currentLoopData = $top_dishes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top_dish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr><td><?php echo e($top_dish->dish_name); ?></td><td><?php echo e($top_dish->restaurant_name); ?></td><td><?php echo e($top_dish->total_ordered); ?></td></tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <br>
        <a href='<?php echo e(url("user")); ?>'>Home</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment2/resources/views/top_5_dishes.blade.php ENDPATH**/ ?>