 
<?php $__env->startSection('title', 'ONFP - Modification des courriers departs'); ?>
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
                    <h3 class="card-title">Modification</h3>
                    <p class="card-category">Courriers départs</p>
                </div>

                <div class="card-body">
                <?php echo Form::open(['url'=>'departs/'.$depart->id, 'method'=>"PATCH", 'files' => true]); ?>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <?php echo Form::label('Objet'); ?>                    
                            <?php echo Form::text('objet', $depart->courrier->objet, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'objet']); ?>                    
                        </div> 
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <?php echo Form::label('Message'); ?>                    
                            <?php echo Form::textarea('message',  $depart->courrier->message, ['placeholder'=>'Message du courrier', 'rows' => 4, 'class'=>'form-control', 'id'=>'message']); ?>                    
                        </div> 
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Expéditeur'); ?>                    
                            <?php echo Form::text('expediteur', $depart->courrier->expediteur, ['placeholder'=>"Nom et prénom de l'expéditeur", 'class'=>'form-control']); ?>                    
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Imputation'); ?>                    
                            <?php echo Form::select('imputations[]', $imputations, null, ['multiple'=>'multiple', 'class'=>'form-control', 'id'=>'imputation']); ?>                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Telephone'); ?>                    
                            <?php echo Form::text('telephone', $depart->courrier->telephone, ['placeholder'=>"Votre numero de téléphone", 'class'=>'form-control']); ?>                    
                        </div>
                        <div class="invalid-feedback">
                            <?php echo e($errors->first('telephone')); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Adresse e-mail'); ?>                    
                            <?php echo Form::email('email', $depart->courrier->email, ['placeholder'=>'Votre adresse e-mail', 'class'=>'form-control', 'id'=>'email']); ?>                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Adresse'); ?>                    
                            <?php echo Form::text('adresse', $depart->courrier->adresse, ['placeholder'=>'Votre adresse de résidence', 'class'=>'form-control']); ?>                    
                        </div>
                        <div class="form-group col-md-3">
                            <?php echo Form::label('Date correspondance', null, ['class' => 'control-label']); ?>                    
                            <?php echo Form::date('date_cores', Carbon\Carbon::parse($depart->courrier->date_cores)->format('Y-m-d'), ['placeholder'=>"La date de dépos du courrier", 'class'=>'form-control']); ?>                    
                        </div> 
                        <div class="form-group col-md-3">
                            <?php echo Form::label('Date réception', null, ['class' => 'control-label']); ?>                    
                            <?php echo Form::date('date_recep', Carbon\Carbon::parse($depart->courrier->date_recep)->format('Y-m-d'), ['placeholder'=>"La date de réception du courrier", 'class'=>'form-control']); ?>                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Numero fax'); ?>                    
                            <?php echo Form::text('fax', $depart->courrier->fax, ['placeholder'=>"Votre numero fax", 'class'=>'form-control']); ?>                    
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('Boite postale'); ?>                    
                            <?php echo Form::text('bp', $depart->courrier->bp, ['placeholder'=>'Votre Boite postale', 'class'=>'form-control']); ?>                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('', null, ['class' => 'control-label']); ?>                    
                            <?php echo Form::file('file', null, ['class'=>'form-control-file']); ?>

                            <?php if($depart->courrier->file !== ""): ?>
                            <a class="btn btn-outline-secondary mt-2" title="télécharger le fichier joint" target="_blank" href="<?php echo e(asset($depart->courrier->getFile())); ?>">
                                <i class="fas fa-download">&nbsp;Télécharger le courrier</i>
                            </a>
                            <?php endif; ?>             
                        </div>
                        <div class="form-group col-md-6">                
                            <?php echo Form::text('legende', $depart->courrier->legende, ['placeholder'=>'Le nom du fichier joint', 'class'=>'form-control']); ?>                    
                        </div> 
                    </div>
                    <?php echo Form::submit('Enregistrer', ['class'=>'btn btn-outline-primary pull-right', ]); ?>

                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascripts'); ?>
    <script type="text/javascript">
        $('#imputation').select2().val(<?php echo json_encode($depart->courrier->imputations()->allRelatedIds()); ?>).trigger('change');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/departs/update.blade.php ENDPATH**/ ?>