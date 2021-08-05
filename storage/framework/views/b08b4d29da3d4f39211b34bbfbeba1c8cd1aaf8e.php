
<?php $__env->startSection('title', 'ONFP - Création bénéficiaires'); ?>
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <div class="container-fluid">
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
            <?php endif; ?>                    
            <div class="row pt-5"></div>
            <div class="card">
                <div class="card-header card-header-primary text-center">
                    <h3 class="card-title">Enregistrement</h3>
                    <p class="card-category">bénéficiaire</p>
                </div>
                <div class="card-body">
                                               
                        <form method="POST" action="<?php echo e(url('beneficiaires')); ?>">
                           <?php echo csrf_field(); ?>
                            <div class="form-row">                    
                                <div class="form-group col-md-6">
                                <label for="input-cin"><b>CIN:</b></label>
                                <input type="text" name="cin" class="form-control" id="input-cin" placeholder="numéro cin national" value="<?php echo e(old('cin')); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('cin')): ?>
                                        <?php $__currentLoopData = $errors->get('cin'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><b>Civilité</b></label>
                                <select name="civilite" id="civilite" class="form-control">
                                        <option value="">--Selectionner--</option>
                                    <?php $__currentLoopData = $civilites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $civilite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($civilite->civilite); ?>"><?php echo e($civilite->civilite); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('civilite')): ?>
                                    <?php $__currentLoopData = $errors->get('civilite'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input-prenom"><b>Prénom:</b></label>
                                <input type="text" name="prenom" class="form-control" id="input-prenom" placeholder="Prenom" value="<?php echo e(old('prenom')); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('prenom')): ?>
                                        <?php $__currentLoopData = $errors->get('prenom'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                            </div>                            
                            <div class="form-group col-md-6">
                                <label for="input-nom"><b>Nom:</b></label>
                                <input type="text" name="nom" class="form-control" id="input-nom" placeholder="Nom" value="<?php echo e(old('nom')); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('nom')): ?>
                                        <?php $__currentLoopData = $errors->get('nom'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input-date"><b>Date naissance:</b></label>
                                <input type="date" name="date" class="form-control" id="input-date" placeholder="date de naissance" value="<?php echo e(old('date')); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('date')): ?>
                                        <?php $__currentLoopData = $errors->get('date'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                            </div>                            
                            <div class="form-group col-md-6">
                                <label for="input-lieu"><b>Lieu naissance:</b></label>
                                <input type="text" name="lieu" class="form-control" id="input-lieu" placeholder="votre lieu de naissance" value="<?php echo e(old('lieu')); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('lieu')): ?>
                                        <?php $__currentLoopData = $errors->get('lieu'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="input-region"><b>Région:</b></label>
                                <input type="text" name="region" class="form-control" id="input-region" placeholder="region" value="<?php echo e(old('region')); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('region')): ?>
                                        <?php $__currentLoopData = $errors->get('region'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                            </div>                            
                            <div class="form-group col-md-6">
                                <label for="input-departement"><b>Département:</b></label>
                                <input type="text" name="departement" class="form-control" id="input-departement" placeholder="departement" value="<?php echo e(old('departement')); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('departement')): ?>
                                        <?php $__currentLoopData = $errors->get('departement'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="input-arrondissement"><b>Arrondissement:</b></label>
                                <input type="text" name="arrondissement" class="form-control" id="input-arrondissement" placeholder="arrondissement" value="<?php echo e(old('arrondissement')); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('arrondissement')): ?>
                                        <?php $__currentLoopData = $errors->get('arrondissement'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                            </div>                            
                            <div class="form-group col-md-6">
                                <label for="input-commune"><b>Commune:</b></label>
                                <input type="text" name="commune" class="form-control" id="input-commune" placeholder="commune" value="<?php echo e(old('commune')); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('commune')): ?>
                                        <?php $__currentLoopData = $errors->get('commune'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><b>Adresse email:</b></label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail" value=" <?php echo e(old('email')); ?>">
                                
                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('email')): ?>
                                    <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><b>Téléphone:</b></label>
                                <input type="text" name="telephone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telephone" value="<?php echo e(old('telephone')); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('telephone')): ?>
                                    <?php $__currentLoopData = $errors->get('telephone'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                            <div class="card card-header text-center bg-gradient-default col-md-12">
                                <h1 class="h4 mb-0">Formations souhaitées</h1>
                            </div>                      
                        </div>                          
                        <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>&nbsp;Enregistrer</button>
                        </form>
                        <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es saisies svp</h5>
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
                                        $(document).ready(function () {
                                            $("#error-modal").modal({
                                                'show':true,
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
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/beneficiaires/create.blade.php ENDPATH**/ ?>