

<?php $__env->startSection('container'); ?>
    <!-- Service Section -->
    <div class="container py-5" style="margin-top: 8rem;">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10 text-center">
                <?php $__currentLoopData = $profils->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h1 class="fw-bold text-gradient mb-4">Layanan <?php echo e($profil->name); ?></h1>
                    <p class="text-muted">Berikut adalah berbagai layanan keamanan siber yang disediakan oleh TTIS Kabupaten Tulang Bawang untuk menjaga integritas, ketersediaan, dan kerahasiaan informasi di lingkungan pemerintah daerah.</p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <article class="fs-6" style="line-height: 1.8;">
                            <?php $__currentLoopData = $services->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $service->content; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a/projectAldi/TTIS/resources/views/service.blade.php ENDPATH**/ ?>