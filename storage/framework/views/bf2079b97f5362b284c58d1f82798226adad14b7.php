<?php $__env->startSection('title'); ?>
    Home Page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <div class="centre">
        <h1>Restaurants</h1><br><br>
        <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h3><a href='<?php echo e(url("user/$restaurant->id")); ?>'><?php echo e($restaurant->name); ?></a></h3><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($restaurants->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment2_submit/resources/views/home.blade.php ENDPATH**/ ?>