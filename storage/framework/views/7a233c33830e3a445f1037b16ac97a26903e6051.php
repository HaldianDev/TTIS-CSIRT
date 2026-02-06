<?php $__env->startSection('container'); ?>
    <!-- Blog Section -->
    <section id="blog" class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-8 mx-auto text-center">
                    <h1 class="fw-bold text-gradient">Latest Post</h1>
                </div>
            </div>

            <?php if($posts->count()): ?>
                <div class="row">
                    <?php $__currentLoopData = $posts->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-sm-6 mb-4 d-flex">
                            <div class="modern-card cyber-border w-100">
                                <div class="card-image mt-2">


                                    <img src="<?php echo e($post->image ? route('posts.image', $post->slug) : asset('img/tb.png')); ?>"
                                        class="<?php echo e($post->image ? '' : 'd-block mx-auto'); ?>"
                                        style="<?php echo e($post->image ? '' : 'width: 35%; height: 100%;'); ?>">
                                </div>
                                <div class="card-content d-flex flex-column p-3">
                                    <h5 class="card-title mb-2">
                                        <a href="/posts/<?php echo e($post->slug); ?>"
                                            class="text-dark fw-semibold"><?php echo e($post->title); ?></a>
                                    </h5>
                                    <p class="small text-muted mb-2">
                                        By <a href="/posts?author=<?php echo e($post->author->username); ?>"
                                            class="text-decoration-none fw-medium"><?php echo e($post->author->name); ?></a>
                                        • <?php echo e(date('M d, Y', strtotime($post->created_at))); ?>

                                    </p>
                                    <p class="card-text mb-3 text-secondary"><?php echo e($post->excerpt); ?></p>
                                    <a href="/posts/<?php echo e($post->slug); ?>"
                                        class="btn btn-outline-success btn-sm mt-auto align-self-start">Read More →</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="text-center fs-4">No Post Found</p>
            <?php endif; ?>
            <div class="d-flex justify-content-center mt-4">
                <a href="/posts" class="btn btn-lg fw-semibold shadow rounded-pill text-white"
                    style="background: linear-gradient(to right, #1ed6b2, #0c8c7b); border: none;" data-aos="zoom-in"
                    data-aos-delay="200" target="_blank">
                    📰 Berita Lainnya
                </a>
            </div>
        </div>


    </section>
    <!-- Email Encryption Section -->
    <section>
        <div class="container">
            <div
                class="bg-gradient-dark rounded-4 p-5 p-xl-6 shadow-lg text-center position-relative overflow-hidden encryption-section">
                <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10"
                    style="background-image: url('<?php echo e(route('images.asset', 'encryption-bg.svg')); ?>'); background-size: cover;">
                </div>
                <div class="container my-5">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8 text-center position-relative px-3">
                            <h3 class="display-5 fw-bold text-white mb-3">
                                <!-- Komunikasi e-mail <span class="text-warning">terenkripsi</span>? -->
                                Komunikasi <span style="white-space: nowrap;">e-mail</span> <span
                                    class="text-warning">terenkripsi</span>?
                            </h3>
                            <p class="fs-6 fs-md-5 text-light mb-3 px-3 px-md-0 text-center text-md-start">
                                Gunakan <strong>Pretty Good Privacy (PGP)</strong> untuk menjaga keamanan data Anda dari
                                ancaman siber.
                            </p>

                            <?php if($keys->first()): ?>
                                <a href="<?php echo e(route('keys.serve', $keys->first()->name)); ?>"
                                    class="btn btn-warning btn-lg fw-semibold shadow rounded-pill text-white"
                                    data-aos="zoom-in" data-aos-delay="200" target="_blank">
                                    🔐 Unduh PGP Key
                                </a>
                            <?php else: ?>
                                <p class="text-light">PGP Key belum tersedia.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Email Encryption Section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/user/project/TTIS-CSIRT/resources/views/home.blade.php ENDPATH**/ ?>