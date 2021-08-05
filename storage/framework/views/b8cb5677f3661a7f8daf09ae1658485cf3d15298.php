<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur|Courrier')): ?>
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(url('/home')); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="<?php echo e(asset('img/ONFP.png')); ?>" class="img-fluid logo_onfp w-75" alt="LOGO">
        </div>
        <div class="sidebar-brand-text mx-3">ONFP<sup><?php echo e(__('1')); ?></sup></div>
    </a>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur|Courrier')): ?>
        <a class="nav-link" href="<?php echo e(url('/home')); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span></a>
        <?php endif; ?>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(url('/home')); ?>">
            <span data-feather="home"></span>
            <span>Accueil</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-white">
        <a class="nav-link d-flex align-items-center text-white"
            href="<?php echo e(route('profiles.show', ['user' => auth()->user()])); ?>">
            

            <span data-feather="user"></span>
            <span> Gérer mon profil </span>
        </a>
    </h6>
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <hr class="sidebar-divider my-0">
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-white">
        <a class="nav-link d-flex align-items-center text-white" href="<?php echo e(route('localites.pdcej')); ?>">
            

            <span data-feather="user"></span>
            <span>Programme PDCEJ </span>
        </a>
    </h6>
    <?php endif; ?>
    <hr class="sidebar-divider my-0">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Demandeur|Administrateur|Gestionnaire')): ?>
    <li class="nav-item">
        <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
        <a class="nav-link collapsed" href="<?php echo e(route('demandeurs.index')); ?>" data-toggle="collapse"
            data-target="#collapsePages_formation" aria-expanded="true" aria-controls="collapsePages_formation">
            <span data-feather="layers"></span>
            <span>Gestion des formations</span>
        </a>
        <?php endif; ?>
        <div id="collapsePages_formation" class="collapse" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?php echo e(route('demandeurs.index')); ?>">
                    <span>Toutes</span>
                </a>
                <a class="collapse-item" href="<?php echo e(route('individuelles.index')); ?>">
                    <span>individuelles</span>
                </a>
                <a class="collapse-item" href="<?php echo e(route('collectives.index')); ?>">
                    <span>collectives</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Operateur|Demandeur')): ?>
    <a class="nav-link" href="<?php echo e(route('operateurs.index')); ?>">
        <span data-feather="users"></span>
        <span>Devenir opérateur</span>
    </a>
    <?php endif; ?>
</li>

<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur|Courrier')): ?>
    <a class="nav-link" href="<?php echo e(route('courriers.index')); ?>">
        <span data-feather="mail"></span>
        <span>Gestion courriers</span>
    </a>
    <?php endif; ?>
</li>

<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_daf"
        aria-expanded="true" aria-controls="collapsePages_daf">
        <span data-feather="folder"></span>
        <span>DOSSIERS DAF</span>
    </a>
    <?php endif; ?>
    <div id="collapsePages_daf" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            
            <?php if(auth()->guard()->guest()): ?>
                <a class="collapse-item" href="<?php echo e(route('login')); ?>"><?php echo e(__('Se connecter')); ?></a>
                <?php if(Route::has('register')): ?>
                    <a class="collapse-item" href="<?php echo e(route('register')); ?>"><?php echo e(__("S'inscrire")); ?></a>
                <?php endif; ?>
            <?php else: ?>
                
                <a class="collapse-item" href="<?php echo e(route('bordereaus.index')); ?>">
                    <span>Bordereaux</span>
                </a>
                
                <a class="collapse-item" href="<?php echo e(route('facturesdafs.index')); ?>">
                    <span>Factures</span>
                </a>
                <a class="collapse-item" href="<?php echo e(route('tresors.index')); ?>">
                    <span>Recettes Trésor</span>
                </a>
                <a class="collapse-item" href="<?php echo e(route('banques.index')); ?>">
                    <span>Frais Bancaire</span>
                </a>
                <a class="collapse-item" href="<?php echo e(route('bordereaus.index')); ?>">
                    <span>Ordres de missions</span>
                </a>
                <a class="collapse-item" href="<?php echo e(route('bordereaus.index')); ?>">
                    <span>Etat paiement</span>
                </a>
                <a class="collapse-item" href="<?php echo e(route('bordereaus.index')); ?>">
                    <span>EPP</span>
                </a>
                <a class="collapse-item" href="<?php echo e(route('bordereaus.index')); ?>">
                    <span>FAD</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_projet"
        aria-expanded="true" aria-controls="collapsePages_projet">
        <span data-feather="folder"></span>
        <span>PROJETS</span>
    </a>
    <?php endif; ?>
    <div id="collapsePages_projet" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            
            <?php if(auth()->guard()->guest()): ?>
                <a class="collapse-item" href="<?php echo e(route('login')); ?>"><?php echo e(__('Se connecter')); ?></a>
                <?php if(Route::has('register')): ?>
                    <a class="collapse-item" href="<?php echo e(route('register')); ?>"><?php echo e(__("S'inscrire")); ?></a>
                <?php endif; ?>
            <?php else: ?>
                
                <a class="collapse-item" href="<?php echo e(route('activites.index')); ?>">
                    <span>Activites</span>
                </a>
                <a class="collapse-item" href="<?php echo e(route('projets.index')); ?>">
                    <span>Projets</span>
                </a>
                <a class="collapse-item" href="<?php echo e(route('depenses.index')); ?>">
                    <span>Dépenses</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</li>

