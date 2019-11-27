@extends('layout.default')
@section('content')
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card"> 
                  <div class="card-header">
                      <i class="fas fa-table"></i>
                      Selection du directeur ou du chef de service
                  </div>              
                <div class="card-body">
                      <div class="table-responsive">
                          <div align="right">
                          </div>
                          <br />
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-directions">
                          <thead class="table-dark">
                            <tr>
                              <th>ID</th>
                              <th>Directions / Services</th>
                              <th>Sigle</th>
                              <th>Selectionner</th>
                            </tr>
                          </thead>
                          <tfoot class="table-dark">
                              <tr>
                                <th>ID</th>
                                <th>Directions / Services</th>
                                <th>Sigle</th>
                                <th>Selectionner</th>
                              </tr>
                            </tfoot>
                          <tbody>
                           
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
        $('#table-directions').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('directions.list') }}",
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'sigle', name: 'sigle' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('recues.create','user=:id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary " ><i class="fas fa-check"></i>';
                        },
                        "targets": 3
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