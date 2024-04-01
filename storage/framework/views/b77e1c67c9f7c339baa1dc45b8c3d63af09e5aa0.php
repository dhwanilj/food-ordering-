<?php $__env->startSection('title'); ?>
    Add New Dish
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    
    <form method="POST" action='<?php echo e(url("dishes")); ?>'>
        <?php echo e(csrf_field()); ?>

        <br>
        <p><label>Name:</label><input type='text' name='name' value="<?php echo e(old('name')); ?>"><br>
        <?php if(count($errors->get('name'))>0): ?>
        <div class="alert">
            *<?php echo e($errors->first('name')); ?>

        </div>
        <?php endif; ?>
        </p>
        <p><label>Description:</label><input type='text' name='description' value="<?php echo e(old('description')); ?>"><br>
        </p>
        <p><label>Price:</label><input type='text' name='price' value="<?php echo e(old('price')); ?>"><br>
        <?php if(count($errors->get('price'))>0): ?>
        <div class ="alert">
            *<?php echo e($errors->first('price')); ?>

        </div>
        <?php endif; ?>
        </p>
        <p>
        <label>Discount:</label><input type='text' name='discount' value="<?php echo e(old('discount')); ?>"><br>
        <?php if(count($errors->get('discount'))>0): ?>
        <div class ="alert">
            *<?php echo e($errors->first('discount')); ?>

        </div>
        <?php endif; ?>
        </p>
        <p>
        <label>Click to add:</label>
        <input type='submit' value='Add'>
        </p>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment2/resources/views/add_dishes.blade.php ENDPATH**/ ?>