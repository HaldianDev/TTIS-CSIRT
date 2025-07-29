

<?php $__env->startSection('container'); ?>
    <!-- Service Section -->
    <div class="container" style="margin-top:8rem">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12">

            <h1 class="mb-5">Panduan Penangan Insiden Siber</h1>

                <article class="my-4 fs-6">
                    <div class="table-responsive col-auto">
                          <table class="table table-striped table-sm">
                            <thead class="table-success">
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Size</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $guidances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $guidance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <td><?php echo e($guidances->firstItem() + $key); ?></td>
                                  <td> <a href="<?php echo e('storage/' .  $guidance->path); ?>" target="_blank"><?php echo e($guidance->name); ?></a> </td>
                                  <td><?php echo e(number_format(round($guidance->size / 1024, 2),2,",",".")); ?> Kb</td>
                                </tr>    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                          </table>
                          <div class="d-flex align-items-center justify-content-between">
                              <div class="mb-3">
                                  Showing 
                                  <?php echo e($guidances->firstItem()); ?>

                                  to
                                  <?php echo e($guidances->lastItem()); ?>

                                  of 
                                  <?php echo e($guidances->total()); ?>

                                  enteries
                              </div>
                              <div class="pagination pagination-sm">
                                  <?php echo e($guidances->links()); ?>

                              </div>
                          </div>
                    </div>
                </article>
                
            </div>
        </div>
    </div> 
    <!-- End Service Section -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/a/projectAldi/TTIS/resources/views/guidance.blade.php ENDPATH**/ ?>