<?php $__env->startSection('title'); ?>
    <?php echo e($restaurant->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <div class='centre'>
    <h1><?php echo e($restaurant->name); ?></h1>
    <h2> Dish List</h2>
    <table class="bordered"> 
        <tr><th>Name</th><th>Description</th><th>Price in $</th><th>Discount in %</th><th>Discounted Price in $</th>
        <?php if(Auth::check()): ?>
            <?php if(Auth()->user()->role == 'Restaurant' && Auth()->user()->id == $restaurant->id): ?>
                <th>Edit</th>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(Auth::check()): ?>
            <?php if(Auth()->user()->role == 'Restaurant' && Auth()->user()->id == $restaurant->id): ?>
                <th>Delete</th>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(Auth::check()): ?>
            <?php if(Auth()->user()->role == 'Customer'): ?>
            <th>Buy</th>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(Auth::check()): ?>
            <?php if(Auth()->user()->role == 'Customer'): ?>
            <th>Add Favourite</th>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(Auth::check()): ?>
                <th>Add Image</th>
        <?php endif; ?>
    </tr>
        <?php $__currentLoopData = $dishes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr><td><a href='<?php echo e(url("dishes/$dish->id")); ?>'><?php echo e($dish->name); ?></a></td><td><?php echo e($dish->description); ?></td><td><?php echo e($dish->price); ?></td><td><?php echo e($dish->discount); ?></td><td><?php echo e($dish->discounted_price); ?></td>
            <?php if(Auth::check()): ?>
                <?php if(Auth()->user()->role == 'Restaurant' && Auth()->user()->id == $restaurant->id): ?>
                    <td><a href='<?php echo e(url("dishes/$dish->id/edit")); ?>'>Edit</td>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(Auth::check()): ?>
                <?php if(Auth()->user()->role == 'Restaurant' && Auth()->user()->id == $restaurant->id): ?>
                    <td><form method="POST" action='<?php echo e(url("dishes/$dish->id")); ?>'>
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('DELETE')); ?>

                        <input type="submit" value="Delete">
                    </form></td>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(Auth::check()): ?>
                <?php if(Auth()->user()->role == 'Customer'): ?>
                    <td><form method="POST" action='<?php echo e(url("order")); ?>'>
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="restaurant_id" value="<?php echo e($dish->restaurant_id); ?>">
                        <input type="hidden" name="dish_id" value="<?php echo e($dish->id); ?>">
                        <input type="submit" value="Buy it Now!">
                    </form></td>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(Auth::check()): ?>
                <?php if(Auth()->user()->role == 'Customer'): ?>
                    <td><form method="POST" action='<?php echo e(url("favourite")); ?>'>
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="dish_id" value="<?php echo e($dish->id); ?>">
                        <input type="submit" value="Add Favourite">
                    </form></td>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(Auth::check()): ?>
                <td><a href='<?php echo e(url("dishImage/$dish->id/edit")); ?>'>Add Image</a></td>
            <?php endif; ?>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <?php if(Auth::check()): ?>
        <?php if(Auth()->user()->role == 'Restaurant' && Auth()->user()->id == $restaurant->id): ?>
            <a href='<?php echo e(url("dishes/create")); ?>'>Add New Dish</a>
        <?php endif; ?>
    <?php endif; ?>
    <br>
    <a href='<?php echo e(url("user")); ?>'>Home</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment2/resources/views/dishes.blade.php ENDPATH**/ ?>