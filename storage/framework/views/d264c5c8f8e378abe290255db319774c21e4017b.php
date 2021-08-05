<?php $__env->startSection('title', 'ONFP - Enregistrement direction / service'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="container-fluid">
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <div class="row pt-5"></div>
            <div class="card">
                <div class="card-header card-header-primary text-center">
                    <h3 class="card-title">Enregistrement</h3>
                    <p class="card-category">Direction / Service</p>
                </div>
                <div class="card-body">
                    <div class="row pt-5 pl-5">
                        <h4>
                            <b>Responsable : </b>
                            <?php echo e($employee->user->firstname . ' ' . $employee->user->name ?? 'Aucune direction choisie'); ?><br />
                            <b>Fonction actuelle : </b> <?php echo e($employee->fonction->sigle ?? 'Aucune fonction attribuée'); ?>

                        </h4>
                    </div>
                    <div class="row pt-5"></div>
                    <form method="POST" action="<?php echo e(url('directions')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="employee" value="<?php echo e($employee->id); ?>" class="form-control"
                            name="inputName" id="inputName" placeholder="">

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="input-direction"><b>Nom Direction:</b></label>
                                <input type="text" name="direction" class="form-control" id="direction"
                                    placeholder="Entrer nom direction" value="<?php echo e(old('direction')); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('direction')): ?>
                                        <?php $__currentLoopData = $errors->get('direction'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="input-sigle"><b>sigle:</b></label>
                                <input type="text" name="sigle" class="form-control" id="sigle" placeholder="Entrer sigle"
                                    value="<?php echo e(old('sigle')); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('sigle')): ?>
                                        <?php $__currentLoopData = $errors->get('sigle'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php echo Form::label('Type direction :'); ?><span class="text-danger"> <b>*</b> </span>
                                <?php echo Form::select('type_direction', $types_directions, null, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'type_direction']); ?>

                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('type_direction')): ?>
                                        <?php $__currentLoopData = $errors->get('type_direction'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"><i
                                class="far fa-paper-plane"></i>&nbsp;Enregistrer</button>
                    </form>
                    <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es saisies svp
                                    </h5>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/directions/create.blade.php ENDPATH**/ ?>