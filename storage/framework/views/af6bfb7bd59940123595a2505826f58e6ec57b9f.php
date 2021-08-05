
<?php $__env->startSection('title', 'ONFP - Liste des demandeurs de dakar'); ?>
<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
            <?php endif; ?>        
          <div class="row">
            <div class="col-md-12">
                <?php if(session('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('message')); ?>

                </div>
                <?php endif; ?>
              
              <div class="card"> 
                  <div class="card-header">
                      <i class="fas fa-table"></i>
                      Liste des demandeurs de <?php echo $lieu; ?>

                  </div>
                  
                  <div class="card-body">
                    <div class="table-responsive">
                      <div align="right">
                        <a href="<?php echo url('localites/create'); ?>"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
                      </div>
                        <br />
                      <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-dark">
                          <tr>
                            <th>Cin</th>
                            <th>Civilité</th>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Module</th>
                            <th>Téléphone</th>
                            <th>Statut</th>
                            <th style="width:13%;">Action</th>
                          </tr>
                        </thead>
                        <tfoot class="table-dark">
                            <tr>
                              <th>Cin</th>
                              <th>Civilité</th>
                              <th>Prenom</th>
                              <th>Nom</th>
                              <th>Module</th>
                              <th>Téléphone</th>
                              <th>Statut</th>
                              <th>Action</th>
                            </tr>
                          </tfoot>
                        <tbody>
                          <?php $i = 1 ?>
                          <?php $__currentLoopData = $localites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($localite->name == "Dakar"): ?>
                          <?php $__currentLoopData = $localite->demandeurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demandeur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr> 
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $demandeur->user->civilite; ?></td>
                            <td><?php echo $demandeur->user->firstname; ?></td>
                            <td><?php echo $demandeur->user->name; ?></td>
                            <td>
                              <?php $__currentLoopData = $demandeur->modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php echo $module->name; ?>

                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td><?php echo $demandeur->user->telephone; ?></td>
                            <td><?php echo $demandeur->status; ?></td>             
                            <td class="d-flex align-items-baseline align-content-center">
                                <a href="<?php echo url('demandeurs/' .$demandeur->id. '/edit'); ?>" class= 'btn btn-success btn-sm' title="modifier">
                                  <i class="far fa-edit">&nbsp;</i>
                                </a>
                                &nbsp;
                                <a href="<?php echo url('demandeurs/' .$demandeur->id); ?>" class= 'btn btn-primary btn-sm' title="voir">
                                  <i class="far fa-eye">&nbsp;</i>
                                </a>
                                &nbsp;
                                <?php echo Form::open(['method'=>'DELETE', 'url'=>'demandeurs/' .$demandeur->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']); ?>

                                <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title'=>"supprimer"] ); ?>

                                <?php echo Form::close(); ?>

                            </td>
                          </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>                
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/demandeurs/dakar.blade.php ENDPATH**/ ?>