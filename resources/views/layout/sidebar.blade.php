<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    @roles('Administrateur|Courrier')
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('img/ONFP.png') }}" class="img-fluid logo_onfp w-75" alt="LOGO">
        </div>
        <div class="sidebar-brand-text mx-3">ONFP<sup>{{ __('1') }}</sup></div>
    </a>
    @endroles

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        @roles('Administrateur|Courrier')
        <a class="nav-link" href="{{ url('/home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span></a>
        @endroles
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
        <a class="nav-link d-flex align-items-center text-white"
            href="{{ route('profiles.show', ['user' => auth()->user()]) }}">
            {{-- <span data-feather="settings"></span> --}}

            <span data-feather="user"></span>
            <span> Gérer mon profil </span>
        </a>
    </h6>
    @roles('Administrateur')
    <hr class="sidebar-divider my-0">
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-white">
        <a class="nav-link d-flex align-items-center text-white" href="{{ route('localites.pdcej') }}">
            {{-- <span data-feather="settings"></span> --}}

            <span data-feather="user"></span>
            <span>Programme PDCEJ </span>
        </a>
    </h6>
    @endroles
    <hr class="sidebar-divider my-0">
    @roles('Demandeur|Administrateur|Gestionnaire')
    <li class="nav-item">
        @roles('Administrateur')
        <a class="nav-link collapsed" href="{{ route('demandeurs.index') }}" data-toggle="collapse"
            data-target="#collapsePages_formation" aria-expanded="true" aria-controls="collapsePages_formation">
            <span data-feather="layers"></span>
            <span>Gestion des formations</span>
        </a>
        @endroles
        <div id="collapsePages_formation" class="collapse" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('demandeurs.index') }}">
                    <span>Toutes</span>
                </a>
                <a class="collapse-item" href="{{ route('individuelles.index') }}">
                    <span>individuelles</span>
                </a>
                <a class="collapse-item" href="{{ route('collectives.index') }}">
                    <span>collectives</span>
                </a>
            @endguest
        </div>
    </div>
</li>
<li class="nav-item">
    @roles('Operateur|Demandeur')
    <a class="nav-link" href="{{ route('operateurs.index') }}">
        <span data-feather="users"></span>
        <span>Devenir opérateur</span>
    </a>
    @endroles
</li>

<li class="nav-item">
    @roles('Administrateur|Courrier')
    <a class="nav-link" href="{{ route('courriers.index') }}">
        <span data-feather="mail"></span>
        <span>Gestion courriers</span>
    </a>
    @endroles
</li>

<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_daf"
        aria-expanded="true" aria-controls="collapsePages_daf">
        <span data-feather="folder"></span>
        <span>DOSSIERS DAF</span>
    </a>
    @endroles
    <div id="collapsePages_daf" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            {{-- <h6 class="collapse-header"></h6> --}}
            @guest
                <a class="collapse-item" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                @if (Route::has('register'))
                    <a class="collapse-item" href="{{ route('register') }}">{{ __("S'inscrire") }}</a>
                @endif
            @else
                {{-- <h6 class="collapse-header">UTILISATEURS</h6> --}}
                <a class="collapse-item" href="{{ route('bordereaus.index') }}">
                    <span>Bordereaux</span>
                </a>
                {{-- <a class="collapse-item" href="{{ route('listes.index') }}">
      <span>Liste des B.</span>
    </a> --}}
                <a class="collapse-item" href="{{ route('facturesdafs.index') }}">
                    <span>Factures</span>
                </a>
                <a class="collapse-item" href="{{ route('tresors.index') }}">
                    <span>Recettes Trésor</span>
                </a>
                <a class="collapse-item" href="{{ route('banques.index') }}">
                    <span>Frais Bancaire</span>
                </a>
                <a class="collapse-item" href="{{ route('bordereaus.index') }}">
                    <span>Ordres de missions</span>
                </a>
                <a class="collapse-item" href="{{ route('bordereaus.index') }}">
                    <span>Etat paiement</span>
                </a>
                <a class="collapse-item" href="{{ route('bordereaus.index') }}">
                    <span>EPP</span>
                </a>
                <a class="collapse-item" href="{{ route('bordereaus.index') }}">
                    <span>FAD</span>
                </a>
            @endguest
        </div>
    </div>
