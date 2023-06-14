<?php $__env->startSection('content'); ?>


<div class="row">
  <div class="col-lg-8">
    <div class="card h-10 p-3">
      <h2 class="text-center mb-3" style="text-shadow: 2px 2px 4px #ffffff; font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold;">SEOPro Blog Editor</h2>
      <p class="text-center mb-3" style="text-shadow: 2px 2px 4px #ffffff; font-family: 'Arial', sans-serif; font-size: 18px;">Write engaging blogs with ease</p>

      <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/curved-images/curved0.jpg');">
        <span class="mask bg-gradient-light"></span>
        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
          <form method="post" action="<?php echo e(route('store_blog')); ?>">
            <div class="text-center">
              
                    <?php echo csrf_field(); ?>
              <textarea class="editor col-lg-30 mx-auto" style="height: 400px; width:700px; font-family: 'Arial', sans-serif; font-size: 16px; border-radius: 8px; padding: 10px; border: 1px solid #ccc;" name="blog" id="blog">
               
              </textarea>
              <br>
              <br>
              </div>
              <button type="submit" class="btn btn-success" style="font-family: 'Arial', sans-serif; font-size: 12px; border-radius: 5px; padding: 14px 20px; float: right;">Save</button>

              <a href="<?php echo e(url('/magiceditor')); ?>" >
                <button type="button" class="btn btn-primary" style="font-family: 'Arial', sans-serif; font-size: 12px; border-radius: 5px; padding: 14px 20px; float: left;"><i class="fa fa-magic me-2"></i>Generate</button>
            </a>
              

          </form>
            </div>
          </form>
        
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <h4 class="text-center mb-1" style="text-shadow: 2px 2px 4px #ffffff; font-family: 'Arial', sans-serif; font-size: 20px; font-weight: bold;">Based on your recent search...</h4>
    <h6 class="text-center mb-3" style="text-shadow: 2px 2px 4px #ffffff; font-family: 'Arial', sans-serif; font-size: 16px;">These are the best keywords to use in your blog</h6>
    <div class="card h-100 p-3">
      <div class="row row-cols-2 row-cols-sm-3 g-2">
        <?php $__currentLoopData = \App\Models\Keyword::getKeywords(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col">
            <div class="card draggable-card" draggable="true" data-word="<?php echo e($keyword->word); ?>">
              <div class="card-body">
                <h6 class="mb-0 text-sm" style="white-space: nowrap; "><?php echo e($keyword->word); ?></h6>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
</div>


<script>
    // Drag and drop functionality
    const draggableCards = document.querySelectorAll('.draggable-card');
    const textarea = document.querySelector('.editor');
  
    draggableCards.forEach(card => {
      card.addEventListener('dragstart', handleDragStart);
    });
  
    textarea.addEventListener('dragover', handleDragOver);
    textarea.addEventListener('drop', handleDrop);
  
    function handleDragStart(event) {
      event.dataTransfer.setData('text/plain', event.target.dataset.word);
    }
  
    function handleDragOver(event) {
      event.preventDefault();
    }
  
    function handleDrop(event) {
      event.preventDefault();
      const word = event.dataTransfer.getData('text/plain');
      textarea.value += word + ' ';
    }
  
    // Typewriter effect
    const sentenceElement = document.getElementById('blog');
    let sentence = sentenceElement.innerHTML.trim();
    sentenceElement.innerHTML = '';
  
    let i = 0;
    const speed = 14; // Adjust the speed of typing
  
    function typeWriter() {
      if (i < sentence.length) {
        const char = sentence.charAt(i);
        if (char === '\n') {
          if (sentence.charAt(i + 1) === '\n') {
            sentenceElement.innerHTML += '<br>';
            i++;
          } else {
            sentenceElement.innerHTML += ' ';
          }
        } else {
          sentenceElement.innerHTML += char;
        }
        i++;
        setTimeout(typeWriter, speed);
      }
    }
  
    typeWriter();
  </script>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user_type.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/farahkhaled/Desktop/seopro-1/resources/views/editor.blade.php ENDPATH**/ ?>