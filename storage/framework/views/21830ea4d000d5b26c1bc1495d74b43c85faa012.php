 
<?php $__env->startSection('title', 'ONFP - Enregistrement des courriers internes'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
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
            <div class="row pt-5"></div>
            <div class="card">
                <div class="card-header card-header-primary text-center">
                    <h3 class="card-title">Enregistrement</h3>
                    <p class="card-category">Courriers internes</p>
                </div>

                <div class="card-body">
                <?php echo Form::open(['url'=>'internes','files' => true]); ?>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <?php echo Form::label('Objet'); ?>                    
                            <?php echo Form::text('objet', null, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'objet']); ?>                    
                        </div> 
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <?php echo Form::label('Message'); ?>                    
                            <?php echo Form::textarea('message', null, ['placeholder'=>'Message du courrier', 'rows' => 4, 'class'=>'form-control', 'id'=>'message']); ?>                    
                        </div> 
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Expéditeur'); ?>                    
                            <?php echo Form::text('expediteur', null, ['placeholder'=>"Nom et prénom de l'expéditeur", 'class'=>'form-control']); ?>                    
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Imputation'); ?>                    
                            <?php echo Form::select('directions[]', $directions, null, ['multiple'=>'multiple', 'class'=>'form-control', 'id'=>'direction']); ?>                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Adresse e-mail'); ?>                    
                            <?php echo Form::email('email', null, ['placeholder'=>'Votre adresse e-mail', 'class'=>'form-control', 'id'=>'email']); ?>                    
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Téléphone'); ?>                    
                            <?php echo Form::text('telephone', null, ['placeholder'=>"Votre numero de téléphone", 'class'=>'form-control']); ?>                    
                        </div>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('telephone')); ?>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Adresse'); ?>                    
                            <?php echo Form::text('adresse', null, ['placeholder'=>'Votre adresse de résidence', 'class'=>'form-control']); ?>                    
                        </div>
                        <div class="form-group col-md-3">
                            <?php echo Form::label('Date correspondance', null, ['class' => 'control-label']); ?>                    
                            <?php echo Form::date('date_c', $date_r->format('Y-m-d'), ['placeholder'=>"La date de correspondance du courrier", 'class'=>'form-control']); ?>                    
                        </div>
                        <div class="form-group col-md-3">
                            <?php echo Form::label('Date réception', null, ['class' => 'control-label']); ?>                    
                            <?php echo Form::date('date_r', $date_r->format('Y-m-d'), ['placeholder'=>"La date de reception du courrier", 'class'=>'form-control']); ?>                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Numero fax'); ?>                    
                            <?php echo Form::text('fax', null, ['placeholder'=>"Votre numero fax", 'class'=>'form-control']); ?>                    
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Boite postale'); ?>                    
                            <?php echo Form::text('bp', null, ['placeholder'=>'Votre Boite postale', 'class'=>'form-control']); ?>                    
                        </div> 
                    </div>
                    <?php echo Form::submit('Enregistrer', ['class'=>'btn btn-outline-primary pull-right', ]); ?>

                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/internes/create.blade.php ENDPATH**/ ?>