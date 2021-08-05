

<?php $__env->startSection('content'); ?>
<div class="row">
 <div class="container col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
  <br />
  <h3 aling="center">Ajouter un nouveau village</h3>
  <br />
  <?php if(count($errors) > 0): ?>
  <div class="alert alert-danger">
   <ul>
   <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </ul>
  </div>
  <?php endif; ?>
  <?php if(\Session::has('success')): ?>
  <div class="alert alert-success">
   <p><?php echo e(\Session::get('success')); ?></p>
  </div>
  <?php endif; ?>
  <form method="post" action="<?php echo e(url('villages')); ?>">
   <?php echo e(csrf_field()); ?>

   <div class="form-group">
    <label class="control-label"><b>Nom du Village:</b></label>
    <input type="text" name="nom_du_village" class="form-control" value="<?php echo e(old('nom_du_village')); ?>" placeholder="Entrer le nom du village" />
   </div>
   <div class="form-group">
        <label class="control-label"><b>Nom du chef de Village:</b></label>
    <input type="text" name="nom_du_chef_de_village" class="form-control" value="<?php echo e(old('nom_du_chef_de_village')); ?>" placeholder="Entrer le nom du chef de village" />
   </div>
   <div class="form-group">
        <label class="control-label"><b>Nom de la commune:</b></label>
    <input type="text" name="nom_de_la_commune" class="form-control" value="<?php echo e(old('nom_de_la_commune')); ?>" placeholder="Entrer le nom de la commune" />
   </div>
   <div class="form-group">
    <input type="submit" value="Enregistrer" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/villages/create.blade.php ENDPATH**/ ?>