
<?php $__env->startSection('title', 'ONFP - Modification programmes'); ?>
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container col-8 col-sm-12 col-md-8 col-lg-8 col-xl-8">
        <div class="container-fluid">
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
            <?php endif; ?>                    
            <div class="row pt-5"></div>
            <div class="card">
                <div class="card-header card-header-primary text-center">
                    <h3 class="card-title"><?php echo e(("Modification")); ?></h3>
                    <p class="card-category"><?php echo e(("programme")); ?></p>
                </div>
                <div class="card-body">
                                               
                        <form method="POST" action="<?php echo e(action('ProgrammesController@update', $id)); ?>">
                           <?php echo csrf_field(); ?>
                           <input type="hidden" name="_method" value="PATCH" /> 
                            <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="input-name"><b><?php echo e(__("Nom du programme")); ?>:</b></label>
                                <input type="text" name="name" class="form-control" id="input-name" placeholder="Nom du programme" value="<?php echo e(old('name') ?? $programme->name); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('name')): ?>
                                        <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                            </div>                          
                        </div>                          
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="input-name"><b><?php echo e(__("Sigle")); ?>:</b></label>
                                <input type="text" name="sigle" class="form-control" id="input-name" placeholder="Sigle" value="<?php echo e(old('sigle') ?? $programme->sigle); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('sigle')): ?>
                                        <?php $__currentLoopData = $errors->get('sigle'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                            </div>                          
                            <div class="form-group col-md-6">
                                <label for="input-name"><b><?php echo e(__("Effectif")); ?>:</b></label>
                                <input type="text" name="effectif" class="form-control" id="input-name" placeholder="Effectif" value="<?php echo e(old('effectif') ?? $programme->effectif); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('effectif')): ?>
                                        <?php $__currentLoopData = $errors->get('effectif'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                            </div>                          
                        </div>                          
                        <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>&nbsp;Modifier</button>
                        </form>
                        <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es saisies svp</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if($errors->any()): ?>
                                        <div class="alert alert-danger">
                                            <ul>
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                        <?php $__env->startPush('scripts'); ?>
                                        <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#error-modal").modal({
                                                'show':true,
                                            })
                                        });
                                        </script>
                                            
                                        <?php $__env->stopPush(); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/programmes/update.blade.php ENDPATH**/ ?>