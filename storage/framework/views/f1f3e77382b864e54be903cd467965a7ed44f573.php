

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
       <div class="col-8">
            <img src="<?php echo e(asset('storage').'/'.$poste->image); ?>" class="w-100"/>
    </div>
    <div class="col-4">
       <h3><?php echo e($poste->user->username); ?></h3>
       <p>
           <?php echo e($poste->legende); ?>

       </p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/postes/show.blade.php ENDPATH**/ ?>