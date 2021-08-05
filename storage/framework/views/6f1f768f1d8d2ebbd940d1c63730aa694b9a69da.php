<?php $__env->startSection('title', 'ONFP - Modification directions'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <div class="row pt-5"></div>
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="card-title">Modification</h3>
                        <p class="card-category">Direction / Service</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(action('DirectionsController@update', $id)); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="_method" value="PATCH" />
                            <div class="row">
                                <div class="form-group col col-md-12 col-lg-8 col-xs-12 col-sm-12">
                                    <label for="input-direction"><b>Direction / Service:</b></label>
                                    <input type="text" name="direction" class="form-control" id="input-direction"
                                        placeholder="Entrer nom direction" value="<?php echo e($directions->name); ?>">
                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('direction')): ?>
                                            <?php $__currentLoopData = $errors->get('direction'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                                <div class="form-group col-md-12 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="input-sigle"><b>sigle:</b></label>
                                    <input type="text" name="sigle" class="form-control" id="input-sigle"
                                        placeholder="Entrer sigle" value="<?php echo e($directions->sigle); ?>">
                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('sigle')): ?>
                                            <?php $__currentLoopData = $errors->get('sigle'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Type direction'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::select('type_direction', $types_directions, $directions->types_direction->name, ['placeholder' => '', 'data-width'=>'100%', 'class' => 'form-control', 'id' => 'type_direction']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('type_direction')): ?>
                                            <?php $__currentLoopData = $errors->get('type_direction'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Responsable'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::select('employee', $employees, $directions->chef->matricule, ['placeholder' => '', 'data-width'=>'100%', 'class' => 'form-control', 'id' => 'employee']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('employee')): ?>
                                            <?php $__currentLoopData = $errors->get('employee'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            &nbsp;
                            &nbsp;
                            <button type="submit" class="btn btn-outline-primary float-right"><i
                                    class="far fa-paper-plane"></i>&nbsp;Enregistrer</button>
                        </form>
                        <div class="modal fade" id="error-modal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es saisies
                                            svp</h5>
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
                                                    $(document).ready(function() {
                                                        $("#error-modal").modal({
                                                            'show': true,
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

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/directions/update.blade.php ENDPATH**/ ?>