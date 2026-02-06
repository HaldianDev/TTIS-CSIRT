<?php $__env->startSection('container'); ?>

    <div class="container" style="margin-top: 8rem">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3"><?php echo e($post->title); ?></h1>

                <p>By <a href="/posts?author=<?php echo e($post->author->username); ?>" class="text-decoration-none"><?php echo e($post->author->name); ?></a> in <a href="/posts?category=<?php echo e($post->category->slug); ?>" class="text-decoration-none"><?php echo e($post->category->name); ?></a></p>

                <div style="max-height: 400px; overflow:hidden">
                    <img src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="<?php echo e($post->category->name); ?>" class="img-fluid"> 
                </div>
  
                <article class="my-4 fs-6">
                    <?php echo $post->body; ?>

                </article>

                <a href="/posts" class="d-block mt-3">Back to Posts</a>
            </div>
        </div>
    </div> 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/user/project/TTIS-CSIRT/resources/views/post.blade.php ENDPATH**/ ?>