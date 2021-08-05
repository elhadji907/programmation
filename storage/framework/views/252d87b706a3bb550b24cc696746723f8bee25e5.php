
<?php $__env->startSection('title', 'ONFP - Modification administrateurs'); ?>
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
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
                    <p class="card-category">administrateur</p>
                </div>
                <div class="card-body">


                    <?php echo Form::open(['url'=>'administrateurs/'.$administrateur->id, 'method'=>"PATCH", 'files' => true]); ?>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php echo Form::label('civilite'); ?>                    
                                <?php echo Form::select('civilite', ['M.' => 'M.', 'Mme' => 'Mme'], $administrateur->user->civilite, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'civilite']); ?>                    
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php echo Form::label('matricule'); ?>                    
                                <?php echo Form::text('matricule', $administrateur->matricule, ['placeholder'=>'Votre matricule', 'class'=>'form-control', 'id'=>'matricule']); ?>                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php echo Form::label('prenom'); ?>                    
                                <?php echo Form::text('prenom', $administrateur->user->firstname, ['placeholder'=>"Votre prenom", 'class'=>'form-control']); ?>                    
                            </div>
                            <div class="invalid-feedback">
                                <?php echo e($errors->first('prenom')); ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php echo Form::label('nom'); ?>                    
                                <?php echo Form::text('nom', $administrateur->user->name, ['placeholder'=>'Votre nom', 'class'=>'form-control', 'id'=>'nom']); ?>                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php echo Form::label("Nom d'utilisateur"); ?>                    
                                <?php echo Form::text('username', $administrateur->user->username, ['placeholder'=>'Votre username', 'class'=>'form-control', 'id'=>'username']); ?>                    
                            </div> 
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php echo Form::label('Email'); ?>                    
                                <?php echo Form::text('email', $administrateur->user->email, ['placeholder'=>'Numero de email', 'class'=>'form-control']); ?>                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php echo Form::label('Telephone'); ?>                    
                                <?php echo Form::text('telephone', $administrateur->user->telephone, ['placeholder'=>'Numero de telephone', 'class'=>'form-control']); ?>                    
                            </div> 
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <?php echo Form::label('role'); ?>                    
                                <?php echo Form::select('role', $roles, $administrateur->user->role->name, ['placeholder'=>'sélectionner un rôle', 'class'=>'form-control', 'id'=>'role']); ?>                    
                            </div>
                        </div>
                        
                        <?php echo Form::submit('Modifier', ['class'=>'btn btn-outline-primary pull-right', ]); ?>

                    <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/administrateurs/update.blade.php ENDPATH**/ ?>