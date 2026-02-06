<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            <?php $__currentLoopData = $properties->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <img class="logo img-fluid" src="<?php echo e(route('images.serve', $property->slug)); ?>"
                    alt="<?php echo e($property->property); ?>">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-white" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('/') ? 'active' : ''); ?>" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('profil') ? 'active' : ''); ?>" href="/profil">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('posts') ? 'active' : ''); ?>" href="/posts">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('file') ? 'active' : ''); ?>" href="/file">RFC2350</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('service') ? 'active' : ''); ?>" href="/service">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('guidance') ? 'active' : ''); ?>" href="/guidance">Panduan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('contact') ? 'active' : ''); ?>" href="/contact">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navigation Bar -->
<?php /**PATH /home/user/project/TTIS-CSIRT/resources/views/layouts/navbar.blade.php ENDPATH**/ ?>