<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link" href="<?php echo e(route('operateurs.index')); ?>">
        <span data-feather="users"></span>
        <span>Gestion opérateurs</span>
    </a>
    <?php endif; ?>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur|Gestionnaire')): ?>
    <a class="nav-link" href="<?php echo e(route('demandeurs.create')); ?>">
        <span data-feather="layers"></span>
        <span>Gestion demandes</span>
    </a>
    <?php endif; ?>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link" href="<?php echo e(route('demandeurs.index')); ?>">
        <span data-feather="layers"></span>
        <span>Lister demandes</span>
    </a>
    <?php endif; ?>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link" href="#">
        <span data-feather="layers"></span>
        <span>Gestion formations</span>
    </a>
    <?php endif; ?>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link" href="<?php echo e(route('employees.index')); ?>">
        <span data-feather="layers"></span>
        <span>Gestion des employees</span>
    </a>
    <?php endif; ?>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur|Courrier')): ?>
    <a class="nav-link" href="<?php echo e(route('directions.index')); ?>">
        <span data-feather="layers"></span>
        <span>Directions / Services</span>
    </a>
    <?php endif; ?>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link" href="<?php echo e(route('secteurs.index')); ?>">
        <span data-feather="layers"></span>
        <span>Secteurs</span>
    </a>
    <?php endif; ?>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link" href="<?php echo e(route('domaines.index')); ?>">
        <span data-feather="layers"></span>
        <span>Domaines</span>
    </a>
    <?php endif; ?>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link" href="<?php echo e(route('modules.index')); ?>">
        <span data-feather="layers"></span>
        <span>Modules</span>
    </a>
    <?php endif; ?>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link" href="<?php echo e(route('diplomes.index')); ?>">
        <span data-feather="layers"></span>
        <span>Diplômes</span>
    </a>
    <?php endif; ?>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link" href="<?php echo e(route('options.index')); ?>">
        <span data-feather="layers"></span>
        <span>Option diplômes</span>
    </a>
    <?php endif; ?>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link" href="<?php echo e(route('programmes.index')); ?>">
        <span data-feather="layers"></span>
        <span>Programmes</span>
    </a>
    <?php endif; ?>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link" href="<?php echo e(route('nivauxs.index')); ?>">
        <span data-feather="layers"></span>
        <span>Niveaux</span>
    </a>
    <?php endif; ?>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link" href="<?php echo e(route('localites.index')); ?>">
        <span data-feather="layers"></span>
        <span>Localités</span>
    </a>
    <?php endif; ?>
</li>
<li class="nav-item">
    <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
        aria-controls="collapsePages">
        <span data-feather="folder"></span>
        <span>Pages</span>
    </a>
    <?php endif; ?>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Écrans de connexion:</h6>
            <a class="collapse-item" href="<?php echo e(route('profiles.show', ['user' => auth()->user()])); ?>">
                
            </a>
            <!-- Authentication Links -->
            <?php if(auth()->guard()->guest()): ?>
                <a class="collapse-item" href="<?php echo e(route('login')); ?>"><?php echo e(__('Se connecter')); ?></a>
                <?php if(Route::has('register')): ?>
                    <a class="collapse-item" href="<?php echo e(route('register')); ?>"><?php echo e(__("S'inscrire")); ?></a>
                <?php endif; ?>
            <?php else: ?>
                <h6 class="collapse-header">UTILISATEURS</h6>
                <a class="collapse-item" href="<?php echo e(route('administrateurs.index')); ?>">
                    <span data-feather="user"></span>
                    <span>Administrateurs</span>
                </a>
                <a class="collapse-item" href="<?php echo e(route('gestionnaires.index')); ?>">
                    <span data-feather="user"></span>
                    <span>Gestionnaires</span>
                </a>
                </a>
                <a class="collapse-item" href="<?php echo e(route('villages.index')); ?>">
                    <span data-feather="user"></span>
                    <span>Villages</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
<?php /**PATH /var/www/html/programmation/resources/views/layout/sidebar.blade.php ENDPATH**/ ?>