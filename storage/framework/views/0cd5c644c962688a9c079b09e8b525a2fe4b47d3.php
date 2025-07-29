

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile</h1>
    </div>

    <?php if(session()->has('success')): ?>
      <div class="alert alert-success col-lg-10" role="alert">
        <?php echo e(session('success')); ?>

      </div> 
    <?php endif; ?>

    <div class="table-responsive col-lg-10 mb-5">
      <a href="/dashboard/profils/create" class="btn btn-primary mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Create">Create Profile</a> 
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Link Ticketing</th>
              <th scope="col">Content</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $__currentLoopData = $profils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($profil->name); ?></td>
                <td><?php echo e($profil->link); ?></td>
                <td><?php echo e($profil->content); ?></td>
                <td>
                  <a href="/dashboard/profils/<?php echo e(($profil->slug)); ?>" class="badge bg-info text-decoration-none d-inline" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"><span data-feather="eye"></span></a>
                  <a href="/dashboard/profils/<?php echo e(($profil->slug)); ?>/edit" class="badge bg-warning text-decoration-none d-inline" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span data-feather="edit"></span></a>
                  <form action="/dashboard/profils/<?php echo e(($profil->slug)); ?>" method="post" class="d-inline">
                    <?php echo method_field('delete'); ?>
                    <?php echo csrf_field(); ?>
                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span data-feather="x-circle"></span></button>
                  </form>
                </td>
              </tr>    
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a/projectAldi/TTIS/resources/views/dashboard/profils/index.blade.php ENDPATH**/ ?>