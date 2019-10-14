@extends('layout.default') 
@section('content')
<div class="container">
    <!-- Standard buttons -->
    <div class="col-md-12">
        <a class="btn btn-info btn-block" href="{{ route('recues.index') }}"><span data-feather="book-open"></span> Courriers arrivés</a>
    </div>
    <br />
    <!-- Primary buttons -->
    <div class="col-md-12">
        <a class="btn btn-dark btn-block" href="#"><span data-feather="book-open"></span> Courriers départs</a>
    </div>
    <br />
    <div class="col-md-12">
        <a class="btn btn-info btn-block" href="#"><span data-feather="book-open"></span> Courriers internes</a>
    </div>
    <br />
</div
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
                    {{-- <div align="right">
                    <a href="{{ route('courriers.create') }}"><div class="btn btn-success">Nouveau Courrier&nbsp; <span data-feather="plus"></span></div></a>
                    </div> --}}
                    {{-- <br /> --}}
                <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-courriers">
                    <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Numéro</th>
                        <th>Objet</th>
                        <th>Type</th>
                        <th>Message</th>
                        <th>Destinataire</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Numéro</th>
                        <th>Objet</th>
                        <th>Type</th>
                        <th>Message</th>
                        <th>Destinataire</th>
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
          $('#table-courriers').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('courriers.list')}}",
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'numero', name: 'numero' },
                    { data: 'objet', name: 'objet' },
                    { data: 'types_courrier.name', name: 'types_courrier.name' },
                    { data: 'message', name: 'message' },
                    { data: 'imputation', name: 'imputation' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('courriers.edit',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('courriers.destroy',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary edit " title="Modifier"><i class="far fa-edit">&nbsp;Edit</i></a>&nbsp;'+
                        '<a class="btn btn-danger delete" title="Supprimer" href='+url_d+'><i class="fas fa-times">&nbsp;Delete</i></a>';
                        },
                        "targets": 6
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
