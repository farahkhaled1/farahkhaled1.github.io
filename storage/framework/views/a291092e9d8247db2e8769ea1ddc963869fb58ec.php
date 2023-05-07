



<!DOCTYPE html>
<html>
<head>
    <title>Convert Website Images to WebP</title>
</head>
<body>
    <h1>Convert Website Images to WebP</h1>

    <?php if($errors->any()): ?>
        <div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('convert')); ?>">
        <?php echo csrf_field(); ?>
        <div>
            <label for="website_url">Website URL:</label>
            <input type="url" name="website_url" required>
        </div>
        <button type="submit">Convert</button>
    </form>
</body>
</html> 







<?php /**PATH /Users/farahkhaled/Desktop/seopro/resources/views/website_image.blade.php ENDPATH**/ ?>