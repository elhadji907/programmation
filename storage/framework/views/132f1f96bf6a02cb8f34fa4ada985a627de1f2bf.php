

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Créer un post')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('postes.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                        <label for="legende">Légende</label>                            
                            <input id="legende" type="text" class="form-control <?php if ($errors->has('legende')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('legende'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="legende" value="<?php echo e(old('legende')); ?>" autocomplete="legende" autofocus>
                           
                            <?php if ($errors->has('legende')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('legende'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div> 

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="image" value="<?php echo e(old('image')); ?>" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Chisir une image...</label>                                

                                <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">
                            <?php echo e(__('Créer mon post')); ?>

                        </button>
                          
                    </form>
                </div>
            </div>
        </div>
    </div>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/postes/create.blade.php ENDPATH**/ ?>