<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Vérifiez votre adresse e-mail')); ?></div>

                <div class="card-body">
                    <?php if(session('resent')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(__('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(__('Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification.')); ?>

                    <?php echo e(__("Si vous n'avez pas reçu l'e-mail")); ?>, <a href="<?php echo e(route('verification.resend')); ?>"><?php echo e(__('cliquez ici pour en demander un autre')); ?></a>.
                </div>
            </div>
        </div>
    </div>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/auth/verify.blade.php ENDPATH**/ ?>