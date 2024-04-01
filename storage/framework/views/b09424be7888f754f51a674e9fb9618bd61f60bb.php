<?php $__env->startSection('title'); ?>
    Edit Dish
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <div class="centre">
        <form method="POST" action='<?php echo e(url("dishes/$dish->id")); ?>'>
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

            <p>
                <label>Name:</label><br>
                <?php if(empty(old('name'))): ?>
                    <input type='text' name='name' value="<?php echo e($dish->name); ?>"><br>
                <?php else: ?>
                    <input type='text' name='name' value="<?php echo e(old('name')); ?>"><br>
                <?php endif; ?>
                <?php if(count($errors->get('name'))>0): ?>
                <div class="alert">
                    *<?php echo e($errors->first('name')); ?>

                </div>
                <?php endif; ?>
            </p>
            <p>
                <label>Description:</label><br>
                <?php if(empty(old('description'))): ?>
                    <input type='text' name='description' value="<?php echo e($dish->description); ?>"><br>
                <?php else: ?>
                    <input type='text' name='description' value="<?php echo e(old('description')); ?>"><br>
                <?php endif; ?>
            </p>
            <p>
                <label>Price:</label><br>
                <?php if(empty(old('price'))): ?>
                    <input type='text' name='price' value="<?php echo e($dish->price); ?>"><br>
                <?php else: ?>
                    <input type='text' name='price' value="<?php echo e(old('price')); ?>"><br>
                <?php endif; ?>
                <?php if(count($errors->get('price'))>0): ?>
                <div class ="alert">
                    *<?php echo e($errors->first('price')); ?>

                </div>
                <?php endif; ?>
            </p>
            <p>
                <label>Discount:</label><br>
                <?php if(empty(old('discount'))): ?>
                    <input type='text' name='discount' value="<?php echo e($dish->discount); ?>">
                <?php else: ?>
                    <input type='text' name='discount' value="<?php echo e(old('discount')); ?>">
                <?php endif; ?>
                <?php if(count($errors->get('discount'))>0): ?>
                <div class ="alert">
                    *<?php echo e($errors->first('discount')); ?>

                </div>
                <?php endif; ?>
            </p>
            <p>
                <input type='submit' value='Update'>
            </p>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment2/resources/views/dish_edit.blade.php ENDPATH**/ ?>