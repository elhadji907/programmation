@extends('layout.default')
@section('title', 'ONFP - Liste de tous les courriers')
@section('content')
@roles('Administrateur|Courrier')
<div class="container-fluid">
    <div class="row">     
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <a class="nav-link" href="{{ route('courriers.index') }}" target="_blank">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ ('Courriers (ANNUELS)') }}</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $courriers }}</div>
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
              <a class="nav-link" href="{{ route('recues.index') }}" target="_blank">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                     {{ ('Courriers (ARRIVES)') }}
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{  $recues }}</div>
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
                <div class="card border-left-info shadow h-100 py-2">
                 <a class="nav-link" href="{{ route('departs.index') }}" target="_blank">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ ('Courriers (DEPARTS)') }}</div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{  $departs }}</div>
                          </div>
                        </div>
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
          <div class="card border-left-warning shadow h-100 py-2">
              <a class="nav-link" href="{{ route('internes.index') }}" target="_blank" >
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ ('Courriers (INTERNES)') }}</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $internes }}</div>
                </div>
                <div class="col-auto">
                  <span data-feather="mail"></span>
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>          
    </div>
</div>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
        <div class="card"> 
            <div class="card-header">
                <i class="fas fa-table"></i>
                Liste des courriers
            </div>              
        <div class="card-body">
                <div class="table-responsive">
                    <div align="right">
                    <a href="{{ route('courriers.create') }}"><div class="btn btn-success btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div></a>
                    </div>
                    <br />
                <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-courriers">
                    <thead class="table-dark">
                      <tr>
                        <th style="width:5%;">N°</th>
                        <th style="width:10%;">N° Courrier</th>
                        <th style="width:30%;">Objet</th>
                        <th style="width:20%;">Expediteur</th>
                        <th style="width:11%;">Email</th>
                        <th style="width:11%;">Telephone</th>
                        <th style="width:13%;">Type de courrier</th>
                       {{--<th style="width:5%;">Action</th>--}}
                      </tr>
                    </thead>
                    <tfoot class="table-dark">
                        <tr>
                          <th>N°</th>
                          <th>N° Courrier</th>
                          <th>Objet</th>
                          <th>Expediteur</th>
                          <th>Email</th>
                          <th>Telephone</th>
                          <th>Type de courrier</th>
                       {{--<th>Action</th>--}}
                        </tr>
                      </tfoot>
                    <tbody>
                      @if (count($couriers)==0)                            
                      <tr>
                        <td class="text-center" colspan="2"></td>
                      </tr>
                      @else 
                      <?php $i = 1 ?>
                      @foreach ($couriers as $courier)
                      <tr> 
                        <td>{!! $i++ !!}</td>
                        <td>
                          <a style="color: darkorange; text-decoration: none;"
                           href="{!! url('courriers/'.$courier->id) !!}" class="view" title="voir" target="_blank">
                           <b>{!! $courier->numero !!}</b>
                          </a>
                        </td>
                        <td>{!! $courier->objet !!}</td>
                        <td>{!! $courier->expediteur !!}</td>            
                        <td>{!! $courier->email !!}</td>
                        <td>{!! $courier->telephone !!}</td>
                        <td>
                            <b>{!! $courier->types_courrier->name !!}</b>
                         </td>
                        {{--
                          <td class="d-flex align-items-baseline align-content-center">
                            <a href="{!! url('courriers/'.$courier->id) !!}" class= 'btn btn-primary btn-sm' title="voir">
                              <i class="far fa-eye"></i>
                            </a>
                        </td>
                        --}}
                      </tr>
                      @endforeach                        
                      @endif
                    </tbody>
                </table>                        
        </div>
        </div>
    </div>
    </div>
</div>
</div>
<br />
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        <div class="card"> 
            <div class="card-header">
               {{--  <i class="fas fa-table"></i> --}}               
               <img src="{{ asset("img/stats_15267.png") }}" class="w-5"/>
                Statistiques des courriers
            </div>             
          <div class="card-body">
              {!! $chart->container() !!}              
          {{-- <canvas id="bar-chart" width="800" height="450"></canvas> --}}
          </div>
      </div>
    </div>          
  </div>
</div>
<br />
@endroles
@endsection
@push('scripts')
    <script type="text/javascript">
      $(document).ready( function () {
        $('#table-courriers').DataTable({
          dom: 'lBfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print',
          ],
          "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Tout"] ],
          "order": [
                [ 0, 'asc' ]
                ],
                language: {
                  "sProcessing":     "Traitement en cours...",
                  "sSearch":         "Rechercher&nbsp;:",
                  "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                  "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                  "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                  "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                  "sInfoPostFix":    "",
                  "sLoadingRecords": "Chargement en cours...",
                  "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                  "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                  "oPaginate": {
                      "sFirst":      "Premier",
                      "sPrevious":   "Pr&eacute;c&eacute;dent",
                      "sNext":       "Suivant",
                      "sLast":       "Dernier"
                  },
                  "oAria": {
                      "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                      "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                  },
                  "select": {
                          "rows": {
                              _: "%d lignes séléctionnées",
                              0: "Aucune ligne séléctionnée",
                              1: "1 ligne séléctionnée"
                          }
                  }
                }
        });
    } );
    </script> 
  {!! $chart->script() !!}
@endpush