<?php $__env->startSection('title'); ?>
    Applicants
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 
    <table class="bordered"> 
        <tr><th>Name</th><th>Address</th><th>Email</th><th>Approve</th></tr>
        <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr><td><?php echo e($restaurant->name); ?></td><td><?php echo e($restaurant->address); ?></td><td><?php echo e($restaurant->email); ?></td>
            <td>
                <form method='POST' action='<?php echo e(url("user")); ?>'>
                    <?php echo csrf_field(); ?>
                    <input type='hidden' name='id' value='<?php echo e($restaurant->id); ?>'>
                    <input type='hidden' name='name' value='<?php echo e($restaurant->name); ?>'>
                    <input type='hidden' name='address' value='<?php echo e($restaurant->address); ?>'>
                    <input type='hidden' name='email' value='<?php echo e($restaurant->email); ?>'>
                    <input type='hidden' name='role' value='<?php echo e($restaurant->role); ?>'>
                    <input type='hidden' name='password' value='<?php echo e($restaurant->password); ?>'>
                    <input type='submit' value='Approve'>
                </form>
            </td></tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/webAppDev/assignment2/resources/views/applicants.blade.php ENDPATH**/ ?>