
<?php $__env->startSection('title', 'ONFP - '.$projet->sigle); ?>
<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="container-fluid">
                <?php if(session()->has('success')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <div class="row pt-5"></div>
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="card-title"><?php echo e($projet->name); ?></h3>
                        <p class="card-category"><?php echo e($projet->sigle); ?></p>
                    </div>
                    <div class="card-body">
                        <form>
                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-8 col-lg-8 col-xs-12 col-sm-12">
                                    <label for="input-name"><b><?php echo e(__('Nom du projet')); ?>:</b></label>
                                    <input type="text" name="name" class="form-control" id="input-name"
                                        placeholder="nom complète" value="<?php echo e(old('name') ?? $projet->name); ?>" disabled>
                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('name')): ?>
                                            <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="input-name"><b><?php echo e(__('Sigle')); ?>:</b></label>
                                    <input type="text" name="sigle" class="form-control" id="input-sigle"
                                        placeholder="nom complète" value="<?php echo e(old('sigle') ?? $projet->sigle); ?>" disabled>
                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('sigle')): ?>
                                            <?php $__currentLoopData = $errors->get('sigle'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Date début :', null, ['class' => 'control-label']); ?>

                                    <?php echo Form::date('debut', Carbon\Carbon::parse($projet->debut)->format('Y-m-d'), ['placeholder' => 'La date de démarrage', 'class' => 'form-control', 'disabled' => 'disabled']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('debut')): ?>
                                            <?php $__currentLoopData = $errors->get('debut'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <?php echo Form::label('Date fin :', null, ['class' => 'control-label']); ?>

                                    <?php echo Form::date('fin', Carbon\Carbon::parse($projet->fin)->format('Y-m-d'), ['placeholder' => 'La date de cloture', 'class' => 'form-control', 'disabled' => 'disabled']); ?>

                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('fin')): ?>
                                            <?php $__currentLoopData = $errors->get('fin'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label for="input-name"><b><?php echo e(__('Budjet')); ?>:</b></label>
                                    <input type="text" name="budjet" class="form-control" id="input-budjet"
                                        placeholder="Bdjet" value="<?php echo e(old('budjet') ?? number_format($projet->budjet,0, ',', ' ') . ' '); ?>" disabled>
                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('budjet')): ?>
                                            <?php $__currentLoopData = $errors->get('budjet'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/projets/show.blade.php ENDPATH**/ ?>