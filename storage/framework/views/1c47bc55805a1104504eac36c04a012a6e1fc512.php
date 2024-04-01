<?php $__env->startSection('title'); ?>
    Favourites
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <h1>Favourites</h1>
    <ol>
        
        <?php $__currentLoopData = $favourites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favourite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($favourite->name); ?>:<?php echo e($favourite->restaurant_id); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ol>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment2/resources/views/favourite.blade.php ENDPATH**/ ?>