<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow justify-content-between">
  <div class="container-fluid">
    <?php $__currentLoopData = $profils->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a class="navbar-brand bg-dark col-md-3 col-lg-2 me-1 px-4 fs-6" href="/"><strong><?php echo e($profil->name); ?></strong></a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="form-control-dark w-100"></div>

    <div class="navbar-dark" style="margin-right: 6rem">
        <?php if(auth()->guard()->check()): ?>
        <ul class="text-decoration-none m-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white fs-6" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <strong><?php echo e(auth()->user()->name); ?></strong>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item py-1" href="/register/showChangePasswordGet">Change Password <span data-feather="key"></span></a></li>              
              <li>
                <form action="/logout" method="post">
                  <?php echo csrf_field(); ?>
                  <button type="submit" class="dropdown-item nav-link text-dark px-3 border-0">Logout <span data-feather="log-out"></span></button>
                </form>
              </li>
          </li>
        </ul>
        <?php endif; ?>
    </div>
  </div>
</header><?php /**PATH /home/a/projectAldi/TTIS/resources/views/dashboard/layouts/header.blade.php ENDPATH**/ ?>