

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User Management</h1>
    </div>

    <?php if(session()->has('success')): ?>
      <div class="alert alert-success col-lg-8" role="alert">
        <?php echo e(session('success')); ?>

      </div> 
    <?php endif; ?>

    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Admin</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($user->name); ?></td>
                <td><?php echo e($user->username); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td> <?php if($user->is_admin): ?> Admin <?php else: ?> User <?php endif; ?> </td>  
                <td>
                  <a href="/dashboard/users/<?php echo e($user->username); ?>/edit" class="badge bg-warning text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span data-feather="edit"></span> EDIT</a>
                </td>
              </tr>    
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a/projectAldi/TTIS/resources/views/dashboard/users/index.blade.php ENDPATH**/ ?>