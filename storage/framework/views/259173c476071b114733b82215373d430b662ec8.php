<?php $__env->startSection('title', 'ONFP - Enregistrement depenses'); ?>
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
                        <h3 class="card-title"><?php echo e('Enregistrement'); ?></h3>
                        <p class="card-category"><?php echo e('depense'); ?></p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(url('depenses')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <div class="form-group col-md-12">
                                        <?php echo Form::label('Projet'); ?><span class="text-danger"> <b>*</b> </span>
                                        <?php echo Form::select('projet', $projets, null, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'projet']); ?>

                                        <small id="emailHelp" class="form-text text-muted">
                                            <?php if($errors->has('projet')): ?>
                                                <?php $__currentLoopData = $errors->get('projet'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <div class="form-group col-md-12">
                                        <?php echo Form::label('Activité'); ?><span class="text-danger"> <b>*</b> </span>
                                        <?php echo Form::select('activite', $activites, null, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'activite']); ?>

                                        <small id="emailHelp" class="form-text text-muted">
                                            <?php if($errors->has('activite')): ?>
                                                <?php $__currentLoopData = $errors->get('activite'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Désignation :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::textarea('designation', null, ['placeholder' => "Nom et prénom de l'expéditeur", 'rows' => 1, 'class' => 'form-control', 'id' => 'designation']); ?>

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
                                    <?php echo Form::textarea('fournisseur', null, ['placeholder' => "Nom et prénom de l'expéditeur", 'rows' => 1, 'class' => 'form-control']); ?>

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
                                    <?php echo Form::text('montant', null, ['placeholder' => 'Montant', 'class' => 'form-control']); ?>

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
                                    <?php echo Form::text('ir', null, ['placeholder' => 'IR', 'class' => 'form-control']); ?>

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
                                    <?php echo Form::text('autre_montant', null, ['placeholder' => 'Autre Montant', 'class' => 'form-control']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('autre_montant')): ?>
                                            <?php $__currentLoopData = $errors->get('autre_montant'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <?php echo Form::submit('Enregistrer', ['class' => 'btn btn-outline-primary pull-right']); ?>

                            <?php echo Form::close(); ?>

                            <div class="modal fade" id="error-modal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es
                                                saisies
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
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Fermer</button>
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

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/depenses/create.blade.php ENDPATH**/ ?>