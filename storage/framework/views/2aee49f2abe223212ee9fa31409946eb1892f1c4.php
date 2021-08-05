<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier mon profile</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('profiles.update', ['$user' => $user])); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <div class="form-group row">
                            <label for="civilite" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Civilité')); ?></label>   
                            <div class="col-md-6">
                                <select name="civilite" id="civilite" class="form-control">
                                    <option value="<?php echo e(auth::user()->civilite); ?>"><?php echo e(auth::user()->civilite); ?></option>
                                    <?php $__currentLoopData = $civilites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $civilite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($civilite->civilite); ?>"><?php echo e($civilite->civilite); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Prénom')); ?></label>   
                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control form-control-user <?php if ($errors->has('firstname')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('firstname'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="firstname" placeholder="Votre prénom" value="<?php echo e(old('firstname') ?? auth::user()->firstname); ?>" autocomplete="firstname" autofocus>    
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
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Nom')); ?></label>   
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control form-control-user <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" placeholder="Votre nom" value="<?php echo e(old('name') ?? auth::user()->name); ?>" autocomplete="name" autofocus>    
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
                        </div>
                        <div class="form-group row">
                            <label for="date_naissance" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Date de naissance')); ?></label>   
                            <div class="col-md-6">

                                <?php if(auth::user()->date_naissance!==NULL): ?>
                                <input id="date_naissance" type="date" class="form-control form-control-user <?php if ($errors->has('date_naissance')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('date_naissance'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="date_naissance" placeholder="Votre date de naissance" value="<?php echo e(old('date_naissance') ?? auth::user()->date_naissance->format('Y-m-d')); ?>" autocomplete="date_naissance" autofocus>    
                                <?php else: ?>
                                <input id="date_naissance" type="date" class="form-control form-control-user <?php if ($errors->has('date_naissance')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('date_naissance'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="date_naissance" placeholder="Votre date de naissance" value="<?php echo e(old('date_naissance') ?? auth::user()->date_naissance); ?>" autocomplete="date_naissance" autofocus>    
                                <?php endif; ?>
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
                        </div>
                        

                        <div class="form-group row">
                            <label for="lieu_naissance" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Lieu de naissance')); ?></label>   
                            <div class="col-md-6">
                                <input id="lieu_naissance" type="text" class="form-control form-control-user <?php if ($errors->has('lieu_naissance')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('lieu_naissance'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="lieu_naissance" placeholder="Votre lieu de naissance" value="<?php echo e(old('lieu_naissance') ?? auth::user()->lieu_naissance); ?>" autocomplete="lieu_naissance" autofocus>    
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
                        </div>
                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Téléphone')); ?></label>   
                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control form-control-user <?php if ($errors->has('telephone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('telephone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="telephone" placeholder="Votre numéro de téléphone" value="<?php echo e(old('telephone') ?? auth::user()->telephone); ?>" autocomplete="telephone" autofocus>    
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
                        </div>
                       <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Photo de profil')); ?></label> 
                            <div class="custom-file col-md-6">
                                <input type="file" class="custom-file-input <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="image" value="<?php echo e(old('image')); ?>" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Chisir une image...</label> 
                                <img class="pt-1" src="<?php echo e(asset(Auth::user()->profile->getImage())); ?>" width="50" height="auto">
                                <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div> 
                        <button type="submit" class="btn btn-primary">
                           Modifier mon profile
                        </button>                          
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/profiles/edit.blade.php ENDPATH**/ ?>