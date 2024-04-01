<?php $__env->startSection('title'); ?>
    Add New Image
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    
    <form method="POST" action='<?php echo e(url("dishImage")); ?>' enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="dish_id" value="<?php echo e($dish_id); ?>">
        <p>
            <input type="file" name="image">
        </p>
        <p>
            <input type="submit" value="Add Image">
        </p>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment2/resources/views/add_image.blade.php ENDPATH**/ ?>