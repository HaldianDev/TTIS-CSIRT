<!-- Hero Section -->
<div class="hero vh-100 d-flex align-items-center" id="home" style="background: linear-gradient(135deg, #0d0d0d, #1a0033);">
    <div class="container">
        <div class="row align-items-center">
            <!-- Kolom Teks (kiri) -->
            <div class="col-md-6 text-white text-center text-md-start order-md-1" data-aos="fade-right">
                <?php $__currentLoopData = $profils->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h1 class="display-3 fw-bold" style="color:white; font-family: 'Courier New', monospace;">
                        <?php echo e($profil->name); ?>

                    </h1>
                    <p class="lead mt-3" style="font-family: monospace;">
                        <?php echo e(Illuminate\Support\Str::limit(trim(html_entity_decode(strip_tags($profil->content))), 200)); ?>

                    </p>
                    <div class="mt-4">
                        <a href="/profil" class="btn btn-outline-light me-2 btn-rounded">Request Info</a>
                        <a href="<?php echo e($profil->link); ?>" target="_blank" class="btn btn-primary btn-rounded" style="background-color: #ffc107; border: none;">
                            Laporkan Insiden
                        </a>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Kolom Gambar (kanan) -->
            <div class="col-md-6 mb-4 mb-md-0 order-md-2 text-center" data-aos="zoom-in">
                <img src="<?php echo e(asset('img/a.png')); ?>" alt="Cyber Security" class="img-fluid floating-image" style="max-height: 400px;">
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->
<?php /**PATH /home/a/projectAldi/TTIS/resources/views/layouts/hero.blade.php ENDPATH**/ ?>