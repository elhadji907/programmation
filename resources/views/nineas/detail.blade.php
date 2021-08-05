@extends('layout.default')
@section('title', 'ONFP - '.' '.$nom_module)
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
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
                Liste des demandeurs au métier de {!! $nom_module !!}
            </div> 
          <div class="card-body">
            <div class="table-responsive">
              <div align="right">
                <a href="{!! url('modules/create') !!}"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
              </div>
                <br />
              <table class="table table-bordered table-striped" id="moduleTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    <th>N°</th>
                    <th>Num Cour.</th>
                    <th>Cin</th>
                    <th>Civilité</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Date naissance</th>
                    <th>Lieu naissance</th>
                    <th>Téléphone</th>
                    <th>Localité</th>
                    <th>Diplôme</th>
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
                      <th>Date naissance</th>
                      <th>Lieu naissance</th>
                      <th>Téléphone</th>
                      <th>Localité</th>
                      <th>Diplôme</th>
                      <th>Note</th>
                      <th>Statut</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                <tbody>
                  <?php $i = 1 ?>
                  @foreach ($modules as $module)
                  @if ($module->name == $nom_module)
                  @foreach ($module->demandeurs as $demandeur)
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
                      <a href="{!! route('localites.lister', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]) !!}">
                        {!! $demandeur->localite->name !!}
                      </a>
                    </td>             
                    <td>
                      @foreach ($demandeur->diplomes as $diplome)
                          {!! $diplome->name !!}
                      @endforeach
                    </td>             
                    <td>{!! $demandeur->note !!}</td>   
                    <td style="text-align: center;">
                      @if ($demandeur->status == "Retenue")
                      <a href="{!! route('localites.lister_r', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]) !!}">
                        {{--  {!! $demandeur->localite->name !!}  --}}
                        <i class="fa fa-check text-success" title="Retenue" aria-hidden="true"></i>
                      </a>
                      @elseif($demandeur->status == "Annulée")
                      <a href="{!! route('localites.lister_an', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]) !!}">
                      <i class="fa fa-times text-danger" title="Annulée" aria-hidden="true"></i>
                      </a>
                      @elseif($demandeur->status == "Présélectionné")
                      <a href="{!! route('localites.lister_pres', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]) !!}">
                        {!! $demandeur->status !!}
                      </a>     
                      @elseif($demandeur->status == "En cours")
                      <a href="{!! route('localites.lister_cours', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]) !!}">
                        {!! $demandeur->status !!}
                      </a>     
                      @elseif($demandeur->status == "Terminée")
                      <a href="{!! route('localites.lister_term', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]) !!}">
                        {!! $demandeur->status !!}
                      </a>     
                      @elseif($demandeur->status == "Absent")
                      <a href="{!! route('localites.lister_abs', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]) !!}">
                        {!! $demandeur->status !!}
                      </a>
                      @else       
                      <a href="{!! route('localites.lister_at', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]) !!}">               
                      {!! $demandeur->status !!}    
                      </a>                      
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
                  @endif
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
    $('#moduleTable').DataTable({
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

