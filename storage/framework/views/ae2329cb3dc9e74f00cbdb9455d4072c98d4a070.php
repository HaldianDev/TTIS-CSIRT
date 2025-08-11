

<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create a New Service</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/services" class="mb-5">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" required autofocus value="<?php echo e(old('name')); ?>">
              <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Content</label>
              <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                 <p class="text-danger"><?php echo e($message); ?></p> 
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              <input id="content" type="hidden" name="content" value="<?php echo e(old('content')); ?>">
              <trix-editor class="trix-content" input="content"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary">Create Service</button>
        </form>
    </div>

    <script nonce="<?php echo e(csp_nonce()); ?>">
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a/projectAldi/TTIS/resources/views/dashboard/services/create.blade.php ENDPATH**/ ?>