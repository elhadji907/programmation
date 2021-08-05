 


<?php $__env->startSection('content'); ?>
<div class="container">
   
    <form method="POST" action="#" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="numero">Numero</label>
                <input class="form-control <?php echo e($errors->has('numero') ? 'is-invalid' : ''); ?>" disabled="disabled" type="text" name="numero" placeholder="Numéro du courrier..."
                    id="numero" value="<?php echo e(old('numero')); ?> <?php echo e($numCourrier); ?>">
                <div class="invalid-feedback">
                    <?php echo e($errors->first('numero')); ?>

                </div>
                
            </div>
            <div class="form-group col-md-6">
                <label for="nom">Objet</label>
                <input class="form-control <?php echo e($errors->has('nom') ? 'is-invalid' : ''); ?>" type="text" name="nom" placeholder="Objet du courrier..."
                    id="nom" value="<?php echo e(old('nom')); ?>">
                <div class="invalid-feedback">
                    <?php echo e($errors->first('nom')); ?>

                </div>
            </div>   
            <div class="form-group col-md-3">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control selectpicker">
                        <option value="" class="text-gray-600 small">--Sélectionner le type--</option>
                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="invalid-feedback">
                    <?php echo e($errors->first('type')); ?>

                </div>
            </div>
                
        </div>        
        <div class="form-group">
            <label for="content">Message</label>
            <textarea class="form-control <?php echo e($errors->has('content') ? 'is-invalid' : ''); ?>" rows="7" name="content" id="textarea"></textarea>
            <div class="invalid-feedback">
                <?php echo e($errors->first('content')); ?>

            </div>
        </div>           
    

    <button class="btn btn-outline-primary">
            <span data-feather="save"></span> Enregistrer
    </button>
    </form>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/courriers/arrives/create.blade.php ENDPATH**/ ?>