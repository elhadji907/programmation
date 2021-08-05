<?php $__env->startSection('title', 'ONFP - Modification Frais bancaire '); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container col-12 col-md-12 col-lg-8 col-xl-12">
            <div class="container-fluid">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <div class="row pt-0"></div>
                <div class="card p-3">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="h4 card-title text-center h-100 text-uppercase mb-0">Modification Frais bancaire</h3>
                    </div>
                    <div class="card-body">
                        <b> NB </b> : Les champs (<span class="text-danger"> <b>*</b> </span>) sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">INFORMATIONS</p>
                        </div>
                        <?php echo Form::open(['url' => 'banques/' . $banque->id, 'method' => 'PATCH', 'files' => true]); ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                <?php echo Form::label('Numéro du courrier'); ?><span class="text-danger"> <b>*</b> </span>
                                <?php echo Form::text('numero_courrier', $banque->courrier->numero, ['placeholder' => 'numero du courrier', 'class' => 'form-control']); ?>

                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('numero_courrier')): ?>
                                        <?php $__currentLoopData = $errors->get('numero_courrier'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <?php echo Form::label('Designation'); ?><span class="text-danger"> <b>*</b> </span>
                                <?php echo Form::textarea('designation', $banque->courrier->designation, ['placeholder' => 'designation', 'rows' => 2, 'class' => 'form-control']); ?>

                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('designation')): ?>
                                        <?php $__currentLoopData = $errors->get('designation'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <?php echo Form::label('observation'); ?><span class="text-danger"> <b>*</b> </span>
                                <?php echo Form::textarea('observation', $banque->courrier->observation, ['placeholder' => 'observation', 'rows' => 2, 'class' => 'form-control']); ?>

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
                            <div class="form-group col-md-10 col-lg-10 col-xs-12 col-sm-12" style="margin:auto">
                                <?php echo Form::label('Montant HT :'); ?><span class="text-danger"> <b>*</b> </span>
                                <?php echo Form::text('montant', $banque->courrier->montant, ['placeholder' => 'Le montant en F CFA', 'class' => 'form-control']); ?>

                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('montant')): ?>
                                        <?php $__currentLoopData = $errors->get('montant'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                            <div class="form-group col-md-2 col-lg-2 col-xs-12 col-sm-12 pt-5" style="margin:auto">
                                <?php echo Form::label('TVA :'); ?><span class="text-danger"> <b>*</b> </span>
                                <span class="form-check form-check-inline">
                                    <?php echo e(Form::radio('tva', 'oui', false, ['class' => 'form-check-input'])); ?>

                                    <label class="form-check-label ml-2" for="inlineRadio1">Oui</label>
                                </span>
                                <span class="form-check form-check-inline">
                                    <?php echo e(Form::radio('tva', 'non', false, ['class' => 'form-check-input'])); ?>

                                    <label class="form-check-label ml-2" for="inlineRadio2">Non</label>
                                </span>
                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('tva')): ?>
                                        <?php $__currentLoopData = $errors->get('tva'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12" style="margin:auto">
                                <?php echo Form::label('IR:'); ?>

                                <?php echo Form::text('ir', $banque->courrier->ir, ['placeholder' => 'IR', 'class' => 'form-control']); ?>

                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('ir')): ?>
                                        <?php $__currentLoopData = $errors->get('ir'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12" style="margin:auto">
                                <?php echo Form::label('Autre montant :'); ?>

                                <?php echo Form::text('autres_montant', $banque->courrier->autres_montant, ['placeholder' => 'Autre montant', 'class' => 'form-control']); ?>

                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('autres_montant')): ?>
                                        <?php $__currentLoopData = $errors->get('autres_montant'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12" style="margin:auto">
                                <?php echo Form::label('Numéro mandat :'); ?><span class="text-danger"> <b>*</b> </span>
                                <?php echo Form::text('numero_mandat', $banque->numero, ['placeholder' => 'Le numéro du mandat', 'class' => 'form-control']); ?>

                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('numero_mandat')): ?>
                                        <?php $__currentLoopData = $errors->get('numero_mandat'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <?php echo Form::label('Visa DG :', null, ['class' => 'control-label']); ?>

                                <?php echo Form::date('date_dg', Carbon\Carbon::parse($banque->date_dg)->format('Y-m-d'), ['placeholder' => '', 'class' => 'form-control']); ?>

                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('date_dg')): ?>
                                        <?php $__currentLoopData = $errors->get('date_dg'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <?php echo Form::label('Visa AC :', null, ['class' => 'control-label']); ?>

                                <?php echo Form::date('date_ac', Carbon\Carbon::parse($banque->date_ac)->format('Y-m-d'), ['placeholder' => '', 'class' => 'form-control']); ?>

                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('date_ac')): ?>
                                        <?php $__currentLoopData = $errors->get('date_ac'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <?php echo Form::label('', null, ['class' => 'control-label']); ?>

                                <?php echo Form::file('file', null, ['class' => 'form-control-file', 'data-width' => '100%']); ?>

                                <?php if(isset($banque->courrier->file)): ?>
                                    <a class="btn btn-outline-secondary mt-2" title="télécharger le fichier joint"
                                        target="_blank" href="<?php echo e(asset($banque->courrier->getFile())); ?>">
                                        <i class="fas fa-download">&nbsp;Télécharger le courrier</i>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::text('legende', $banque->courrier->legende, ['placeholder' => 'attribué un nom du fichier joint', 'data-width' => '100%', 'class' => 'form-control']); ?>

                            </div>
                        </div>
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2">PROJET</p>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <?php echo Form::label('Projet'); ?><span class="text-danger"> <b>*</b> </span>
                                <?php echo Form::select('projet', $projets, $banque->courrier->projet->sigle, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'projet']); ?>

                            </div>
                        </div>
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2">IMPUTATION DIRECTIONS</p>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                <?php echo Form::label('Imputation'); ?>

                                <?php echo Form::select('directions[]', $directions, null, ['multiple' => 'multiple', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'direction']); ?>

                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('direction')): ?>
                                        <?php $__currentLoopData = $errors->get('direction'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                        </div>
                        <?php echo Form::submit('Enregistrer', ['class' => 'btn btn-outline-primary pull-right']); ?>

                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascripts'); ?>
    <script type="text/javascript">
        $('#direction').select2().val(<?php echo json_encode($banque->courrier->directions()->allRelatedIds()); ?>).trigger('change');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/banques/update.blade.php ENDPATH**/ ?>