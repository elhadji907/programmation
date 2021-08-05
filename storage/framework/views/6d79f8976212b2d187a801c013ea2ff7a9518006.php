
<?php $__env->startSection('title', 'ONFP - Enregistrement courriers'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container col-12 col-md-12 col-lg-8 col-xl-12">
            <div class="container-fluid">
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <div class="row pt-0"></div>
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="card-title">Enregistrement demandeurs</h3>
                    </div>
                    <div class="card-body">
                       <b> NB </b> : Les champs<span class="text-danger"> <b>*</b> </span>sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">IDENTIFICATION</p>
                        </div>
                        <form method="POST" action="<?php echo e(url('dafs')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <?php echo Form::label('Prénom :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::text('prenom', null, ['placeholder' => 'Votre prénom', 'class' =>
                                    'form-control']); ?>

                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo Form::label('Nom :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::text('nom', null, ['placeholder' => 'Votre nom', 'class' => 'form-control']); ?>

                                </div>                                
                                <div class="form-group col-md-4">
                                    <?php echo Form::label('Date naissance :', null, ['class' => 'control-label']); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::date('date_naiss', null, ['placeholder' => 'La date de naissance', 'class' =>
                                    'form-control']); ?>

                                </div>
                            </div>
                            <div class="form-row">                                
                                <div class="form-group col-md-4">
                                    <?php echo Form::label('Lieu naissance :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::text('lieu', null, ['placeholder' => 'Votre lieu de naissance', 'class' =>
                                    'form-control']); ?>

                                </div>                                
                                <div class="form-group col-md-4">
                                    <?php echo Form::label('Cin :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::text('cin', null, ['placeholder' => 'Votre numéro national d\'identité',
                                    'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-md-4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <?php echo Form::label('e-mail :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::email('email', null, ['placeholder' => 'Votre adresse e-mail', 'class' =>
                                    'form-control', 'id' => 'email']); ?>

                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo Form::label('Téléphone :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::text('telephone', null, ['placeholder' => 'Numero de telephone', 'class' =>
                                    'form-control']); ?>

                                </div>

                                <div class="form-group col-md-4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <?php echo Form::label('Situation familiale :'); ?>

                                    
                                    <?php echo Form::select('familiale', ['Marié' => 'Marié', 
                                                             'Célibataire' => 'Célibataire'],
                                     null, ['placeholder' => 'Votre situation familiale', 'class'  
                                    => 'form-control', 'id' => 'familiale']); ?>

                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo Form::label('Situation professionnelle :'); ?>

                                    <?php echo Form::select('professionnelle', ['Employé' => 'Employé',
                                                                        'Recherche emploi' => 'Recherche emploi'],
                                                                         null, ['placeholder' => 'Votre situation professionnelle', 'class'  
                                    => 'form-control', 'id' => 'professionnelle']); ?>

                                </div>
                                <div class="form-group col-md-4">
                                    <?php echo Form::label('Adresse :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::textarea('adresse', null, ['placeholder' => 'Votre adresse', 'rows' => 1,
                                    'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">DEMANDE</p>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php echo Form::label('Numéro courrier :'); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::text('numero_courrier', null, ['placeholder' => 'Le numéro du courrier',
                                    'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo Form::label('Date dépot :', null, ['class' => 'control-label']); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::date('date_depot', null, ['placeholder' => 'La date de dépot', 'class' =>
                                    'form-control']); ?>

                                </div>                                
                        </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                </div>
                                <div class="form-group col-md-6">
                                </div>                            

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                </div>    
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2">INSCRIVEZ-VOUS A UN PROGRAMME</p>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                            </div>

                            
                            <div class="form-group col-md-6">
                            </div>
                        </div>
                            <button type="submit" class="btn btn-primary float-right"><i class="far fa-paper-plane"></i>&nbsp;Enregistrer</button>
                        </form>
                       </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/dafs/create.blade.php ENDPATH**/ ?>