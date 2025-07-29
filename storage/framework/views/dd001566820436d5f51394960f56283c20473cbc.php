

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    <?php if(session()->has('success')): ?>
      <div class="alert alert-success col-lg-10" role="alert">
        <?php echo e(session('success')); ?>

      </div> 
    <?php endif; ?>

    <div class="table-responsive col-md-10 mb-5">
      <a href="/dashboard/posts/create" class="btn btn-primary mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Create">Create a New Post</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?> <th scope="col">Author</th> <?php endif; ?>
              <th scope="col">Category</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($post->title); ?></td>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?> <td><?php echo e($post->author->name); ?></td> <?php endif; ?>
                <td><?php echo e($post->category->name ?? ''); ?></td>
                <td><?php echo e($post->published ? 'Publish' : 'Unpublish'); ?></td>
                <td>
                  <a href="/dashboard/posts/<?php echo e($post->slug); ?>" class="badge bg-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"><span data-feather="eye"></span></a>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                    <a href="/dashboard/posts/<?php echo e($post->slug); ?>/edit" class="badge bg-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span data-feather="edit"></span></a>
                    <form action="/dashboard/posts/<?php echo e($post->slug); ?>" method="post" class="d-inline">
                      <?php echo method_field('delete'); ?>
                      <?php echo csrf_field(); ?>
                      <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span data-feather="x-circle"></span></button>
                    </form>
                  <?php endif; ?>
                </td>
              </tr>    
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a/projectAldi/TTIS/resources/views/dashboard/posts/index.blade.php ENDPATH**/ ?>