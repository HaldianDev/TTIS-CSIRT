<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php $__currentLoopData = $properties->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <link rel="icon" href="<?php echo e(asset('storage/' . $property->image)); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   

    

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Core CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script nonce="<?php echo e(csp_nonce()); ?>" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <style> 
      .hero {
        <?php $__currentLoopData = $propertiez->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          background-image: url('<?php echo e(asset('storage/' . $property->image)); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      }
      .pdfobject-container { 
        height: 100vh;
        border: 1rem solid rgba(0,0,0,.1);
      }
    </style>
    <?php $__currentLoopData = $profils->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <title><?php echo e($profil->name); ?></title>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    

  </head>
  <body>
      <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      
      <?php echo $__env->renderWhen($includeHero, 'layouts.hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

      <div class="m-0 p-0">
          <?php echo $__env->yieldContent('container'); ?>
      </div>

      <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    
    <!-- Bootstrap Bundle with Popper -->
    <script nonce="<?php echo e(csp_nonce()); ?>" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script nonce="<?php echo e(csp_nonce()); ?>" type="text/javascript">
      var nav=document.querySelector('nav');

      window.addEventListener('scroll', function(){
          if(window.pageYOffset > 30){
              nav.classList.add('bg-dark', 'shadow', 'navbar-dark');
          } else {
              nav.classList.remove('bg-dark', 'shadow', 'navbar-dark')
          }
      })

      $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: '/login/reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
      });

    </script>
  </body>
</html>
<?php /**PATH /home/a/projectAldi/TTIS/resources/views/layouts/main.blade.php ENDPATH**/ ?>