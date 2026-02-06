<!-- Hero Section -->
<div class="hero min-vh-100 d-flex align-items-center" id="home" style="background: linear-gradient(135deg, #0d0d0d, #1a0033);">
    <div class="container">
        <div class="row align-items-center">
            <!-- Kolom Teks -->
            <div class="col-12 mt-2 col-md-6 text-white text-center text-md-start mb-4 mb-md-0" data-aos="fade-right">
                <?php $__currentLoopData = $profils->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h1 class="hero-title display-4 fw-bold">
                        <?php echo e($profil->name); ?>

                    </h1>
                    <p class="hero-desc lead mt-3">
                        <?php echo e(Illuminate\Support\Str::limit(trim(html_entity_decode(strip_tags($profil->content))), 200)); ?>

                    </p>
                    <div class="mt-4 d-flex flex-column flex-sm-row justify-content-center justify-content-md-start">
                        <a href="/profil" class="btn btn-outline-light me-sm-2 mb-2 mb-sm-0 btn-rounded">Profile</a>
                        <a href="<?php echo e($profil->link); ?>" target="_blank" class="btn btn-warning text-dark btn-rounded" style="border: none; color: #000 !important;">
                            Laporkan Insiden
                        </a>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Kolom Gambar -->
            <div class="col-12 col-md-6 text-center" data-aos="zoom-in">
                <img src="<?php echo e(asset('img/a.png')); ?>" alt="Cyber Security" class="img-fluid floating-image" style="max-height: 400px;">
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/a/projectAldi/TTIS-CSIRT/resources/views/layouts/hero.blade.php ENDPATH**/ ?>