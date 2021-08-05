
<?php $__env->startSection('title', 'ONFP - Liste personnel'); ?>
<?php $__env->startSection('content'); ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur|Gestionnaire|Courrier')): ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
      
    </div>
    <!-- Content Row -->
    <div class="row">

     
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <a class="nav-link" href="<?php echo e(route('courriers.index')); ?>">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">GESTION DES COURRIERS</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e(\App\Courrier::get()->count()); ?></div>
              </div>
              <div class="col-auto">
                
                <span data-feather="mail"></span>
              </div>
            </div>
          </div> 
          </a>
        </div>
      </div>
     
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <a class="nav-link" href="<?php echo e(route('demandeurs.index')); ?>">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">GESTION DES DEMANDES</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e(\App\Demandeur::get()->count()); ?></div>
              </div>
              <div class="col-auto">
              
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </a>
        </div>
      </div>

     
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <a class="nav-link" href="#">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">GESTION DES OPERATEURS</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    
                  </div>
                
                </div>
              </div>
              <div class="col-auto">
                
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
              </div>
            </div>
          </div>
         </a>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <a class="nav-link" href="<?php echo e(route('personnels.index')); ?>">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Gestion du personnel</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e(\App\Personnel::get()->count()); ?></div>
              </div>
              <div class="col-auto">
                
                <i class="fa fa-user" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
       </a>
      </div>
    </div>
  <?php endif; ?>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card"> 
              <div class="card-header">
                                
                 <img src="<?php echo e(asset("img/stats_15267.png")); ?>" class="w-5"/>
                  Statistiques Générales
              </div>             
          <div class="card-body">
              <?php echo $chart->container(); ?>

          </div>
        </div>
      </div>          
  </div>
</div>
</div><br/>
<?php $__env->stopSection(); ?>
<?php echo $chart->script(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/presentations/index.blade.php ENDPATH**/ ?>