<?php $__env->startSection('content'); ?>

<html>
   

<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">SEOPro Blog Idea Generator</h3>
                  <p class="mb-0">No More Writer's Block!</p>
                </div>
                <div class="card-body">


                    <form role="form" method="POST" action=" <?php echo e(route('result')); ?> ">
                        <?php echo csrf_field(); ?>
                        <label>Enter your topic below:</label><br><br>
                        <div class="mb-3">

                        <input class="form-control" type="text" name="topic" placeholder="place new topic"><br><br>
                      </div>

                        <div class="text-center">
                        <button type="button" class="btn bg-gradient-info w-100" style="">Generate</button>
                      </div>
                    </form>
            
                    <?php if(isset($result)): ?>
                  
                        <div style="white-space: pre-line">  <p class="mb-0"><?php echo e($result); ?></p> </div>
                    
                    <?php endif; ?>




               
                </div>
              
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.user_type.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Volumes/University/seopro/resources/views/laravel-examples/ai.blade.php ENDPATH**/ ?>