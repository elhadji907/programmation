 
<?php $__env->startSection('title', 'ONFP - Modification personnel'); ?>
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
                    <p class="card-category">personnel</p>
                </div>

              
                <div class="card-body">

                    <?php echo Form::open(['url'=>'personnels/'.$personnel->id, 'method'=>"PATCH", 'files' => true]); ?>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <?php echo Form::label('civilite'); ?>                    
                                <?php echo Form::select('civilite', $civilites, $personnel->user->civilite, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'civilite']); ?>                    
                            </div> 
                            <div class="form-group col-md-6">
                                <?php echo Form::label('direction'); ?>                    
                                <?php echo Form::select('direction', $directions, $personnel->direction->name, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'direction']); ?>                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <?php echo Form::label('categorie'); ?>                    
                                <?php echo Form::select('categorie', $categories, $personnel->categorie->name, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'categorie']); ?>                    
                            </div> 
                            <div class="form-group col-md-6">
                                <?php echo Form::label('fonction'); ?>                    
                                <?php echo Form::select('fonction', $fonctions, $personnel->fonction->name, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'fonction']); ?>                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <?php echo Form::label('prenom'); ?>                    
                                <?php echo Form::text('firstname', $personnel->user->firstname, ['placeholder'=>"Votre prenom", 'class'=>'form-control']); ?>                    
                            </div>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('prenom')); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('nom'); ?>                    
                                <?php echo Form::text('name', $personnel->user->name, ['placeholder'=>'Votre nom', 'class'=>'form-control', 'id'=>'email']); ?>                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Date de naissance', null, ['class' => 'control-label']); ?>                    
                                <?php echo Form::date('date_naiss', $personnel->user->date_naissance->format('Y-m-d'), ['placeholder'=>"La date de naissance", 'class'=>'form-control']); ?>                    
                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Lieu'); ?>                    
                                <?php echo Form::text('lieu', $personnel->user->lieu_naissance, ['placeholder'=>'Votre lieu de naissance', 'class'=>'form-control']); ?>                    
                            </div> 
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <?php echo Form::label('cin'); ?>                    
                                <?php echo Form::text('cin', $personnel->cin, ['placeholder'=>"Votre cin", 'class'=>'form-control']); ?>                    
                            </div>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('cin')); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('matricule'); ?>                    
                                <?php echo Form::text('matricule', $personnel->matricule, ['placeholder'=>'Votre matricule', 'class'=>'form-control', 'id'=>'email']); ?>                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Situation familiale'); ?>                    
                                <?php echo Form::text('familiale', $personnel->user->situation_familiale, ['placeholder'=>"Votre situation familiale", 'class'=>'form-control']); ?>                    
                            </div>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('familiale')); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label("Le nombre d'enfant"); ?>                    
                                <?php echo Form::number('enfant', $personnel->nbrefant, ['min'=>'0','placeholder'=>"Le nombre d'enfant obtenu(s)", 'class'=>'form-control', 'id'=>'email']); ?>                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <?php echo Form::label("date d'entrée en fonction", null, ['class' => 'control-label']); ?>                    
                                <?php echo Form::date('date_debut', $personnel->debut->format('Y-m-d'), ['placeholder'=>"La date de recrutement", 'class'=>'form-control']); ?>                    
                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Telephone'); ?>                    
                                <?php echo Form::text('telephone', $personnel->user->telephone, ['placeholder'=>'Numero de telephone', 'class'=>'form-control']); ?>                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Numero fax'); ?>                    
                                <?php echo Form::text('fax', $personnel->user->fax, ['placeholder'=>"Votre numero fax", 'class'=>'form-control']); ?>                    
                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Boite postale'); ?>                    
                                <?php echo Form::text('bp', $personnel->user->bp, ['placeholder'=>'Votre Boite postale', 'class'=>'form-control']); ?>                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">                
                                <?php echo Form::label('Image de profile'); ?><br/>
                                <?php echo Form::file('image',null, ['class'=>'form-control-file rounded-circle w-100']); ?> 
                                <img class="pt-1" src="<?php echo e(asset($personnel->user->profile->getImage())); ?>" width="50" height="auto">
                            </div>
                        </div> 
                        <?php echo Form::submit('Modifier', ['class'=>'btn btn-outline-primary pull-right', ]); ?>

                    <?php echo Form::close(); ?>

                    
                </div>


        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/personnels/update.blade.php ENDPATH**/ ?>