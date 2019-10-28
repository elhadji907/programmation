@extends('layout.default')
@section('content')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
        <div class="card"> 
            <div class="card-header">
                <i class="fas fa-table"></i>
                Liste des courriers internes
            </div>              
        <div class="card-body">
                <div class="table-responsive">
                    <div align="right">
                    <a href="{{ route('internes.create') }}"><div class="btn btn-success">Nouveau Courrier&nbsp; <span data-feather="plus"></span></div></a>
                    </div>
                    <br />
                <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-internes">
                    <thead class="table-dark">
                        <tr>
                          <th>ID</th>
                          <th>Numéro</th>
                          <th>Objet</th>
                          <th>Expediteur</th>
                          <th>Adresse</th>
                          <th>Telephone</th>
                          <th>Email</th>
                          <th>Destinataires</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot class="table-dark">
                          <tr>
                            <th>ID</th>
                            <th>Numéro</th>
                            <th>Objet</th>
                            <th>Expediteur</th>
                            <th>Adresse</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Destinataires</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                    <tbody                           
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
      $(document).ready(function () {
          $('#table-internes').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('internes.list')}}",
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'courrier.numero', name: 'courrier.numero' },
                    { data: 'courrier.objet', name: 'courrier.objet' },
                    { data: 'courrier.expediteur', name: 'courrier.expediteur' },
                    { data: 'courrier.adresse', name: 'courrier.adresse' },
                    { data: 'courrier.telephone', name: 'courrier.telephone' },
                    { data: 'courrier.email', name: 'courrier.email' },
                    { data: 'courrier.imputation', name: 'courrier.imputation' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('internes.edit',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('internes.destroy',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary edit " title="Modifier"><i class="far fa-edit">&nbsp;Edit</i></a>&nbsp;'+
                        '<a class="btn btn-danger delete" title="Supprimer" href='+url_d+'><i class="fas fa-times">&nbsp;Delete</i></a>';
                        },
                        "targets": 8
                        },
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
                },
              
          });
      });
    </script> 
@endpush