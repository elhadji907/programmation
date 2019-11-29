<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
  <div class="sidebar-brand-icon rotate-n-15">
   <img src="{{ asset('img/ONFP.png') }}" class="img-fluid logo_onfp w-75" alt="LOGO">
  </div>
  <div class="sidebar-brand-text mx-3">ONFP<sup>{{ __("1") }}</sup></div>
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
<!-- Divider -->
<hr class="sidebar-divider my-0">
  <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-white">
      <span data-feather="settings"></span>
    </a>
      <span>Gérer mon profil</span>
      <a class="d-flex align-items-center text-white" href="{{ route('profiles.show', ['user'=>auth()->user()]) }}">
        <span data-feather="plus-circle"></span>
      </a>
  </h6>
<li class="nav-item">
    @roles('Administrateur|Gestionnaire')
  <a class="nav-link" href="{{ route('courriers.index') }}">
      <span data-feather="mail"></span>
    <span>Gestion courriers</span>
  </a>
  @endroles
</li>
<li class="nav-item">
  <a class="nav-link" href="#">
      <span data-feather="users"></span>
    <span>Gestion opérateurs</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('beneficiaires.index') }}">
      <span data-feather="layers"></span>
    <span>Gestion demandes</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="#">
      <span data-feather="layers"></span>
    <span>Gestion formations</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('directions.index') }}">
      <span data-feather="layers"></span>
    <span>Directions</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('services.index') }}">
      <span data-feather="layers"></span>
    <span>Services</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <span data-feather="folder"></span>
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
      <h6 class="collapse-header">UTILISATEURS</h6>
      <a class="collapse-item" href="{{ route('administrateurs.index') }}">
        <span data-feather="user"></span>
        <span>Administrateurs</span>
      </a>
      <a class="collapse-item" href="{{ route('gestionnaires.index') }}">
        <span data-feather="user"></span>
        <span>Gestionnaires</span>
      </a>
      <a class="collapse-item" href="{{ route('beneficiaires.index') }}">
        <span data-feather="user"></span>
        <span>Bénéficiaires</span>
      </a>
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