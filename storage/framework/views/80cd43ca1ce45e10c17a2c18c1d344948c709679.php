

<?php $__env->startSection('container'); ?>

<div class="d-flex justify-content-center" style="margin-top: 125px">
    <div class="col-md-4">

      <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?php echo e(session('success')); ?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <?php if(session()->has('loginError')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo e(session('loginError')); ?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
      
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
            <form action="/login" method="post">
              <?php echo csrf_field(); ?>
              <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control rounded <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" placeholder="name@example.com" value="<?php echo e(old('email')); ?>" autofocus required>
                <label for="email">Email Address</label>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                   <div class="invalid-feedback"><?php echo e($message); ?></div> 
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              

              <div class="form-floating mb-3" >
                <input type="password" name="password" class="form-control rounded" autocomplete="off" id="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>
              <div class="form-check m-0">
                <input class="form-check-input" type="checkbox" value="" id="checkPassword">
                <label class="form-check-label" for="flexCheckDefault">
                  Show Password
                </label>
              </div>

              <div class="form-floating mt-3 mb-3">
                <div class="captcha">
                    <span><?php echo captcha_img(); ?></span>
                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                        &#x21bb;
                    </button>
                </div>
              </div>

              <div class="form-floating mb-4">
                  <input id="captcha" type="text" autocomplete="off" class="form-control <?php $__errorArgs = ['captcha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Captcha" name="captcha" required>
                  <label for="captcha">Enter Captcha</label>
                  <?php $__errorArgs = ['captcha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"> Please provide a valid captcha.</div> 
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
          
              <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Login</button>
            </form>
        </main>
    </div>
</div>

<script nonce="<?php echo e(csp_nonce()); ?>" type="text/javascript">
const y = document.getElementById("checkPassword");
  y.addEventListener("click", myFunction);

  function myFunction() {
    const x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a/projectAldi/TTIS/resources/views/login/index.blade.php ENDPATH**/ ?>