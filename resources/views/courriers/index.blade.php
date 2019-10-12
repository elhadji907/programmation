@extends('layout.default')
@section('content')
<div class="container-fluid">
    {{-- <div class="col-md-12">
        <a class="btn btn-info btn-block" href="{{ route('arrives.show') }}"><span data-feather="book-open"></span> Courriers arrivés</a>
    </div>
    <br />
    <div class="col-md-12">
        <a class="btn btn-dark btn-block" href="#"><span data-feather="book-open"></span> Courriers départs</a>
    </div>
    <br />
    <div class="col-md-12">
        <a class="btn btn-info btn-block" href="#"><span data-feather="book-open"></span> Courriers internes</a>
    </div> --}}

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Courriers</h1>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{ ('Courriers (ANNUELS)') }}</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Courrier::get()->count() }}</div>
                  </div>
                  <div class="col-auto">
                    {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                    <span data-feather="mail"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ ('Courriers (ARRIVES)') }}</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Recue::get()->count() }}</div>
                  </div>
                  <div class="col-auto">
                    {{-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> --}}
                    <span data-feather="mail"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
          <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ ('Courriers (DEPARTS)') }}</div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ \App\Depart::get()->count() }}</div>
                          </div>
                         {{--  <div class="col">
                            <div class="progress progress-sm mr-2">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div> --}}
                        </div>
                      </div>
                      <div class="col-auto">
                        {{-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> --}}
                        <span data-feather="mail"></span>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ ('Courriers (INTERNES)') }}</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Interne::get()->count() }}</div>
                      </div>
                      <div class="col-auto">
                        {{-- <i class="fas fa-comments fa-2x text-gray-300"></i> --}}
                        <span data-feather="mail"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

    </div>
</div>
<hr />
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
                    <div align="right">
                    <a href="#"><div class="btn btn-success">Nouveau Courrier&nbsp;<i class="fas fa-user-plus"></i></div></a>
                    </div>
                    <br />
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
                    { data: 'name', name: 'name' },
                    { data: 'types_courrier.name', name: 'types_courrier.name' },
                    { data: 'message', name: 'message' },
                    { data: 'destinataire', name: 'destinataire' },
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