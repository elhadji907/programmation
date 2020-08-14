@extends('layout.default')
@section('title', 'ONFP - Liste personnel')
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
                      Liste du personnel
                  </div>              
                <div class="card-body">
                      <div class="table-responsive">
                          <div align="right">
                            <a href="{{route('personnels.create')}}"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div></a>
                          </div>
                          <br />
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-personnels">
                          <thead class="table-dark">
                            <tr>
                              <th>Id</th>
                              <th>Civilité</th>
                              <th>Matricule</th>
                              <th>Prenom</th>
                              <th>Nom</th>
                              <th>Fonction</th>
                              <th style="width:120px;"></th>
                            </tr>
                          </thead>
                          <tfoot class="table-dark">
                              <tr>
                                <th>Id</th>
                                <th>Civilité</th>
                                <th>Matricule</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Fonction</th>
                                <th></th>
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

      <div class="modal fade" id="modal_delete_personnel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="" id="form-delete-personnel">
          @csrf
          @method('DELETE')
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Êtes-vous sûr de bien vouloir supprimer cet admin ?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                cliquez sur close pour annuler
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-danger"><i class="fas fa-times">&nbsp;Delete</i></button>
              </div>
            </div>
          </div>
        </form>
      </div>
      @endsection

      @push('scripts')
      <script type="text/javascript">
      $(document).ready(function () {
          $('#table-personnels').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('personnels.list')}}",
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'user.civilite', name: 'user.civilite' },
                    { data: 'matricule', name: 'matricule' },
                    { data: 'user.firstname', name: 'user.firstname' },
                    { data: 'user.name', name: 'user.name' },
                    { data: 'user.personnel.fonction.name', name: 'user.personnel.fonction.name' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('personnels.edit',':id')!!}".replace(':id', data.id);
                        url_f =  "{!! route('personnels.show',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('personnels.destroy',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary btn-sm edit" title="Modifier"><i class="far fa-edit"></i></a>&nbsp;'+
                                '<a href='+url_f+'  class=" btn btn-success btn-sm show" title="voir"><i class="far fa-eye"></i></a>&nbsp;'+
                        '<div class="btn btn-danger btn-sm delete btn_delete_personnel ml-1" title="Supprimer" data-href='+url_d+'><i class="fas fa-trash-alt"></i></div>';
                        },
                        "targets": 6
                        },
                ],

                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ],

                "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Tout"] ],

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

          
        $('#table-personnels').off('click', '.btn_delete_personnel').on('click', '.btn_delete_personnel',
        function() { 
          var href=$(this).data('href');
          $('#form-delete-personnel').attr('action', href);
          $('#modal_delete_personnel').modal();
        });
      });
      
  </script> 
  @endpush