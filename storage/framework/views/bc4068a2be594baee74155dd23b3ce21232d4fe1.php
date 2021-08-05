<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">              
                <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
                <?php endif; ?>
              <div class="card">
                  <div class="card-header">
                      <i class="fas fa-table"></i>
                      Liste des villages
                  </div> 
                <?php if(\Session::has('success')): ?>
                <div class="alert alert-success">
                 <p><?php echo e(\Session::get('success')); ?></p>
                </div>
                <?php endif; ?>
                <div class="card-body">
                  <div class="table-responsive">
                    <div align="right">
                      <a href="<?php echo e(route('villages.create')); ?>"><div class="btn btn-success">Nouveau Village&nbsp;<i class="fas fa-plus"></i></div></a> 
                    </div>
                      <br />
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead class="table-dark">
                        <tr>
                          <th>ID</th>
                          <th>Nom</th>
                          <th>Chef</th>
                          <th>Info</th>
                        </tr>
                      </thead>
                      <tfoot class="table-dark">
                        <tr>
                          <th>ID</th>
                          <th>Nom</th>
                          <th>Chef</th>
                          <th>Info</th>
                        </tr>
                      </tfoot>
                      <tbody>
                          <?php $__currentLoopData = $villages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $village): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <?php echo e($village->id); ?> 
                          </td>
                          <td>
                            <?php echo e($village->nom); ?><br>
                            Region de <?php echo e($village->commune->arrondissement->departement->region->nom); ?><br>
                            Commune de <?php echo e($village->commune->nom); ?>


                          </td>
                          <td>
                                <?php echo e($village->chef->user->name."  ".$village->chef->user->firstname); ?>

                          </td>
                          <td>
                              <a class="btn btn-primary"  href=<?php echo e(route('villages.show',['village'=>$village->id])); ?> title="Modifier"><i class="far fa-edit">&nbsp;</i></a>
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
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/villages/index.blade.php ENDPATH**/ ?>