
<?php $__env->startSection('title', 'ONFP - Fiche Couriers departs'); ?>

<?php $__env->startSection('extra-js'); ?>
    <script>
        function toggleReplayComment(id)
        {
            let element = document.getElementById('replayComment-' +id);
            element.classList.toggle('d-none');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="container">
            <div class="container-fluid">
                <div class="card">
                    <?php $__currentLoopData = $departs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $depart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $depart->courrier->types_courrier->name; ?></h5>
                        <h5 class="card-category"><?php echo $depart->courrier->objet; ?></h5>
                        <p><?php echo e($depart->courrier->message); ?></p>

                        <div class="d-flex justify-content-between align-items-center">
                            <small>Posté le <?php echo Carbon\Carbon::parse($depart->courrier->created_at)->format('d/m/Y à H:i:s'); ?></small>
                            <span class="badge badge-primary"><?php echo $depart->courrier->user->firstname; ?>&nbsp;<?php echo $depart->courrier->user->name; ?></span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $depart->courrier)): ?>     
                            <a href="<?php echo url('departs/' .$depart->id. '/edit'); ?>" title="modifier" class="btn btn-outline-warning">
                                <i class="far fa-edit">&nbsp;Modifier</i>
                            </a>
                            <?php endif; ?> 
                            <a href="<?php echo url('courriers/' .$depart->courrier->id. '/edit'); ?>" title="voir les d&eacute;tails du courrier" class="btn btn-outline-primary">
                                <i class="far fa-eye">&nbsp;D&eacute;tails</i>
                            </a>
                            
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $depart->courrier)): ?>     
                            <?php echo Form::open(['method'=>'DELETE', 'url'=>'departs/' .$depart->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']); ?>

                            <?php echo Form::button('<i class="fa fa-trash">&nbsp;Supprimer</i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger', 'title'=>"supprimer"] ); ?>

                            <?php echo Form::close(); ?>

                            <?php endif; ?> 
                        </div>
                    </div>                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <hr>

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Commentaires</h5>
                            <?php $__empty_1 = true; $__currentLoopData = $depart->courrier->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="card mt-2">
                                <div class="card-body">
                                    <?php echo $comment->content; ?>

                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small>Posté le <?php echo Carbon\Carbon::parse($comment->created_at)->format('d/m/Y à H:i:s'); ?></small>
                                        <span class="badge badge-primary"><?php echo $comment->user->firstname; ?>&nbsp;<?php echo $comment->user->name; ?></span>
                                    </div>
                                </div>
                            </div>
                            
                            <?php $__currentLoopData = $comment->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $replayComment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card mt-2 ml-5">
                                <div class="card-body">
                                    <?php echo $replayComment->content; ?>

                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small>Posté le <?php echo Carbon\Carbon::parse($replayComment->created_at)->format('d/m/Y à H:i:s'); ?></small>
                                        <span class="badge badge-primary"><?php echo $replayComment->user->firstname; ?>&nbsp;<?php echo $replayComment->user->name; ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(auth()->guard()->check()): ?>
                            <button class="btn btn-info btn-sm mt-2" id="commentReplyId" onclick="toggleReplayComment(<?php echo e($comment->id); ?>)">
                                Répondre
                            </button>
                            <form method="POST" action="<?php echo e(route('comments.storeReply', $comment)); ?>" class="ml-5 d-none" id="replayComment-<?php echo e($comment->id); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="replayComment"><b>Ma réponse</b></label>
                                    <textarea class="form-control <?php if ($errors->has('replayComment')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('replayComment'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"  name="replayComment" id="replayComment" rows="3" placeholder="Répondre à ce commentaire"></textarea>
                                    <small id="emailHelp" class="form-text text-muted">
                                        <?php if($errors->has('replayComment')): ?>
                                        <?php $__currentLoopData = $errors->get('replayComment'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </small>
                                </div>
                                <button class="btn btn-primary btn-sm mb-2">
                                    Répondre à ce commentaire
                                </button>
                            </form>                                
                            <?php endif; ?>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <div class="alert alert-info">Aucun commentaire pour ce courrier</div>
                                
                            <?php endif; ?>
                            <form method="POST" action="<?php echo e(route('comments.store', $depart->courrier->id)); ?>" class="mt-3">
                                <?php echo csrf_field(); ?>                                                         
                                 <div class="form-group">
                                     <label for="commentaire"><b>Votre commentaire</b></label>                                   
                                     <textarea class="form-control <?php if ($errors->has('commentaire')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('commentaire'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="commentaire" id="commentaire" rows="5" placeholder="Ecrire votre commentaire"></textarea>                                     
                                     <small id="emailHelp" class="form-text text-muted">
                                             <?php if($errors->has('commentaire')): ?>
                                             <?php $__currentLoopData = $errors->get('commentaire'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <p class="text-danger"><?php echo e($message); ?></p>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             <?php endif; ?>
                                     </small>
                                 </div>
                                <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>&nbsp;Poster</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/departs/show.blade.php ENDPATH**/ ?>