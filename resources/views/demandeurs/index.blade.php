@extends('layout.default')
@section('title', 'ONFP - Liste des demandeurs')
@section('content')
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif 
          <div class="row justify-content-center">
            <div class="col-xl-2 col-md-2 mb-0">
              <div class="card border-left-primary shadow h-75 py-2">
                @foreach ($localites as $localite)
                @if ($localite->name == "Dakar")                
                <a class="nav-link" href="{!! url('localites/' .$localite->id) !!}">
                @endif
                @endforeach
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ ('Dakar') }}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                       {!! $dakar !!} / {!! $total !!}
                        </div>
                    </div>                  
                  </div>
                </div>
              </a>
              </div>
            </div>
            <div class="col-xl-3 col-md-3 mb-0">
              <div class="card border-left-primary shadow h-75 py-2">
                @foreach ($localites as $localite)
                @if ($localite->name == "Ziguinchor")                
                <a class="nav-link" href="{!! url('localites/' .$localite->id) !!}">
                @endif
                @endforeach
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ ('Ziguinchor') }}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> {!! $ziguinchor !!} / {!! $total !!}</div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
            </div>
            <div class="col-xl-3 col-md-3 mb-0">
              <div class="card border-left-primary shadow h-75 py-2">
                @foreach ($localites as $localite)
                @if ($localite->name == "Saint-Louis")                
                <a class="nav-link" href="{!! url('localites/' .$localite->id) !!}">
                @endif
                @endforeach
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ ('Saint-Louis') }}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> {!! $saintlouis !!} / {!! $total !!}</div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
            </div>
            <div class="col-xl-2 col-md-2 mb-0">
              <div class="card border-left-primary shadow h-75 py-2">
                @foreach ($localites as $localite)
                @if ($localite->name == "Kaolack")                
                <a class="nav-link" href="{!! url('localites/' .$localite->id) !!}">
                @endif
                @endforeach
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ ('Kaolack') }}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> {!! $kaolack !!} / {!! $total !!}</div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
            </div>
            <div class="col-xl-2 col-md-2 mb-0">
              <div class="card border-left-primary shadow h-75 py-2">
                @foreach ($localites as $localite)
                @if ($localite->name == "Thiès")                
                <a class="nav-link" href="{!! url('localites/' .$localite->id) !!}">
                @endif
                @endforeach
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ ('Thiès') }}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> {!! $thies !!} / {!! $total !!}</div>
                    </div>
                  </div>
                </div>
              </a>
              </div>
            </div>
            <div class="col-md-12">
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
              
              <div class="card"> 
                  <div class="card-header">
                      <i class="fas fa-table"></i>
                      Liste des demandeurs
                  </div>              
                <div class="card-body">
                      <div class="table-responsive">
                          <div align="right">
                            <a href="{{route('demandeurs.create')}}"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div></a>
                          </div>
                          <br />
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-demandeurs">
                          <thead class="table-dark">
                            <tr>
                              <th>N°</th>
                              <th>Num Cour.</th>
                              <th>Cin</th>
                              <th>Civilité</th>
                              <th>Prenom</th>
                              <th>Nom</th>
                              <th>Date nais.</th>
                              <th>Lieu nais.</th>
                              <th>Téléphone</th>
                              <th>Module</th>
                              <th>Localité</th>
                              <th>Note</th>
                              <th>Statut</th>
                              <th style="width:08%;">Action</th>
                            </tr>
                          </thead>
                          <tfoot class="table-dark">
                              <tr>
                              <th>N°</th>
                              <th>Num Cour.</th>
                              <th>Cin</th>
                              <th>Civilité</th>
                              <th>Prenom</th>
                              <th>Nom</th>
                              <th>Date nais.</th>
                              <th>Lieu nais.</th>
                              <th>Téléphone</th>
                              <th>Module</th>
                              <th>Localité</th>
                              <th>Note</th>
                              <th>Statut</th>
                              <th>Action</th>
                              </tr>
                            </tfoot>
                          <tbody>
                            <?php $i = 1 ?>
                  @foreach ($demandeurs as $demandeur)
                  <tr> 
                    <td>{!! $i++ !!}</td>
                    <td>{!! $demandeur->numero_courrier !!}</td>
                    <td>{!! $demandeur->cin !!}</td>
                    <td>{!! $demandeur->user->civilite !!}</td>
                    <td>{!! $demandeur->user->firstname !!}</td>
                    <td>{!! $demandeur->user->name !!}</td>
                    <td>{!! $demandeur->user->date_naissance->format('d/m/Y') !!}</td>
                    <td>{!! $demandeur->user->lieu_naissance !!}</td>
                    <td>{!! str_limit($demandeur->user->telephone, 9, '') !!}</td>
                    <td>
                      @foreach ($demandeur->modules as $module)
                      {!! $module->name !!}
                      @endforeach
                    </td>
                    <td>{!! $demandeur->localite->name !!}</td>
                    <td>{!! $demandeur->note !!}</td>
                    <td style="text-align: center;">
                      @if ($demandeur->status == "Retenue")
                      <i class="fa fa-check text-success" title="Retenue" aria-hidden="true"></i>
                      @elseif($demandeur->status == "Annulée")
                      <i class="fa fa-times text-danger" title="Annulée" aria-hidden="true"></i>
                      @else                      
                      {!! $demandeur->status !!}                          
                      @endif
                    </td>
                    <td style="text-align: center;" class="d-flex align-items-baseline align-content-center">
                        <a href="{!! url('demandeurs/' .$demandeur->id. '/edit') !!}" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit">&nbsp;</i>
                        </a>
                        &nbsp;
                        <a href="{!! url('demandeurs/' .$demandeur->id) !!}" class= 'btn btn-primary btn-sm' title="voir">
                          <i class="far fa-eye">&nbsp;</i>
                        </a>
                        &nbsp;
                        {!! Form::open(['method'=>'DELETE', 'url'=>'demandeurs/' .$demandeur->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
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
      $('#table-demandeurs').DataTable({
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