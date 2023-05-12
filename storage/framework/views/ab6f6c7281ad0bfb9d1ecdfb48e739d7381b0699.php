<form method="POST" action="<?php echo e(route('scrape')); ?>">
    <?php echo csrf_field(); ?>

    <label for="website_url">Website URL:</label>
    <input type="text" name="website_url" id="website_url" value="<?php echo e(old('website_url')); ?>" required>

    <button type="submit">Scrape</button>
</form>


<?php /**PATH F:\last semester\final project\seopro\resources\views/scrape.blade.php ENDPATH**/ ?>