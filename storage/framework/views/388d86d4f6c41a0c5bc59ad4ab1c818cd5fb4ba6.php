<?php $__env->startSection('container'); ?>

<section id="blog" class="py-5" style="margin-top: 60px">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8 mx-auto text-center">
                <h1 class="artikel-title fw-bold text-gradient"><?php echo e($title); ?></h1>
                <p class="text-muted">Explore our latest articles and updates</p>
            </div>
        </div>

        
        <div class="row justify-content-center mb-5">
<div class="col-md-6">
    <form action="/posts">
        <?php if(request('category')): ?>
            <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
        <?php endif; ?>
        <?php if(request('author')): ?>
            <input type="hidden" name="author" value="<?php echo e(request('author')); ?>">
        <?php endif; ?>

        <div class="input-group shadow-sm rounded-pill overflow-hidden border border-success">
            <span class="input-group-text bg-white border-0 px-3">
                <i class="bi bi-search text-success"></i>
            </span>
            <input type="text" 
                   class="form-control border-0 px-3 py-2" 
                   placeholder="🔍 Cari postingan..." 
                   name="search" 
                   value="<?php echo e(request('search')); ?>">
            <button class="btn px-4 text-white" 
                    type="submit" 
                    style="background-color: #1ed6b2; border: none;">
                Cari
            </button>
        </div>
    </form>
</div>

        </div>

        <?php if($posts->count()): ?>
            <div class="row">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 mb-4 d-flex">
                        <div class="modern-card cyber-border w-100 shadow-sm rounded-4 overflow-hidden">
                            <div class="card-image mt-2">
                                <img src="<?php echo e($post->image ? Storage::url($post->image) : asset('img/tb.png')); ?>"
                                        class="<?php echo e($post->image ? '' : 'd-block mx-auto'); ?>"
                                        style="<?php echo e($post->image ? '' : 'width: 35%; height: 100%;'); ?>">
                            </div>
                            <div class="card-content d-flex flex-column p-3">
                                <h5 class="card-title mb-2">
                                    <a href="/posts/<?php echo e($post->slug); ?>" class="text-dark fw-semibold text-decoration-none"><?php echo e($post->title); ?></a>
                                </h5>
                                <p class="small text-muted mb-2">
                                    By <a href="/posts?author=<?php echo e($post->author->username); ?>" class="text-decoration-none fw-medium"><?php echo e($post->author->name); ?></a> • <?php echo e(date('M d, Y', strtotime($post->created_at))); ?>

                                </p>
                                <p class="card-text text-secondary mb-3"><?php echo e($post->excerpt); ?></p>
                                <a href="/posts/<?php echo e($post->slug); ?>" class="btn btn-outline-success btn-sm mt-auto">Read More →</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <p class="text-center fs-4">No Post Found</p>
        <?php endif; ?>

        <div class="d-flex justify-content-end mt-4">
            <?php echo e($posts->links()); ?>

        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a/projectAldi/TTIS-CSIRT/resources/views/posts.blade.php ENDPATH**/ ?>