<?php $__env->startSection('container'); ?>
<!-- Contact Section -->
<div class="container" style="margin-top: 8rem">
    <div class="row justify-content-center mb-5">
        <div class="col-md-10">
            <div class="p-4 p-md-5 shadow rounded bg-white border border-2 border-light">
                <h1 class="mb-4 text-center fw-bold text-gradient">Hubungi Kami</h1>

                <?php $__currentLoopData = $footers->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-4">
                        <h5 class="fw-semibold"><i class="bi bi-geo-alt-fill text-success"></i> Lokasi <?php echo e($footer->name); ?></h5>
                        <p class="mb-1"><?php echo e($footer->address); ?></p>

                        <div class="map mt-3 rounded overflow-hidden" style="height: 300px">
                            <?php echo $footer->maps; ?>

                        </div>
                    </div>

                    <div class="mb-3">
                        <h5 class="fw-semibold"><i class="bi bi-envelope-fill text-primary"></i> Email</h5>
                        <p class="mb-1">
                            <?php echo e($footer->email); ?>

                            <?php $__currentLoopData = $keys->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <br><i class="bi bi-shield-lock-fill text-warning"></i>
                                <small class="text-muted">Gunakan PGP untuk komunikasi terenkripsi. 
                                    <a href="<?php echo e(asset('storage/' . $key->path)); ?>" class="text-decoration-underline" target="_blank">
                                        🔐 Unduh PGP Key
                                    </a>
                                </small>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <h5 class="fw-semibold"><i class="bi bi-telephone-fill text-danger"></i> Telepon</h5>
                        <p><?php echo e($footer->telephone); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<!-- End Contact Section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a/projectAldi/TTIS-CSIRT/resources/views/contact.blade.php ENDPATH**/ ?>