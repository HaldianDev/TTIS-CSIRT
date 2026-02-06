<?php $__env->startSection('container'); ?>
    <!-- Profil Section -->
    <div class="container" style="margin-top:120px">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <?php $__currentLoopData = $profils->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h1 class="mb-5">Profil  <?php echo e($profil->name); ?></h1>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div style="text-align: center;">
                    <a class="navbar-brand" href="/">
                        <img src="../img/logo.png" alt="" style="width: 150px; height: 150px;">
                    </a>
                </div>
                <article class="my-3 fs-6">
                    <?php $__currentLoopData = $profils->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $profil->content; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </article>
                

            </div>
        </div>
    </div> 
    <!-- End Profil Section -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a/projectAldi/TTIS-CSIRT/resources/views/profil.blade.php ENDPATH**/ ?>