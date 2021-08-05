
<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


</head>

<body>
<center>
  
  <h1>Laravel select dropbox using select2</h1>

  <span>Name: </span>

    <select style="width: 200px" id="nameid">
      <option></option>
      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option><?php echo e($d->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</center>


    




</body>
</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/selectview.blade.php ENDPATH**/ ?>