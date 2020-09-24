@extends('layout.default')
@section('title', 'ONFP - Liste des demandeurs')
@section('content')
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif        
          <div class="row">
            <div class="col-xl-3 col-md-3 mb-0">
              <div class="card border-left-primary shadow h-75 py-2">
                <a class="nav-link" href="{!!  route('demandeurs.create')  !!}">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ ('Dakar') }}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                       {!! $dakar !!} / {!! $total !!}
                        </div>
                    </div>
                   {{--   <div class="col-auto">
                      <span data-feather="mail"></span>
                    </div>  --}}
                  
                  </div>
                </div>
              </a>
              </div>
            </div>
            <div class="col-xl-3 col-md-3 mb-0">
              <div class="card border-left-primary shadow h-75 py-2">
                <a class="nav-link" href=" ">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ ('Ziguinchor') }}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> {!! $ziguinchor !!} / {!! $total !!}</div>
                    </div>
                   {{--   <div class="col-auto">
                      <span data-feather="mail"></span>
                    </div>  --}}
                  </div>
                </div>
              </a>
              </div>
            </div>
            <div class="col-xl-3 col-md-3 mb-0">
              <div class="card border-left-primary shadow h-75 py-2">
                <a class="nav-link" href=" ">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ ('Saint-Louis') }}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> {!! $saintlouis !!} / {!! $total !!}</div>
                    </div>
                   {{--   <div class="col-auto">
                      <span data-feather="mail"></span>
                    </div>  --}}
                  </div>
                </div>
              </a>
              </div>
            </div>
            <div class="col-xl-3 col-md-3 mb-0">
              <div class="card border-left-primary shadow h-75 py-2">
                <a class="nav-link" href=" ">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ ('Kaolack') }}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> {!! $kaolack !!} / {!! $total !!}</div>
                    </div>
                   {{--   <div class="col-auto">
                      <span data-feather="mail"></span>
                    </div>  --}}
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
                        <table class="table{-sm|-md|-lg|-xl} table-bordered table-striped" width="100%" cellspacing="0" id="table-demandeurs">
                          <thead class="table-dark">
                            <tr>
                              <th>Cin</th>
                              <th>Civilité</th>
                              <th>Prenom</th>
                              <th>Nom</th>
                              <th>Module</th>
                              {{--  <th>Provenance</th>  --}}
                              <th>Téléphone</th>
                              <th>Statut</th>
                              <th style="width:13%;">Action</th>
                            </tr>
                          </thead>
                          <tfoot class="table-dark">
                              <tr>
                              <th>Cin</th>
                              <th>Civilité</th>
                              <th>Prenom</th>
                              <th>Nom</th>
                              <th>Module</th>
                              {{--  <th>Provenance</th>  --}}
                              <th>Téléphone</th>
                              <th>Statut</th>
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

      <div class="modal fade" id="modal_delete_demandeur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="" id="form-delete-demandeur">
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
          $('#table-demandeurs').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('demandeurs.list')}}",
            columns: [
                    { data: 'cin', name: 'cin' },
                    { data: 'user.civilite', name: 'user.civilite' },
                    { data: 'user.firstname', name: 'user.firstname' },
                    { data: 'user.name', name: 'user.name' },
                    { data: 'user.demandeur.modules[].name', name: 'user.demandeur.modules[].name' },
                    //{ data: 'user.demandeur.localite.name', name: 'user.demandeur.localite.name' },
                    { data: 'user.telephone', name: 'user.telephone' },
                    { data: 'user.demandeur.status', name: 'user.demandeur.status' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('demandeurs.edit',':id')!!}".replace(':id', data.id);
                        url_s =  "{!! route('demandeurs.show',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('demandeurs.destroy',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary edit btn-sm" title="Modifier"><i class="far fa-edit"></i></a>'+
                        '<a href='+url_s+'  class=" btn btn-secondary show btn-sm ml-1" title="voir"><i class="far fa-eye"></i></a>'+
                        '<div class="btn btn-danger delete btn_delete_demandeur btn-sm ml-1" title="Supprimer" data-href='+url_d+'><i class="fas fa-trash-alt"></i></div>';
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
                },
                order:[[0,'desc'], [0, 'asc']]              
          });

          
        $('#table-demandeurs').off('click', '.btn_delete_demandeur').on('click', '.btn_delete_demandeur',
        function() { 
          var href=$(this).data('href');
          $('#form-delete-demandeur').attr('action', href);
          $('#modal_delete_demandeur').modal();
        });
      });
      
  </script> 
  @endpush