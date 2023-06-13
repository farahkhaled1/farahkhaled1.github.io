<!-- <!DOCTYPE html>
<html>
    <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card">
                <div class="card-header pb-0 text-left bg-transparent">
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

</body>
</html>  -->









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
                  <h3 class="font-weight-bolder text-info text-gradient">Convert Website Images to WebP</h3>
                  <p class="mb-0">Convert Website Images to WebP</p>
                </div>
                <div class="card-body">


                    <form method="POST" action=" <?php echo e(route('convert')); ?> ">
                        <?php echo csrf_field(); ?>
                        <label for= "website_url">Enter your website below:</label><br><br>
                        <div class="mb-3">

                        <input class="form-control" type="url" name="website_url" placeholder="website_url"><br><br>
                      </div>

                        <div class="text-center">
                        <button  type="submit" class="btn bg-gradient-info w-100" style="">Convert Images</button>
                        
                      </div>
                    </form>
            
                    




               
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
<?php echo $__env->make('layouts.user_type.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/farahkhaled/Desktop/seopro-1/resources/views/website_image.blade.php ENDPATH**/ ?>