<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card card-header text-center bg-gradient-success">
                    <h1 class="h4 text-white mb-0"><span data-feather="info"></span> INSCRIPTION</h1>
                </div>
                <div class="card-body">
                    <form class="user" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="firstname"><b><?php echo e(__('Prénom')); ?></b>(<span class="text-danger">*</span>)</label>
                                    <input id="firstname" type="text" class="form-control <?php if ($errors->has('firstname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('firstname'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="firstname" placeholder="Votre et prenom" value="<?php echo e(old('firstname')); ?>" autocomplete="firstname" autofocus>
                                    <?php if ($errors->has('firstname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('firstname'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>                            
                            <div class="form-group col-md-4">
                                <label for="name"><b><?php echo e(__('Nom')); ?></b>(<span class="text-danger">*</span>)</label>
                                <input id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" placeholder="Votre et nom" value="<?php echo e(old('name')); ?>" autocomplete="name" autofocus>

                                <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>                                                       
                            <div class="form-group col-md-4">
                                <label for="username"><b><?php echo e(__('Pseudo')); ?></b>(<span class="text-danger">*</span>)</label>
                                <input id="username" type="text" class="form-control <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="username" placeholder="Ex: jean21" value="<?php echo e(old('username')); ?>" autocomplete="username" autofocus>    
                                <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>
                        <div class="form-row">
                                                        
                            <div class="form-group col-md-4">
                                <label for="date_naissance"><b><?php echo e(__('Date de naissance')); ?></b>(<span class="text-danger">*</span>)</label>
                                    <input id="date_naissance" <?php echo e($errors->has('date_r') ? 'is-invalid' : ''); ?> type="date" class="form-control <?php if ($errors->has('date_naissance')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('date_naissance'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="date_naissance" placeholder="Votre date de naissance" value="<?php echo e(old('date_naissance')); ?>" autocomplete="username" autofocus>    
                                    <?php if ($errors->has('date_naissance')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('date_naissance'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div class="form-group col-md-4">
                            <label for="lieu_naissance"><b><?php echo e(__('Lieu de naissance')); ?></b>(<span class="text-danger">*</span>)</label>
                                <input id="lieu_naissance" type="text" class="form-control <?php if ($errors->has('lieu_naissance')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('lieu_naissance'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="lieu_naissance" placeholder="Votre lieu de naissance" value="<?php echo e(old('lieu_naissance')); ?>" autocomplete="lieu_naissance">
                                <?php if ($errors->has('lieu_naissance')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('lieu_naissance'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                                                    
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1"><b>Civilité</b></b>(<span class="text-danger">*</span>)</label>
                                <select name="civilite" id="civilite" class="form-control <?php echo e($errors->has('civilite') ? 'is-invalid' : ''); ?>">
                                        <option value="">-selectionnez-</option>
                                        <option value="M."><?php echo e(('M.')); ?></option>
                                        <option value="Mme"><?php echo e(('Mme')); ?></option>
                                </select>
                                <?php if ($errors->has('civilite')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('civilite'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="email"><b><?php echo e(__('Addresse E-Mail')); ?></b>(<span class="text-danger">*</span>)</label>
                                <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" placeholder="Votre adresse e-mail" value="<?php echo e(old('email')); ?>" autocomplete="email">

                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="telephone"><b><?php echo e(__('Telephone')); ?></b>(<span class="text-danger">*</span>)</label>
                                <input id="telephone" type="text" class="form-control <?php if ($errors->has('telephone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('telephone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="telephone" placeholder="Votre numero de telephone" value="<?php echo e(old('telephone')); ?>" autocomplete="telephone" autofocus>

                                <?php if ($errors->has('telephone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('telephone'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>  <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="password"><b><?php echo e(__('Mot de passe')); ?></b>(<span class="text-danger">*</span>)</label>
                                <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" placeholder="Votre mot de passe" autocomplete="new-password">

                                <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>                            
                            <div class="form-group col-md-6">
                            <label for="password-confirm"><b><?php echo e(__('Mot de passe confirmation')); ?></b>(<span class="text-danger">*</span>)</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Répéter votre mot de passe" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-row">
                        </div>
                        <div class="col-md-12 offset-md-0">
                            <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fas fa-paper-plane"></i>&nbsp;
                                <?php echo e(__("Créer un compte")); ?>

                            </button>
                        </div>
                        <hr>
                        <div class="text-center">
                          <a class="small" href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Mot de passe oublié?')); ?></a>
                        </div>
                        <div class="text-center">
                          <a class="small" href="<?php echo e(route('login')); ?>"><?php echo e(__("Vous avez déjà un compte? S'identifier!")); ?></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/auth/register.blade.php ENDPATH**/ ?>