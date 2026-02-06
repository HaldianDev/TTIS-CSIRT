<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Footer</h1>
    </div>

    <?php if(session()->has('success')): ?>
      <div class="alert alert-success col-lg-10" role="alert">
        <?php echo e(session('success')); ?>

      </div> 
    <?php endif; ?>

    <div class="table-responsive col-lg-10 mb-4">
      <a href="/dashboard/footers/create" class="btn btn-primary mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Create">Create a New Footer</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
              <th scope="col">Maps</th>
              <th scope="col">Telephone</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $__currentLoopData = $footers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($footer->name); ?></td>
                <td><?php echo e($footer->address); ?></td>
                <td class="text-break"><?php echo e($footer->maps); ?></td>
                <td><?php echo e($footer->telephone); ?></td>
                <td><?php echo e($footer->email); ?></td>
                <td>
                  <a href="/dashboard/footers/<?php echo e($footer->slug); ?>/edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="badge bg-warning text-decoration-none"><span data-feather="edit"></span></a>
                  <form action="/dashboard/footers/<?php echo e($footer->slug); ?>" method="post" class="d-inline">
                    <?php echo method_field('delete'); ?>
                    <?php echo csrf_field(); ?>
                    <button class="badge bg-danger border-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                  </form>
                </td>
              </tr>    
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a/projectAldi/TTIS-CSIRT/resources/views/dashboard/footers/index.blade.php ENDPATH**/ ?>