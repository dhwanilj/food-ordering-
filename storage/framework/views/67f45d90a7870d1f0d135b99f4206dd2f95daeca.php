<?php $__env->startSection('title'); ?>
    Dish Image
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>  
    Images<br>
    <h1><?php echo e($dish->name); ?></h1>
    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <img src="<?php echo e(url($image->pivot->image)); ?>"><br>
        
        Name of the uploader:<?php echo e($image->name); ?><br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <a href='<?php echo e(url("dishImage/$id/edit")); ?>'>Add More Images</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment2/resources/views/view_dish_image.blade.php ENDPATH**/ ?>