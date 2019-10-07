<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
  <div class="sidebar-brand-icon rotate-n-15">
   {{--   <i class="fas fa-laugh-wink"></i>  --}}
   <img src="{{ asset('img/ONFP.png') }}" class="img-fluid logo_onfp" alt="LOGO">
  </div>
  <div class="sidebar-brand-text mx-3">ONFP<sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="{{ url('/home') }}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Tableau de bord</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">


<li class="nav-item">
  <a class="nav-link" href="{{ url('/home') }}">
    <span data-feather="home"></span>
    <span>Accueil</span></a>
</li>
{{--  
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Interface
</div>
  --}}
{{--  <!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Components</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom Components:</h6>
      <a class="collapse-item" href="buttons.html">Buttons</a>
      <a class="collapse-item" href="cards.html">Cards</a>
    </div>
  </div>
</li>  --}}
{{--  
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Utilities</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom Utilities:</h6>
      <a class="collapse-item" href="utilities-color.html">Colors</a>
      <a class="collapse-item" href="utilities-border.html">Borders</a>
      <a class="collapse-item" href="utilities-animation.html">Animations</a>
      <a class="collapse-item" href="utilities-other.html">Other</a>
    </div>
  </div>
</li>  --}}

<!-- Divider -->
<hr class="sidebar-divider my-0">
{{--  
<!-- Heading -->
<div class="sidebar-heading">
  Addons
</div>
  --}}
  <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-white">
      <span data-feather="settings"></span>
    </a>
      <span>Gérer mon profil</span>
      <a class="d-flex align-items-center text-white" href="{{ route('profiles.show', ['user'=>auth()->user()]) }}">
        <span data-feather="plus-circle"></span>
      </a>
  </h6>
<!-- Nav Item - Pages Collapse Menu -->

<li class="nav-item">
    <a class="nav-link" href="{{ route('administrateurs.index') }}">
        <span data-feather="layers"></span>
      <span>Administrer les utilisateurs</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('courriers.show') }}">
        <span data-feather="layers"></span>
      <span>Administrer les courriers</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#">
        <span data-feather="layers"></span>
      <span>Administrer les demandes</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#">
        <span data-feather="layers"></span>
      <span>Administrer les formations</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
        <span data-feather="layers"></span>
      <span>Administrer les opérateurs</span>
    </a>
  </li>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Pages</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Écrans de connexion:</h6>
      <a class="collapse-item"  href="{{ route('profiles.show', ['user'=>auth()->user()]) }}">
        {{ str_limit(Auth::user()->email, 18, '...') }}
        </a>
      <!-- Authentication Links -->
      @guest
      <a class="collapse-item" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
      @if (Route::has('register'))
      <a class="collapse-item" href="{{ route('register') }}">{{ __("S'inscrire") }}</a>
      @endif
      @else
    {{--        
      <h6 class="collapse-header">DIRECTIONS</h6>
      <a class="collapse-item" href="#">DIOF</a>
      <a class="collapse-item" href="#">DEC</a>
      <a class="collapse-item" href="#">DPP</a>
      <a class="collapse-item" href="#">DAF</a>
      <a class="collapse-item" href="#">CG</a>
      <a class="collapse-item" href="#">AC</a>
      <h6 class="collapse-header">SERVICES</h6>
      <a class="collapse-item" href="#">Service Courrier</a>      
      <a class="collapse-item" href="#">COM</a>
      <a class="collapse-item" href="#">URD</a>      
      <a class="collapse-item" href="#">EDITION</a>
      <a class="collapse-item" href="#">SI</a>
      <a class="collapse-item" href="#">CONSTRUCTION</a>
      <h6 class="collapse-header">ANTENNES</h6>
      <a class="collapse-item" href="#">KOLDA</a>
      <a class="collapse-item" href="#">KAOLACK</a>
      <a class="collapse-item" href="#">SAINT-LOUIS</a>
      <a class="collapse-item" href="#">KEDOUGOU</a>
      <a class="collapse-item" href="#">MATAM</a>  
      --}}

      {{-- 
      <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
      <div class="collapse-divider"></div>
      <h6 class="collapse-header">Other Pages:</h6>
      <a class="collapse-item" href="404.html">404 Page</a>
      <a class="collapse-item" href="blank.html">Blank Page</a>
      --}}
      @endguest
    </div>
  </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="charts.html">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Charts</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="{{ url('/table')  }}">
    <i class="fas fa-fw fa-table"></i>
    <span>Tables</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>