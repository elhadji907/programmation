@extends('layout.default')
@section('title', 'ONFP - Liste des formations')
@section('content')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <div class="row justify-content-center">
            
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <a class="nav-link" href="{{ route('formations.index') }}" target="_blank" >
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ ('Formations (Toutes)') }}</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $all_formations }}</div>
                  </div>
                  <div class="col-auto">
                    <span data-feather="mail"></span>
                  </div>
                </div>
              </div>
              </a>
            </div>
          </div> 

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a class="nav-link" href="{{ route('formations.index') }}" target="_blank">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        {{ 'Formations (ANNUELS)' }}</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $all_formations }}</div>
                                </div>
                                <div class="col-auto">
                                    <span data-feather="mail"></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <a class="nav-link" href="{{ route('findividuelles.index') }}" target="_blank">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        {{ 'Formations (Individuelles)' }}
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $findividuelles }}</div>
                                </div>
                                <div class="col-auto">
                                    <span data-feather="mail"></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                 <a class="nav-link" href="{{ route('fcollectives.index') }}" target="_blank">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ ('Formations (Collectives)') }}</div>
                        <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{  $fcollectives }}</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <span data-feather="mail"></span>
                      </div>
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
                        Liste des formations
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div align="right">
                                <a href="{{ route('formations.create') }}">
                                    <div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div>
                                </a>
                            </div>
                            <br />
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                id="table-formations">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Code</th>
                                        <th>Bénéficiares</th>
                                        <th>Localité</th>
                                        <th>Adresse</th>
                                        <th style="width:15%;">Période</th>
                                        <th>Formation</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>Code</th>
                                        <th>Bénéficiares</th>
                                        <th>Localité</th>
                                        <th>Adresse</th>
                                        <th>Période</th>
                                        <th>Formation</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($formations as $formation)
                                        <tr>
                                            <td>{!! $formation->code !!}</td>
                                            <td>{!! $formation->beneficiaires !!}</td>
                                            <td>{!! $formation->departement->nom ?? ' ' !!}</td>
                                            <td>{!! $formation->adresse ?? ' ' !!}</td>
                                            <td>{!! $formation->date_debut->format('d/m/Y') !!}&nbsp;au&nbsp;{!! $formation->date_fin->format('d/m/Y') !!}</td>
                                            <td>{!! $formation->types_formation->name !!}</td>
                                            {{-- <td class="d-flex align-items-baseline text-center-row">
                                                <a href="{!! url('formations/' . $formation->id . '/edit') !!}" class='btn btn-success btn-sm'
                                                    title="modifier">
                                                    <i class="far fa-edit">&nbsp;</i>
                                                </a>
                                                &nbsp;
                                                <a href="{!! url('demandeurs/' . $formation->id) !!}" class='btn btn-primary btn-sm'
                                                    title="voir">
                                                    <i class="far fa-eye">&nbsp;</i>
                                                </a>
                                                &nbsp;
                                                {!! Form::open(['method' => 'DELETE', 'url' => 'formations/' . $formation->id, 'id' => 'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
                                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'supprimer']) !!}
                                                {!! Form::close() !!}
                                            </td> --}}
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
        $(document).ready(function() {
            $('#table-formations').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ],
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "Tout"]
                ],
                "order": [
                    [1, 'asc']
                ],
                language: {
                    "sProcessing": "Traitement en cours...",
                    "sSearch": "Rechercher&nbsp;:",
                    "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                    "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                    "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    "sInfoPostFix": "",
                    "sLoadingRecords": "Chargement en cours...",
                    "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                    "oPaginate": {
                        "sFirst": "Premier",
                        "sPrevious": "Pr&eacute;c&eacute;dent",
                        "sNext": "Suivant",
                        "sLast": "Dernier"
                    },
                    "oAria": {
                        "sSortAscending": ": activer pour trier la colonne par ordre croissant",
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
        });
    </script>
@endpush
