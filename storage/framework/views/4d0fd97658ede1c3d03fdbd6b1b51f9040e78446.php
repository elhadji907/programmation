<div id="content">
  
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow border-bottom-success border-top-success">
  
     
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        
         <span data-feather="menu"></span>
      </button>
  
   
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          
        </div>
      </form>
    
            
    

    
    <?php if (! (auth()->user()->unReadNotifications->isEmpty())): ?>
    <li class="nav-item dropdown no-arrow mx-1"> 
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        
        <span data-feather="bell"></span>
       
        <span class="badge badge-danger badge-counter"> <?php echo auth()->user()->unReadNotifications->count(); ?> </span>
      </a>
     
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
         <?php echo __("Centre d'alerte"); ?>

        </h6>        
        <?php $__currentLoopData = auth()->user()->unReadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a class="dropdown-item d-flex align-items-center" 
          href="<?php echo e(route('courriers.showFromNotification', ['courrier'=>$notification->data['courrierId'], 'notification'=>$notification->id])); ?>">
           
              
            <div>
                <div class="small text-gray-500"><?php echo $notification->created_at->format('d/m/Y'); ?></div>
                <span class="font-weight-bold"><?php echo $notification->data['firstname']; ?>&nbsp;<?php echo $notification->data['name']; ?>

                </span>
                 a posté un commentaire sur          
                <span class="font-weight-bold">&laquo;<?php echo $notification->data['courrierTitle']; ?>&raquo;</span>
            </div>
          </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
        
      </div>
    </li>
    <?php endif; ?>
    

      <!-- Nav Item - Messages -->
      
        
          
          
          
          
        
        
        
          
            
          
          
            
              
              
            
            
              
              
            
          
          
            
              
              
            
            
              
              
            
          
          
            
              
              
            
            
              
              
            
          
          
            
              
              
            
            
              
              
            
          
          
        
      

      
      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo e(Auth::user()->username); ?></span>
          <img class="img-profile rounded-circle" src="<?php echo e(asset(Auth::user()->profile->getImage())); ?>">

         
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            

          <a class="dropdown-item" href="<?php echo e(route('profiles.show', ['user'=>auth()->user()])); ?>">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo e(Auth::user()->firstname); ?> <?php echo e(Auth::user()->name); ?></span>
          </a>
         
        <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur|Courrier')): ?>
          <a class="dropdown-item" href="<?php echo e(route('courriers.create')); ?>">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            <?php echo e((" Initier un courrier")); ?>

          </a>
          <?php endif; ?>
          
       
          <a class="dropdown-item" href="<?php echo e(route('profiles.show', ['user'=>auth()->user()])); ?>">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
           <?php echo e((" Profil")); ?>

          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
            <?php echo e(("Réglages")); ?>

          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            <?php echo e("Journal d'activité"); ?>

          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <?php echo e(("Déconnexion ")); ?>

          </a>
        </div>
      </li>

    </ul>

  </nav>
  
  <!-- End of Topbar --><?php /**PATH /var/www/html/programmation/resources/views/layout/navbar.blade.php ENDPATH**/ ?>