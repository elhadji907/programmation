
<?php $__env->startSection('title', 'ONFP - détails demandeurs'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="container-fluid">
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <div class="row pt-0"></div>
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="card-title">Détails demandeurs</h3>
                    </div>
                    <div class="card-body">
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">IDENTIFICATION</p>
                        </div>
                        <?php echo Form::open(['url' => '', 'method' => 'PATCH', 'files' => true]); ?>

                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <?php echo Form::label('CIN'); ?>

                                <?php echo Form::text('cin', $demandeurs->cin, ['placeholder' => 'Votre numéro national d\'identité', 'class'
                                => 'form-control','disabled' => 'disabled']); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo Form::label('Prénom'); ?>

                                <?php echo Form::text('prenom', $utilisateurs->firstname, ['placeholder' => 'Votre prénom', 'class' => 'form-control','disabled' => 'disabled']); ?>

                            </div>

                            <div class="form-group col-md-4">
                                <?php echo Form::label('NOM'); ?>

                                <?php echo Form::text('nom', $utilisateurs->name, ['placeholder' => 'Votre nom', 'class' => 'form-control','disabled' => 'disabled']); ?>

                            </div>

                           
                                <?php echo Form::hidden('username', $utilisateurs->username, ['placeholder' => 'Votre nom', 'class' => 'form-control','disabled' => 'disabled']); ?>

                           
                           
                                <?php echo Form::hidden('matricule', $utilisateurs->matricule, ['placeholder' => 'Votre nom', 'class' => 'form-control','disabled' => 'disabled']); ?>

                           

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <?php echo Form::label('Civilité', null, ['class' => 'control-label']); ?>

                                <?php echo Form::select('civilite', $civilites, $utilisateurs->civilite, ['placeholder' => 'sélectionnez', 'class'
                                => 'form-control','disabled' => 'disabled', 'id' => 'civilites']); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo Form::label('Date naissance', null, ['class' => 'control-label']); ?>

                                <?php echo Form::date('date_naiss', $utilisateurs->date_naissance->format('Y-m-d'), ['placeholder' => 'La date de naissance', 'class' =>
                                'form-control','disabled' => 'disabled']); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo Form::label('Lieu naissance'); ?>

                                <?php echo Form::text('lieu', $utilisateurs->lieu_naissance, ['placeholder' => 'Votre lieu de naissance', 'class' =>
                                'form-control','disabled' => 'disabled']); ?>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <?php echo Form::label('E-mail'); ?>

                                <?php echo Form::email('email', $utilisateurs->email, ['placeholder' => 'Votre adresse e-mail', 'class' =>
                                'form-control','disabled' => 'disabled', 'id' => 'email']); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo Form::label('Téléphone'); ?>

                                <?php echo Form::text('telephone', $utilisateurs->telephone, ['placeholder' => 'Numero de telephone', 'class' =>
                                'form-control','disabled' => 'disabled']); ?>

                            </div>

                            
                            <div class="form-group col-md-4">
                                <?php echo Form::label('Département'); ?>

                                <?php echo Form::select('departements[]', $departements, $utilisateurs->demandeur->departements, ['class' =>
                                'form-control','disabled' => 'disabled', 'id' => 'departement']); ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <?php echo Form::label('Situation familiale'); ?>

                                <?php echo Form::select('familiale', ['Marié' => 'Marié', 'Célibataire' => 'Célibataire'], $utilisateurs->situation_familiale,
                                ['placeholder' => 'Votre situation familiale', 'class' => 'form-control','disabled' => 'disabled', 'id' =>
                                'familiale']); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo Form::label('Situation professionnelle'); ?>

                                <?php echo Form::select('professionnelle', ['Employé' => 'Employé', 'Recherche emploi' =>
                                'Recherche emploi'], $utilisateurs->situation_professionnelle, ['placeholder' => 'Votre situation professionnelle', 'class' =>
                                'form-control','disabled' => 'disabled', 'id' => 'professionnelle']); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo Form::label('Adresse'); ?>

                                <?php echo Form::textarea('adresse', $utilisateurs->adresse, ['placeholder' => 'Votre adresse', 'rows' => 1, 'class'
                                => 'form-control','disabled' => 'disabled']); ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Enregistrée par:'); ?>

                                <?php echo Form::text('cin', $utilisateurs->created_by.'  le  '.$utilisateurs->created_at->format('d/m/Y').' à '.$utilisateurs->created_at->format('H:m:s'), ['placeholder' => '', 'class'
                                => 'form-control','disabled' => 'disabled']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Modifiée par :'); ?>

                                <?php echo Form::text('prenom', $utilisateurs->updated_by.' le '.$utilisateurs->updated_at->format('d/m/Y').' à '.$utilisateurs->updated_at->format('H:m:s'), ['placeholder' => '', 'class' => 'form-control','disabled' => 'disabled']); ?>

                            </div>
                        </div>
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2">DEMANDE</p>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <?php echo Form::label('Numéro courrier'); ?>

                                <?php echo Form::text('numero_courrier', $demandeurs->numero_courrier, ['placeholder' => 'Le numéro du courrier', 'class'
                                => 'form-control','disabled' => 'disabled']); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo Form::label('Date dépot', null, ['class' => 'control-label']); ?>

                                <?php echo Form::date('date_depot', $demandeurs->date_depot->format('Y-m-d'), ['placeholder' => 'La date de dépot', 'class' =>
                                'form-control','disabled' => 'disabled']); ?>

                            </div>

                            <div class="form-group col-md-4">
                                <?php echo Form::label('localité'); ?>

                                <?php echo Form::select('localite', $localites, $demandeurs->localite->name, ['placeholder' => '', 'class' =>
                                'form-control','disabled' => 'disabled', 'id' => 'localite']); ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <?php echo Form::label('Objet'); ?>

                                <?php echo Form::select('objet', $objets, $demandeurs->objet->name, ['placeholder' => '', 'class' => 'form-control','disabled' => 'disabled',
                                'id' => 'objet']); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo Form::label('Type demande'); ?>

                                <?php echo Form::select('type_demande', $types_demandes, $demandeurs->typedemande->name, ['placeholder' =>
                                '--sélectionnez--', 'class' => 'form-control','disabled' => 'disabled', 'id' => 'type_demande']); ?>

                            </div>

                            <div class="form-group col-md-4">
                                <?php echo Form::label('Programme'); ?>

                                <?php echo Form::select('programme', $programmes, $demandeurs->programme->sigle, ['class' => 'form-control','disabled' => 'disabled', 'id' => 'programme']); ?>

                            </div>
                            <input type="hidden" name="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Mot de passe">
                            <?php echo Form::hidden('password', null, ['placeholder' => 'Votre mot de passe', 'class' =>
                            'form-control','disabled' => 'disabled']); ?>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <?php echo Form::label("Niveau d'etude"); ?>

                                <?php echo Form::select('niveaux[]', $niveaux, $demandeurs->nivauxes, ['placeholder' => '', 'class' =>
                                'form-control','disabled' => 'disabled', 'id' => 'niveau']); ?>

                            </div>

                            <div class="form-group col-md-4">
                                <?php echo Form::label('Diplômes'); ?>

                                <?php echo Form::select('diplomes[]', $diplomes, $demandeurs->diplomes, ['placeholder' => 'diplome', 'class' =>
                                'form-control','disabled' => 'disabled', 'id' => 'diplome']); ?>

                            </div>
                            <div class="form-group col-md-4">
                                <?php echo Form::label('module'); ?>

                                <?php echo Form::select('modules[]', $modules, $demandeurs->modules, ['placeholder' => '','class' =>
                                'form-control','disabled' => 'disabled', 'id' => 'module']); ?>

                            </div>
                        </div>                        
                   
                        
                        <?php echo Form::close(); ?>

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

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/demandeurs/show.blade.php ENDPATH**/ ?>