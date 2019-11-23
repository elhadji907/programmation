@extends('layout.default')
@section('content')
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif 
          <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
              <div class="card"> 
                  <div class="card-header">
                      <i class="fas fa-table"></i>
                      Liste des courriers reçus
                  </div>              
                <div class="card-body">
                      <div class="table-responsive">
                          <div align="right">
                            <a href="{{ route('recues.create') }}"><div class="btn btn-success">Nouveau Utilisateur&nbsp;<i class="fas fa-user-plus"></i></div></a>
                          </div>
                          <br />
                          <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-directions">
                            <thead class="table-dark">
                              <tr>
                                <th>ID</th>
                                <th>Direction / Service</th>
                                <th>Action</th>
                                <th><button type="button" name="bulk_imputation" id="bulk_imputation" class="btn btn-success btn-xs"><i class="fas fa-angle-double-right"></i></button></th>
                              </tr>
                            </thead>
                            <tfoot class="table-dark">
                                <tr>
                                  <th>ID</th>
                                  <th>Direction / Service</th>
                                  <th>Action</th>
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

      <div class="modal fade" id="modal_delete_recue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="" id="form-delete-recue">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
          $('#table-recues').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('recues.list')}}",
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'courrier.numero', name: 'courrier.numero' },
                    { data: 'courrier.objet', name: 'courrier.objet' },
                    { data: 'courrier.expediteur', name: 'courrier.expediteur' },
                    { data: 'courrier.imputation', name: 'courrier.imputation' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('recues.edit',':id')!!}".replace(':id', data.id);
                        url_f =  "{!! route('recues.selectdirection',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('recues.destroy',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class="btn btn-primary edit" title="Modifier"><i class="far fa-edit"></i></a>&nbsp;'+
                        '<a href='+url_f+'  class="btn btn-primary edit" title="partager"><i class="fab fa-get-pocket"></i></a>'+
                        '<div class="btn btn-danger delete btn_delete_recue ml-1" title="Supprimer" data-href='+url_d+'><i class="fas fa-trash-alt"></i></div>';
                        },
                        "targets": 5
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
                order:[[0, 'desc']]              
          });

          
        $('#table-recues').off('click', '.btn_delete_recue').on('click', '.btn_delete_recue',
        function() { 
          var href=$(this).data('href');
          $('#form-delete-recue').attr('action', href);
          $('#modal_delete_recue').modal();
        });
      });
      
  </script> 
  @endpush