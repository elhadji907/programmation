<?php $__env->startSection('title', 'ONFP - Enregistrement bordereaux '); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container">
            <div class="container-fluid">
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <div class="row pt-0"></div>
                <div class="card p-3">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="h4 card-title text-center h-100 text-uppercase mb-0">Enregistrement bordereaux</h3>
                    </div>
                    <div class="card-body">
                        <b> NB </b> : Les champs (<span class="text-danger"> <b>*</b> </span>) sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">INFORMATIONS</p>
                        </div>
                        <form method="POST" action="<?php echo e(url('bordereaus')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Objet'); ?> <span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::textarea('objet', null, ['placeholder' => '', 'class' => 'form-control', 'rows' => 2, 'id' => 'objets']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('objet')): ?>
                                            <?php $__currentLoopData = $errors->get('objet'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Expéditeur'); ?> <span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::textarea('expediteur', null, ['placeholder' => "Nom et prénom de l'expéditeur", 'rows' => 1, 'class' => 'form-control']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('expediteur')): ?>
                                            <?php $__currentLoopData = $errors->get('expediteur'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Adresse e-mail'); ?> <span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::email('email', null, ['placeholder' => 'adresse e-mail', 'class' => 'form-control', 'id' => 'email']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('email')): ?>
                                            <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Téléphone'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::text('telephone', null, ['placeholder' => 'numero de téléphone', 'class' => 'form-control']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('telephone')): ?>
                                            <?php $__currentLoopData = $errors->get('telephone'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Numéro mandat :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::text('numero_mandat', null, ['placeholder' => 'Le numéro du mandat', 'class' => 'form-control']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('numero_mandat')): ?>
                                            <?php $__currentLoopData = $errors->get('numero_mandat'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Date mandatement :', null, ['class' => 'control-label']); ?>

                                    <?php echo Form::date('date_mandat', null, ['placeholder' => 'La date de naissance', 'class' => 'form-control']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('date_mandat')): ?>
                                            <?php $__currentLoopData = $errors->get('date_mandat'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Montant :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::text('montant', null, ['placeholder' => 'Le montant en F CFA', 'class' => 'form-control']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('montant')): ?>
                                            <?php $__currentLoopData = $errors->get('montant'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Nbre de pièces :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::number('nombre_de_piece', 1, ['placeholder' => 'Le nombre de pièces', 'class' => 'form-control', 'min' => '0', 'max' => '100']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('nombre_de_piece')): ?>
                                            <?php $__currentLoopData = $errors->get('nombre_de_piece'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Désignation :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::textarea('designation', null, ['placeholder' => 'Désignation pour le réglement', 'rows' => 5, 'class' => 'form-control']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('designation')): ?>
                                            <?php $__currentLoopData = $errors->get('designation'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Observations :'); ?>

                                    <?php echo Form::textarea('observation', null, ['placeholder' => 'observations éventuelles', 'rows' => 5, 'class' => 'form-control']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('observation')): ?>
                                            <?php $__currentLoopData = $errors->get('observation'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">

                            </div>
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">PROJET</p>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Projet :', null, ['class' => 'control-label']); ?>

                                    <?php echo Form::select('projet', $projets, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'projet', 'data-width' => '100%']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('projet')): ?>
                                            <?php $__currentLoopData = $errors->get('projet'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">METTRE DANS UN CLASSEUR</p>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Classeur :', null, ['class' => 'control-label']); ?>

                                    <?php echo Form::select('liste', $listes, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'classeur', 'data-width' => '100%']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('classeur')): ?>
                                            <?php $__currentLoopData = $errors->get('classeur'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right"><i
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

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/bordereaus/create.blade.php ENDPATH**/ ?>