</li>
<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_projet"
        aria-expanded="true" aria-controls="collapsePages_projet">
        <span data-feather="folder"></span>
        <span>PROJETS</span>
    </a>
    @endroles
    <div id="collapsePages_projet" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            {{-- <h6 class="collapse-header"></h6> --}}
            @guest
                <a class="collapse-item" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                @if (Route::has('register'))
                    <a class="collapse-item" href="{{ route('register') }}">{{ __("S'inscrire") }}</a>
                @endif
            @else
                {{-- <h6 class="collapse-header">UTILISATEURS</h6> --}}
                <a class="collapse-item" href="{{ route('activites.index') }}">
                    <span>Activites</span>
                </a>
                <a class="collapse-item" href="{{ route('projets.index') }}">
                    <span>Projets</span>
                </a>
                <a class="collapse-item" href="{{ route('depenses.index') }}">
                    <span>Dépenses</span>
                </a>
            @endguest
        </div>
    </div>
</li>

<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link" href="{{ route('operateurs.index') }}">
        <span data-feather="users"></span>
        <span>Gestion opérateurs</span>
    </a>
    @endroles
</li>
<li class="nav-item">
    @roles('Administrateur|Gestionnaire')
    <a class="nav-link" href="{{ route('demandeurs.create') }}">
        <span data-feather="layers"></span>
        <span>Gestion demandes</span>
    </a>
    @endroles
</li>
<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link" href="{{ route('demandeurs.index') }}">
        <span data-feather="layers"></span>
        <span>Lister demandes</span>
    </a>
    @endroles
</li>
<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link" href="#">
        <span data-feather="layers"></span>
        <span>Gestion formations</span>
    </a>
    @endroles
</li>
<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link" href="{{ route('employees.index') }}">
        <span data-feather="layers"></span>
        <span>Gestion des employees</span>
    </a>
    @endroles
</li>
<li class="nav-item">
    @roles('Administrateur|Courrier')
    <a class="nav-link" href="{{ route('directions.index') }}">
        <span data-feather="layers"></span>
        <span>Directions / Services</span>
    </a>
    @endroles
</li>
<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link" href="{{ route('secteurs.index') }}">
        <span data-feather="layers"></span>
        <span>Secteurs</span>
    </a>
    @endroles
</li>
<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link" href="{{ route('domaines.index') }}">
        <span data-feather="layers"></span>
        <span>Domaines</span>
    </a>
    @endroles
</li>
<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link" href="{{ route('modules.index') }}">
        <span data-feather="layers"></span>
        <span>Modules</span>
    </a>
    @endroles
</li>
<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link" href="{{ route('diplomes.index') }}">
        <span data-feather="layers"></span>
        <span>Diplômes</span>
    </a>
    @endroles
</li>
<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link" href="{{ route('options.index') }}">
        <span data-feather="layers"></span>
        <span>Option diplômes</span>
    </a>
    @endroles
</li>
<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link" href="{{ route('programmes.index') }}">
        <span data-feather="layers"></span>
        <span>Programmes</span>
    </a>
    @endroles
</li>
<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link" href="{{ route('nivauxs.index') }}">
        <span data-feather="layers"></span>
        <span>Niveaux</span>
    </a>
    @endroles
</li>
<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link" href="{{ route('localites.index') }}">
        <span data-feather="layers"></span>
        <span>Localités</span>
    </a>
    @endroles
</li>
<li class="nav-item">
    @roles('Administrateur')
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
        aria-controls="collapsePages">
        <span data-feather="folder"></span>
        <span>Pages</span>
    </a>
    @endroles
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Écrans de connexion:</h6>
            <a class="collapse-item" href="{{ route('profiles.show', ['user' => auth()->user()]) }}">
                {{-- {{ str_limit(Auth::user()->email, 18, '...') }} --}}
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
                </a>
                <a class="collapse-item" href="{{ route('villages.index') }}">
                    <span data-feather="user"></span>
                    <span>Villages</span>
                </a>
            @endguest
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
