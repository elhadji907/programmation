<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row mt-4">
       <div class="col-4 text-center">
            <img src="<?php echo e(asset(auth::user()->profile->getImage())); ?>" class="rounded-circle w-50"/>
       </div>
       <div class="col-8">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user->profile)): ?>                   
            <div class="mt-3 d-flex">
                <div class="mr-1"><b><?php echo e(auth::user()->civilite); ?></b></div>
                <div class="mr-1"><b><?php echo e(auth::user()->firstname); ?></b></div>
                <div class="mr-1"><b><?php echo e(auth::user()->name); ?></b></div>

                <?php if(auth::user()->civilite=="M."): ?>
                    <div class="mr-1"><b>né le</b></div>
                <?php endif; ?> 
                <?php if(auth::user()->civilite=="Mme"): ?>                                  
                    <div class="mr-1"><b>née le</b></div>
                <?php endif; ?>                
                <?php if(auth::user()->date_naissance!==NULL): ?>
                    <div class="mr-1"><b><?php echo e(auth::user()->date_naissance->format('d M Y')); ?></b></div>
                <?php endif; ?>
                <?php if(auth::user()->lieu_naissance!==NULL): ?>
                <div class="mr-1"><b>à</b></div>
                <div class="mr-1"><b><?php echo e(auth::user()->lieu_naissance); ?></b></div>
                <?php endif; ?>
            </div>
    
            <div class="mt-0">
                <div class="mr-3"><b><?php echo e(__("Nom d'utilisateur")); ?>:</b> <?php echo e(auth::user()->username); ?></div>
                <div class="mr-3"><b>Adresse e-mail:</b> <?php echo e(auth::user()->email); ?></div>
                <div class="mr-3"><b>Téléphone:</b> <?php echo e(auth::user()->telephone); ?></div>
            </div>
            <a href="<?php echo e(route('profiles.edit', ['username'  => auth::user()->username])); ?>" 
                class="btn btn-outline-secondary mt-3">Modifier mon profile</a>             
            <?php endif; ?> 
        </div>
    </div>
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur|Courrier')): ?>
    <div class="list-group mt-5">
        <?php $__currentLoopData = $courriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courrier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <div class="list-group-item">
            <h4><a href="<?php echo route('courriers.show', $courrier->id); ?>"><?php echo $courrier->objet; ?></a></h4>
            <p><?php echo $courrier->message; ?></p>
            <p><strong>Type de courrier : </strong> <?php echo $courrier->types_courrier->name; ?></p>
            <div class="d-flex justify-content-between align-items-center">
                <small>Posté le <?php echo $courrier->created_at->format('d/m/Y à H:m'); ?></small>
                <span class="badge badge-primary"><?php echo $courrier->user->firstname; ?>&nbsp;<?php echo $courrier->user->name; ?></span>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </div>
    <div class="d-flex justify-content-center pt-2">
        <?php echo $courriers->links(); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/profiles/show.blade.php ENDPATH**/ ?>