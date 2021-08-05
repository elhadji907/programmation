
<?php $__env->startSection('title', 'ONFP - Enregistrement administrateurs'); ?>
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
                    <p class="card-category">Utilisateurs</p>
                </div>
                <div class="card-body">
                                               
                        <form method="POST" action="<?php echo e(url('administrateurs')); ?>">
                           <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1"><b>Civilité</b></label>
                                        <select name="civilite" id="civilite" class="form-control">
                                            <option value="">Selectionnez</option>
                                            <option value="M.">M.</option>
                                            <option value="Mme">Mme</option>
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
                                <label for="input-matricule"><b>Matricule:</b></label>
                                <input type="text" name="matricule" class="form-control" id="input-matricule" placeholder="Matricule" value="<?php echo e(old('matricule')); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('matricule')): ?>
                                        <?php $__currentLoopData = $errors->get('matricule'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input-prenom"><b>Prenom:</b></label>
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
                            <div class="form-group col-md-12">
                                <label for="input-username"><b><?php echo ("Nom d'utilisateur:"); ?></b></label>
                                <input type="text" name="username" class="form-control" id="input-username" placeholder="username" value="<?php echo e(old('username')); ?>">
                                <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('username')): ?>
                                        <?php $__currentLoopData = $errors->get('username'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1"><b>Adresse email:</b></label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail" value=" <?php echo e(old('email')); ?>">
                                <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre email avec qui que ce soit.</small>
                                <small id="emailHelp" class="form-text text-muted">
                                    <?php if($errors->has('email')): ?>
                                    <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </small>
                            </div>
                            <div class="form-group col-md-12">
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
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1"><b>Mot de passe:</b></label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
                                <?php if($errors->has('password')): ?>
                                <?php $__currentLoopData = $errors->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1"><b>Mot de passe:</b>(confirmation)</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Repeter mot de passe">
                                <?php if($errors->has('password_confirmation')): ?>
                                <?php $__currentLoopData = $errors->get('password_confirmation'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
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
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/administrateurs/create.blade.php ENDPATH**/ ?>