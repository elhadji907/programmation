
<?php $__env->startSection('title', 'ONFP - Liste des demandeurs'); ?>
<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">              
          <?php if(session('success')): ?>
          <div class="alert alert-success">
              <?php echo e(session('success')); ?>

          </div>
          <?php elseif(session('message')): ?>
          <div class="alert alert-success">
              <?php echo e(session('message')); ?>

          </div>
          <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Liste des users demandeurs
            </div> 
          <div class="card-body">
            <div class="table-responsive">
              <div align="right">
                <a href="<?php echo url('demandeurs/create'); ?>"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
              </div>
                <br />
              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    <th style="width:10%;">N° Cour.</th>
                    <th>Cin</th>
                    <th>Civilité</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Module</th>
                    <th>Date dépot</th>
                    <th>Localité</th>
                    
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot class="table-dark">
                    <tr>
                    <th style="width:10%;">N° Cour.</th>
                    <th>Cin</th>
                    <th>Civilité</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Module</th>
                    <th>Date dépot</th>
                    <th>Localité</th>
                    
                    <th>Action</th>
                    </tr>
                  </tfoot>
                <tbody>
                  <?php $__currentLoopData = $demandeurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demandeur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr> 
                    <td><?php echo $demandeur->numero_courrier; ?></td>
                    <td><?php echo $demandeur->cin; ?></td>
                    <td><?php echo $demandeur->user->civilite; ?></td>
                    <td><?php echo $demandeur->user->firstname; ?></td>
                    <td><?php echo $demandeur->user->name; ?></td>
                    <td>
                      <?php $__currentLoopData = $demandeur->modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <span class="btn btn-default"><?php echo $module->name; ?></span> 
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td><?php echo $demandeur->date_depot->format('d/m/Y'); ?></td>          
                    <td><?php echo $demandeur->localite->name; ?></td>          
                            
                    <td class="d-flex align-items-baseline align-content-center">
                        <a href="<?php echo url('demandeurs/' .$demandeur->id. '/edit'); ?>" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit">&nbsp;</i>
                        </a>
                       
                        &nbsp;
                        <?php echo Form::open(['method'=>'DELETE', 'url'=>'demandeurs/' .$demandeur->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']); ?>

                        <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title'=>"supprimer"] ); ?>

                        <?php echo Form::close(); ?>

                    </td>
                  </tr>
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
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/demandeurs/index2.blade.php ENDPATH**/ ?>