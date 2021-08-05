<?php $__env->startSection('title', 'ONFP - Enregistrement demandeurs'); ?>
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
                        <form method="POST" action="<?php echo e(url('demandeurs')); ?>">
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
                                    <?php echo Form::label('Civilité :', null, ['class' => 'control-label']); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::select('civilite', $civilites, null, ['placeholder' => '--sélectionnez--',
                                    'class' => 'form-control', 'id' => 'civilite']); ?>

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
                                    <?php echo Form::label("Département :"); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::select('departements[]', $departements, null, ['placeholder' => '', 'class' =>
                                    'form-control', 'id' => 'departement']); ?>

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
                                    <?php echo Form::label("module :"); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::select('modules', $modules, null, ['placeholder' => '', 'class' =>
                                    'form-control', 'id' => 'module']); ?>

                                </div>                            

                            </div>
                            <div class="form-row">
                               
    
                                <div class="form-group col-md-6">
                                    <?php echo Form::label("Diplômes :"); ?><span class="text-danger"> <b>*</b> </span>
                                    <?php echo Form::select('diplomes[]', $diplomes, null, ['placeholder' => 'diplome', 'class' =>
                                    'form-control', 'id' => 'diplome']); ?>

                                </div>

                            </div>
                       
                        
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2">INSCRIVEZ-VOUS A UN PROGRAMME</p>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <?php echo Form::label("Programme :"); ?>

                                <?php echo Form::select('programme', $programmes, null, ['placeholder' => 'sélectionner un programme', 'class' =>
                                'form-control', 'id' => 'programme']); ?>

                            </div>

                            
                           

                        </div>                        
                        <input type="hidden" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Mot de passe">
                    <?php echo Form::hidden('password', null, ['placeholder' => 'Votre mot de passe', 'class' =>
                    'form-control']); ?>

                            <button type="submit" class="btn btn-primary"><i
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

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/demandeurs/create.blade.php ENDPATH**/ ?>