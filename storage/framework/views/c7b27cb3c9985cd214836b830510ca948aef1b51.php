<?php $__env->startSection('title', 'ONFP - Enregistrement Employes'); ?>
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
                    <p class="card-category">Employes</p>
                </div>

                <div class="card-body">
                    <?php echo Form::open(['url' => 'employees', 'files' => true]); ?>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('civilite'); ?>

                            <?php echo Form::select('civilite', $civilites, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'civilite']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('civilite')): ?>
                                    <?php $__currentLoopData = $errors->get('civilite'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('direction'); ?>

                            <?php echo Form::select('direction', $directions, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'direction']); ?>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('categorie'); ?>

                            <?php echo Form::select('categorie', $categories, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'categorie']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('categorie')): ?>
                                    <?php $__currentLoopData = $errors->get('categorie'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('fonction'); ?>

                            <?php echo Form::select('fonction', $fonctions, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'fonction']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('fonction')): ?>
                                    <?php $__currentLoopData = $errors->get('fonction'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('prenom'); ?>

                            <?php echo Form::text('firstname', null, ['placeholder' => 'Votre prenom', 'class' => 'form-control']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('firstname')): ?>
                                    <?php $__currentLoopData = $errors->get('firstname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('nom'); ?>

                            <?php echo Form::text('name', null, ['placeholder' => 'Votre nom', 'class' => 'form-control', 'id' => 'email']); ?>

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
                            <?php echo Form::label('Date de naissance', null, ['class' => 'control-label']); ?>

                            <?php echo Form::date('date_naiss', null, ['placeholder' => 'La date de naissance', 'class' => 'form-control']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('date_naiss')): ?>
                                    <?php $__currentLoopData = $errors->get('date_naiss'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Lieu'); ?>

                            <?php echo Form::text('lieu', null, ['placeholder' => 'Votre lieu de naissance', 'class' => 'form-control']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('lieu')): ?>
                                    <?php $__currentLoopData = $errors->get('lieu'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('pseudo'); ?>

                            <?php echo Form::text('username', null, ['placeholder' => 'Votre pseudo', 'class' => 'form-control']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('username')): ?>
                                    <?php $__currentLoopData = $errors->get('username'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('username')); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('votre adresse e-mail'); ?>

                            <?php echo Form::email('email', null, ['placeholder' => 'Votre adresse e-mail', 'class' => 'form-control', 'id' => 'email']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('email')): ?>
                                    <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('cin'); ?>

                            <?php echo Form::text('cin', null, ['placeholder' => 'Votre cin', 'class' => 'form-control']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('cin')): ?>
                                    <?php $__currentLoopData = $errors->get('cin'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('cin')); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('matricule'); ?>

                            <?php echo Form::text('matricule', null, ['placeholder' => 'Votre matricule', 'class' => 'form-control', 'id' => 'email']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('matricule')): ?>
                                    <?php $__currentLoopData = $errors->get('matricule'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Situation familiale :'); ?>

                            <?php echo Form::select('familiale', ['Marié(e)' => 'Marié(e)', 'Célibataire' => 'Célibataire'], null, ['placeholder' => 'Votre situation familiale', 'class' => 'form-control', 'id' => 'familiale']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('familiale')): ?>
                                    <?php $__currentLoopData = $errors->get('familiale'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('date embauche', null, ['class' => 'control-label']); ?>

                            <?php echo Form::date('date_embauche', null, ['placeholder' => 'La date de recrutement', 'class' => 'form-control']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('date_embauche')): ?>
                                    <?php $__currentLoopData = $errors->get('date_embauche'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Adresse'); ?>

                            <?php echo Form::text('adresse', null, ['placeholder' => 'Votre adresse', 'class' => 'form-control']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('adresse')): ?>
                                    <?php $__currentLoopData = $errors->get('adresse'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Autre Adresse'); ?>

                            <?php echo Form::text('autre_adresse', null, ['placeholder' => 'Votre deuxième adresse', 'class' => 'form-control']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('autre_adresse')): ?>
                                    <?php $__currentLoopData = $errors->get('autre_adresse'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Telephone portable'); ?>

                            <?php echo Form::text('telephone', null, ['placeholder' => 'Numero de telephone portable', 'class' => 'form-control']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('telephone')): ?>
                                    <?php $__currentLoopData = $errors->get('telephone'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Telephone Fixe'); ?>

                            <?php echo Form::text('fixe', null, ['placeholder' => 'Numero de telephone fixe', 'class' => 'form-control']); ?>

                            <small id="emailHelp" class="form-text text-muted">
                                <?php if($errors->has('fixe')): ?>
                                    <?php $__currentLoopData = $errors->get('fixe'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Numero fax'); ?>

                            <?php echo Form::text('fax', null, ['placeholder' => 'Votre numero fax', 'class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Boite postale'); ?>

                            <?php echo Form::text('bp', null, ['placeholder' => 'Votre Boite postale', 'class' => 'form-control']); ?>

                        </div>
                    </div>
                    <?php echo Form::submit('Enregistrer', ['class' => 'btn btn-outline-primary pull-right']); ?>

                    <?php echo Form::close(); ?>

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
    &nbsp;
    &nbsp;
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/employees/create.blade.php ENDPATH**/ ?>