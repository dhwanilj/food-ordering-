<!DOCTYPE html>
<html>
<head>
    <title> <?php echo $__env->yieldContent('title'); ?></title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>">
</head>

<body>
    <div class="nav">
        <ul class="navbar">
            <li>Food Delivery</li>
            <?php if(auth()->guard()->check()): ?>
                <li><?php echo e(Auth::user()->name); ?></li>
                <li><?php echo e(Auth::user()->role); ?></li>
                <form method='POST' action="<?php echo e(url('/logout')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <li><input type="submit" value="Logout"></li>
                </form>
            <?php else: ?>
                <li><a href ="<?php echo e(route('login')); ?>">Login</a></li>
                <li><a href ="<?php echo e(route('register')); ?>">Register</a></li>
            <?php endif; ?>
            <li><a href='<?php echo e(url("user")); ?>'>Home</a></li>
            <?php if(Auth::check()): ?>
                <?php if(Auth()->user()->role == 'Restaurant'): ?>
                    <td><li><a href='<?php echo e(url("order")); ?>'>Orders</a></li></td>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(Auth::check()): ?>
                <?php if(Auth()->user()->role == 'Customer'): ?>
                    <td><li><a href='<?php echo e(url("favourite")); ?>'>Favourites</a></li></td>
                <?php endif; ?>
            <?php endif; ?>
            <li><a href='<?php echo e(url("top_5")); ?>'>Top 5 Dishes</a></li>
            <?php if(Auth::check()): ?>
                <?php if(Auth()->user()->role == 'admin'): ?>
                    <li><a href='<?php echo e(url("restaurant_application")); ?>'>Applicants</a></li>
                <?php endif; ?>
            <?php endif; ?>
            <li><a href='<?php echo e(url("documentation")); ?>'>Documentation</a></li>
        </ul>
    </div>
    <?php echo $__env->yieldContent('content'); ?>
</body>
</html><?php /**PATH /var/www/html/webAppDev/assignment2_submit/resources/views/layouts/master.blade.php ENDPATH**/ ?>