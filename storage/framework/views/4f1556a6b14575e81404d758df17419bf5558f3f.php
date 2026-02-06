<?php $__env->startSection('container'); ?>
<div class="container mb-4 d-flex justify-content-center" style="margin-top: 7rem">
    <div class="col-md-8">
        <?php $__currentLoopData = $profils->take(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h2 class="text-center mt-3">RFC2350 <?php echo e($profil->name); ?></h2>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <br />
        <hr class="mx-auto" style="width: 50%">
        <br />

        
        <div id="my_pdf" class="mb-4" style="height: 600px; width: 100%; border:1px solid #ccc;"></div>
    </div>
</div>


<script nonce="<?php echo e(csp_nonce()); ?>" src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.min.js"></script>

<?php
    $file = $files->first();
?>

<?php if($file): ?>
<script nonce="<?php echo e(csp_nonce()); ?>">
document.addEventListener("DOMContentLoaded", function () {
    var pdfUrl = "<?php echo e(route('files.servePdf', ['filename' => basename($file->path)])); ?>"; // Laravel route serve PDF
    var pdfSupported = PDFObject.embed(pdfUrl, "#my_pdf");

    if (!pdfSupported) {
        document.querySelector("#my_pdf").innerHTML = `
            <p class="text-center text-muted">
                Browser tidak mendukung PDF embed.<br>
                <a href="${pdfUrl}" class="btn btn-warning mt-3" target="_blank">Download PDF</a>
            </p>
        `;
    }
});
</script>
<?php else: ?>
<p class="text-center text-muted">Tidak ada file PDF yang tersedia.</p>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/user/project/TTIS-CSIRT/resources/views/file.blade.php ENDPATH**/ ?>