@extends('layout.default')
@section('title', 'ONFP - Liste employee')
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
                      Liste du employee
                  </div>              
                <div class="card-body">
                      <div class="table-responsive">
                          <div align="right">
                            <a href="{{route('employees.create')}}"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div></a>
                          </div>
                          <br />
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-employees">
                          <thead class="table-dark">
                            <tr>
                              <th style="width:5%;">Civilité</th>
                              <th style="width:5%;">Matricule</th>
                              <th>Prenom</th>
                              <th>Nom</th>
                              <th>Email</th>
                              <th>Telephone</th>
                              <th>Fonction</th>
                              <th style="width:10%;">Action</th>
                            </tr>
                          </thead>
                          <tfoot class="table-dark">
                              <tr>
                                <th>Civilité</th>
                                <th>Matricule</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Fonction</th>
                                <th>Action</th>
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

      <div class="modal fade" id="modal_delete_employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="" id="form-delete-employee">
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
          $('#table-employees').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('employees.list')}}",
            columns: [
                    { data: 'user.civilite', name: 'user.civilite' },
                    { data: 'matricule', name: 'matricule' },
                    { data: 'user.firstname', name: 'user.firstname' },
                    { data: 'user.name', name: 'user.name' },
                    { data: 'user.email', name: 'user.email' },
                    { data: 'user.telephone', name: 'user.telephone' },
                    { data: 'user.employee.fonction.sigle', name: 'user.employee.fonction.sigle' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('employees.edit',':id')!!}".replace(':id', data.id);
                        url_f =  "{!! route('employees.show',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('employees.destroy',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary btn-sm edit" title="Modifier"><i class="far fa-edit"></i></a>&nbsp;'+
                                '<a href='+url_f+'  class=" btn btn-success btn-sm show" title="voir"><i class="far fa-eye"></i></a>&nbsp;'+
                        '<div class="btn btn-danger btn-sm delete btn_delete_employee ml-1" title="Supprimer" data-href='+url_d+'><i class="fas fa-trash-alt"></i></div>';
                        },
                        "targets": 7
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

          
        $('#table-employees').off('click', '.btn_delete_employee').on('click', '.btn_delete_employee',
        function() { 
          var href=$(this).data('href');
          $('#form-delete-employee').attr('action', href);
          $('#modal_delete_employee').modal();
        });
      });
      
  </script> 
  @endpush