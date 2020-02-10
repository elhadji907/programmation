@extends('layout.default')
@section('title', 'ONFP - Liste personnel')
@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    
    @roles('Administrateur|Gestionnaire|Courrier')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    <!-- Content Row -->
    <div class="row">

     {{--  <!-- Earnings (Monthly) Card Example --> --}}
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <a class="nav-link" href="{{ route('courriers.index') }}">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">GESTION DES COURRIERS</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Courrier::get()->count() }}</div>
              </div>
              <div class="col-auto">
                {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                <span data-feather="mail"></span>
              </div>
            </div>
          </div> 
          </a>
        </div>
      </div>
     {{--  <!-- Earnings (Monthly) Card Example --> --}}
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <a class="nav-link" href="{{ route('demandeurs.index') }}">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">GESTION DES DEMANDES</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Demandeur::get()->count() }}</div>
              </div>
              <div class="col-auto">
              {{--   <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> --}}
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </a>
        </div>
      </div>

     {{--  <!-- Earnings (Monthly) Card Example --> --}}
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <a class="nav-link" href="#">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">GESTION DES OPERATEURS</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    {{--  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>  --}}
                  </div>
                {{--    <div class="col">
                    <div class="progress progress-sm mr-2">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>  --}}
                </div>
              </div>
              <div class="col-auto">
                {{--  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>  --}}
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
          <a class="nav-link" href="{{ route('personnels.index') }}">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Gestion du personnel</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Personnel::get()->count() }}</div>
              </div>
              <div class="col-auto">
                {{--  <i class="fas fa-comments fa-2x text-gray-300"></i>  --}}
                <i class="fa fa-user" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
       </a>
      </div>
    </div>
  @endroles
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card"> 
              <div class="card-header">
                 {{--  <i class="fas fa-table"></i> --}}               
                 <img src="{{ asset("img/stats_15267.png") }}" class="w-5"/>
                  Statistiques Générales
              </div>             
          <div class="card-body">
              {!! $chart->container() !!}
          </div>
        </div>
      </div>          
  </div>
</div><br/>
@endsection
{!! $chart->script() !!}