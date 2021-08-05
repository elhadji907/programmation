<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'ONFP')); ?></title>

    
    <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    
    <link href="<?php echo e(asset('css/sb-admin-2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/myStyle.css')); ?>" rel="stylesheet">
        
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">

    
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="<?php echo e(asset('fonts.gstatic.com')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app" class="bg-gradient-primary center" style="height: 100vh;">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm border-bottom-success">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <img src="<?php echo e(asset('img/ONFP.png')); ?>" class="pr-3" width="50px" style="border-right: solid 1px #333; "/>
                    <span class="pl-3"><?php echo e(config('app.name', 'ONFP')); ?></span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('CONNEXION')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('INSCRIPTION')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->firstname); ?> <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</div>

  <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>


  <script src="<?php echo e(asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>


  <script src="<?php echo e(asset('js/sb-admin-2.min.js')); ?>"></script>


  <script src="<?php echo e(asset('vendor/chart.js/Chart.min.js')); ?>"></script>

 
  <script src="<?php echo e(asset('js/demo/chart-area-demo.js')); ?>"></script>
  <script src="<?php echo e(asset('js/demo/chart-pie-demo.js')); ?>"></script>

  
  <!-- Page level plugins -->
  <script src="<?php echo e(asset('vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(asset('vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>


  <!-- Page level custom scripts -->
  <script src="<?php echo e(asset('js/demo/datatables-demo.js')); ?>"></script>
  <script src="<?php echo e(asset('js/feather.min.js')); ?>"></script>
  
  <script type="text/javascript">
  
    $("#civilite").select2({
          placeholder: "selectioner votre civilite",
          allowClear: true
      });
    </script>
    
  <script>
      feather.replace()
  </script>  
  <!-- Scripts -->
  <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</body>
</html>
<?php /**PATH /var/www/html/programmation/resources/views/layouts/app.blade.php ENDPATH**/ ?>