

<?php $__env->startSection('container'); ?>

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3"><?php echo e($profil->name); ?></h1>

            <a href="/dashboard/profils" class="btn btn-success"><span data-feather="arrow-left"></span> Back</a>
            <a href="/dashboard/profils/<?php echo e(($profil->slug)); ?>/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/profils/<?php echo e(($profil->slug)); ?>" method="post" class="d-inline">
                <?php echo method_field('delete'); ?>
                <?php echo csrf_field(); ?>
                <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
            </form>
            
           
            <article class="my-3 fs-6">
                <?php echo $profil->content; ?>

            </article>

        </div>
    </div>
</div> 

<?php $__env->stopSection(); ?>


<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a/projectAldi/TTIS/resources/views/dashboard/profils/show.blade.php ENDPATH**/ ?>