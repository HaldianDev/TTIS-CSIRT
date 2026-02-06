<?php $__env->startSection('container'); ?>

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3"><?php echo e($post->title); ?></h1>

            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all My Post</a>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                <a href="/dashboard/posts/<?php echo e($post->slug); ?>/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>  
                <form action="/dashboard/posts/<?php echo e($post->slug); ?>" method="post" class="d-inline">
                    <?php echo method_field('delete'); ?>
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>  
            <?php endif; ?>           
              <div style="max-height: 400px; overflow:hidden">
                <img src="<?php echo e(Storage::disk('s3')->url($post->image)); ?>" alt="<?php echo e($post->category->name); ?>" class="img-fluid mt-3"> 
              </div>
           
            <article class="my-3 fs-6">
                <?php echo $post->body; ?>

            </article>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a/projectAldi/TTIS-CSIRT/resources/views/dashboard/posts/show.blade.php ENDPATH**/ ?>