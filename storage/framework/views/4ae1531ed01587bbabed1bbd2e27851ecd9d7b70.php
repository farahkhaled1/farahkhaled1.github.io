<?php $__env->startSection('guest'); ?>
    <?php if(\Request::is('login/forgot-password')): ?> 
        <?php echo $__env->make('layouts.navbars.guest.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?> 
    <?php else: ?>
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <?php echo $__env->make('layouts.navbars.guest.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        <?php echo $__env->yieldContent('content'); ?>        
        <?php echo $__env->make('layouts.footers.guest.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/farahkhaled/Desktop/seopro/resources/views/layouts/user_type/guest.blade.php ENDPATH**/ ?>