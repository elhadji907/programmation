<?php $__env->startSection('title', 'ONFP - Cration courriers'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <!-- Standard buttons -->
    <div class="col-md-12">
        <a class="btn btn-info btn-block" href="<?php echo e(route('recues.index')); ?>"><span data-feather="book-open"></span> Courriers arrivés</a>
    </div>
    <br />
    <!-- Primary buttons -->
    <div class="col-md-12">
        <a class="btn btn-dark btn-block" href="<?php echo e(route('departs.index')); ?>"><span data-feather="book-open"></span> Courriers départs</a>
    </div>
    <br />
    <div class="col-md-12">
        <a class="btn btn-info btn-block" href="<?php echo e(route('internes.index')); ?>"><span data-feather="book-open"></span> Courriers internes</a>
    </div>
    <br />
    <!-- Primary buttons -->
    
    <br />
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/courriers/create.blade.php ENDPATH**/ ?>