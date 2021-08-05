<?php $__env->startSection('title', 'ONFP - Modification depenses'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="container-fluid">
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <div class="row pt-5"></div>
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="card-title"><?php echo e('Modification'); ?></h3>
                        <p class="card-category"><?php echo e('depense'); ?></p>
                    </div>
                    <div class="card-body">
                        <?php echo Form::open(['url' => 'depenses/' . $depense->id, 'method' => 'PATCH', 'files' => true]); ?>

                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col col-md-8 col-lg-8 col-xs-12 col-sm-12">
                                    <div class="form-group col-md-12">
                                        <?php echo Form::label('Projet'); ?><span class="text-danger"> <b>*</b> </span>
                                        <?php echo Form::select('projet', $projets, $depense->projet->name, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'projet']); ?>

                                    </div>
                                </div>
                                <div class="form-group col col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <div class="form-group col-md-12">
                                        <?php echo Form::label('Sigle'); ?><span class="text-danger"> <b>*</b> </span>
                                        <?php echo Form::select('sigle', $sigles, $depense->projet->sigle, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'projet-sigle', 'disabled' => 'disabled']); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <div class="form-group col-md-12">
                                        <?php echo Form::label('Activité'); ?><span class="text-danger"> <b>*</b> </span>
                                        <?php echo Form::select('activite', $activites, $depense->activite->name, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'activite']); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Désignation :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::textarea('designation', $depense->designation, ['placeholder' => "Nom et prénom de l'expéditeur", 'rows' => 1, 'class' => 'form-control']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('designation')): ?>
                                            <?php $__currentLoopData = $errors->get('designation'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Fournisseur :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::textarea('fournisseur', $depense->fournisseurs, ['placeholder' => "Nom et prénom de l'expéditeur", 'rows' => 1, 'class' => 'form-control']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('fournisseur')): ?>
                                            <?php $__currentLoopData = $errors->get('fournisseur'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Montant :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::text('montant', $depense->montant, ['placeholder' => 'Montant', 'class' => 'form-control']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('montant')): ?>
                                            <?php $__currentLoopData = $errors->get('montant'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                                <div class="form-group col col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <?php echo Form::label('IR :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::text('ir', $depense->ir, ['placeholder' => 'IR', 'class' => 'form-control']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('ir')): ?>
                                            <?php $__currentLoopData = $errors->get('ir'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                                <div class="form-group col col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Autre Montant :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::text('autre_montant', $depense->autre_montant, ['placeholder' => 'Autre Montant', 'class' => 'form-control']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('autre_montant')): ?>
                                            <?php $__currentLoopData = $errors->get('autre_montant'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <?php echo Form::submit('Modifier', ['class' => 'btn btn-outline-primary pull-right']); ?>

                            <?php echo Form::close(); ?>

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

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/depenses/update.blade.php ENDPATH**/ ?>