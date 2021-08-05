<?php $__env->startSection('title', 'ONFP - Liste des modules'); ?>
<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="row justify-content-center">
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
                Liste des modules
            </div> 
          <div class="card-body">
            <div class="table-responsive">
              <div align="right">
                <a href="<?php echo url('modules/create'); ?>"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
              </div>
                <br />
              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    <th>N°</th>
                     <th><?php echo __("module"); ?></th>
                     <th><?php echo __("Domaine"); ?></th>
                     <th><?php echo __("Secteur"); ?></th>
                     <th><?php echo __("Effectif"); ?></th>
                    <th  style="width:10%;">Action</th>
                  </tr>
                </thead>
                <tfoot class="table-dark">
                    <tr>
                      <th>N°</th>
                       <th><?php echo __("module"); ?></th>
                       <th><?php echo __("Domaine"); ?></th>
                       <th><?php echo __("Secteur"); ?></th>
                       <th><?php echo __("Effectif"); ?></th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                <tbody>
                  <?php $i = 1 ?>
                  <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr> 
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $module->name; ?></td>
                    <td><?php echo $module->domaine->name; ?></td>
                    <td><?php echo $module->domaine->secteur->name; ?></td>
                    <td></td>
                    <td class="d-flex align-items-baseline align-content-center">
                        <a href="<?php echo url('modules/' .$module->id. '/edit'); ?>" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit">&nbsp;</i>
                        </a>
                        &nbsp;
                        <a href="<?php echo url('modules/' .$module->id); ?>" class= 'btn btn-primary btn-sm' title="voir">
                          <i class="far fa-eye">&nbsp;</i>
                        </a>
                        &nbsp;
                        <?php echo Form::open(['method'=>'DELETE', 'url'=>'modules/' .$module->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']); ?>

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



<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/modules/index.blade.php ENDPATH**/ ?>