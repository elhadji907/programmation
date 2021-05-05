@extends('layout.default')
@section('title', 'ONFP - Liste des courriers de la DAF')
@section('content')
  <div class="container-fluid">
    <div class="row">     
      <div class="col-xl-2 col-md-4 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <a class="nav-link" href="{{ route('courriers.index') }}" target="_blank">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ ('BORDEREAUX') }}</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                </div>
                <div class="col-auto">
                  <span data-feather="mail"></span>
                </div>
              </div>
            </div>
          </a>
          </div>
        </div>   
        <div class="col-xl-2 col-md-4 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <a class="nav-link" href="{{ route('recues.index') }}" target="_blank">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ ('ORDRES DE MISSIONS') }}</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                </div>
                <div class="col-auto">
                  <span data-feather="mail"></span>
                </div>
              </div>
            </div>
            </a>
          </div>
        </div>
      
        <div class="col-xl-2 col-md-4 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
               <a class="nav-link" href="{{ route('departs.index') }}" target="_blank">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ ('ETATS DE PAIEMENT') }}</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
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

      <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <a class="nav-link" href="{{ route('internes.index') }}" target="_blank" >
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ ('ETATS PREVISIONNELS') }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              </div>
              <div class="col-auto">
                <span data-feather="mail"></span>
              </div>
            </div>
          </div>
          </a>
        </div>
      </div>
      <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <a class="nav-link" href="{{ route('courriers.index') }}" target="_blank">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ ('FACTURES') }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              </div>
              <div class="col-auto">
                <span data-feather="mail"></span>
              </div>
            </div>
          </div>
        </a>
        </div>
      </div>   
      <div class="col-xl-2 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <a class="nav-link" href="{{ route('recues.index') }}" target="_blank">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ ('FRAIS BANCAIRES') }}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
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
          @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
          @elseif (session('message'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
          @endif
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Liste des courriers de la DAF
            </div> 
            
          <div class="card-body">
            <div class="table-responsive">
              <div align="right">
                <a href="{!! url('dafs/create') !!}"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
              </div>
              <table class="table table-bordered table-striped" id="table-dafs" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    {{--  <th style="width:5%;">N°</th>  --}}
                    <th style="width:10%;">N° Courrier</th>
                    <th style="width:10%;">Date MP</th>
                    <th style="width:30%;">Désignation</th>
                    <th style="width:30%;">Observations</th>
                    <th style="width:10%;">Date Imput.</th>
                    <th style="width:10%;">Action</th>
                  </tr>
                </thead>
                <tfoot class="table-dark">
                  <tr>
                    {{--  <th>N°</th>  --}}
                    <th>N° Courrier</th>
                    <th>Date MP</th>
                    <th>Désignation</th>
                    <th>Observations</th>
                    <th>Date Imput.</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>              
                  <?php $i = 1 ?>
                  @foreach ($dafs as $daf)
                  <tr>
                    {{--  <td class="align-middle">{!! $i++ !!}</td>  --}}
                    <td class="align-middle">{!! $daf->numero !!}</td>
                    <td class="align-middle">{!! Carbon\Carbon::parse($daf->date_mandat)->format('d/m/Y') !!}</td>
                    <td class="align-middle">{!! $daf->designation !!}</td>         
                    <td class="align-middle">{!! $daf->observation !!}</td>   
                    <td class="align-middle">{!! Carbon\Carbon::parse($daf->date_imp)->format('d/m/Y') !!}</td>              
                    <td class="d-flex align-middle">
                        <a href="{!! url('dafs/' .$daf->id. '/edit') !!}" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit"></i>
                        </a>&nbsp;
                         <a href="{!! url('courriers/' .$daf->courrier->id) !!}" class= 'btn btn-primary btn-sm' title="voir">
                          <i class="far fa-eye">&nbsp;</i>
                        </a>&nbsp;
                          {!! Form::open(['method'=>'DELETE', 'url'=>'dafs/' .$daf->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
                          {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title'=>"supprimer"] ) !!}
                          {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach  
                </tbody>                
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script type="text/javascript">
  $(document).ready( function () {
    $('#table-dafs').DataTable({
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
@endpush