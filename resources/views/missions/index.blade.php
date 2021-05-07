@extends('layout.default')
@section('title', 'ONFP - Liste des ordres de mission')
@section('content')
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
                Liste des mission
            </div>             
          <div class="card-body">
            <div class="table-responsive">
              <div align="right">
                <a href="{!! url('missions/create') !!}"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
              </div>
              <table class="table table-bordered table-striped" id="table-missions" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    <th style="width:5%;">N° OM</th>
                    <th style="width:10%;">Date récep.</th>
                    <th style="width:10%;">Bénéficiaires</th>
                    <th style="width:10%;">Montant</th>
                    <th style="width:10%;">Date départ</th>
                    <th style="width:10%;">Date retour</th>
                    <th style="width:10%;">Date CG</th>
                    <th style="width:10%;">Date DG</th>
                    <th style="width:10%;">Date AC</th>
                    <th style="width:10%;">Bobservations</th>
                    <th style="width:5%;">Action</th>
                  </tr>
                </thead>
                <tfoot class="table-dark">
                  <tr>
                    <th style="width:5%;">N° OM</th>
                    <th style="width:10%;">Date récep.</th>
                    <th style="width:10%;">Bénéficiaires</th>
                    <th style="width:10%;">Montant</th>
                    <th style="width:10%;">Date départ</th>
                    <th style="width:10%;">Date retour</th>
                    <th style="width:10%;">Date CG</th>
                    <th style="width:10%;">Date DG</th>
                    <th style="width:10%;">Date AC</th>
                    <th style="width:10%;">Bobservations</th>
                    <th style="width:5%;">Action</th>
                  </tr>
                </tfoot>
                <tbody>              
                  <?php $i = 1 ?>
                  @foreach ($missions as $mission)
                  <tr>
                     {{-- <td class="align-middle">{!! $i++ !!}</td>  --}}
                    <td class="align-middle">{!! $mission->numero !!}</td>
                    <td class="align-middle">{!! Carbon\Carbon::parse($mission->date_mandat)->format('d/m/Y') !!}</td>
                    <td class="align-middle">{!! $mission->designation !!}</td>         
                    <td class="align-middle">{!! $mission->daf->projet->name !!}</td>         
                    <td class="align-middle">{!! $mission->montant !!}</td>         
                    <td class="align-middle">{!! $mission->nombre_de_piece !!}</td>         
                    <td class="align-middle">{!! $mission->observation !!}</td>              
                    <td class="align-middle">
                        <a href="{!! url('missions/' .$mission->id. '/edit') !!}" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit"></i>
                        </a>&nbsp;
                         <a href="{!! url('missions/' .$mission->daf->id) !!}" class= 'btn btn-primary btn-sm' title="voir">
                          <i class="far fa-eye">&nbsp;</i>
                        </a>&nbsp;
                          {!! Form::open(['method'=>'DELETE', 'url'=>'missions/' .$mission->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
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
    $('#table-missions').DataTable({
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