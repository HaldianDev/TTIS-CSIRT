    <!-- Footer Section -->
    <footer class="sticky-footer" id="contact">
        <div class="footer-top">
          <div class="container-fluid px-4">
            <div class="row gy-3 d-flex justify-content-between">
              <div class="col-md-3">
                <h4 class=" text-white">Article Category</h4>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="/posts?category=<?php echo e($category->slug); ?>" class="d-block"><?php echo e($category->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <div class="col-md-3">
                <h4 class="text-white">Latest Article</h4>
                  <?php $__currentLoopData = $posts->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="/posts/<?php echo e($post->slug); ?>" class="d-block"><?php echo e($post->title); ?></a>   
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
              </div>
              <div class="col-md-3 ms-auto">
                <h4 class="text-white">Contact</h4>
                <?php $__currentLoopData = $footers->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <ul class="list-unstyled">
                    <li><?php echo e($footer->address); ?></li>
                    <li>Email : <?php echo e($footer->email); ?></li>
                    <li>Telephone : <?php echo e($footer->telephone); ?></li>
                    <?php $__currentLoopData = $keys->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li>PGP key dapat diunduh <a href="<?php echo e('storage/' .  $key->path); ?>"> disini</a> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
              <div class="col-md-3 map">
                <?php $__currentLoopData = $footers->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $footer->maps; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom py-3">
          <div class="container">
            <div class="row">
              <div class="text-center">
                <small>
                  Copyright &copy; <?php echo e(date('Y')); ?>  <?php $__currentLoopData = $profils->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><span class="text-white mx-2"><?php echo e($profil->name); ?> .</span> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  All Rights Reserved
                </small>
              </div>
            </div>
            </div>
          </div>
        </div>
    </footer>
    <!-- End Footer Section -->


    


<?php /**PATH /home/a/projectAldi/TTIS-CSIRT/resources/views/layouts/footer.blade.php ENDPATH**/ ?>