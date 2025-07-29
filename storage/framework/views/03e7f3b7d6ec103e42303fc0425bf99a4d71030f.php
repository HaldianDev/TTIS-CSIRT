

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">File Panduan</h1>
    </div>

    <?php if(session()->has('success')): ?>
      <div class="alert alert-success col-lg-10" role="alert">
        <?php echo e(session('success')); ?>

      </div> 
    <?php endif; ?>

    <div class="table-responsive col-lg-10 mb-4">
      <a href="/dashboard/guidances/create" class="btn btn-primary mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Upload">Upload a New File</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Size</th>
              <th scope="col">File Path</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $__currentLoopData = $guidances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guidance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($guidance->name); ?></td>
                <td><?php echo e(number_format(round($guidance->size / 1024, 2),2,",",".")); ?> Kb</td>
                <td><?php echo e($guidance->path); ?></td>
                <td>
                    <a href="/dashboard/guidances/<?php echo e($guidance->slug); ?>/edit" class="badge bg-warning text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span data-feather="edit"></span></a>
                    <form action="/dashboard/guidances/<?php echo e($guidance->slug); ?>" method="post" class="d-inline">
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
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a/projectAldi/TTIS/resources/views/dashboard/guidances/index.blade.php ENDPATH**/ ?>