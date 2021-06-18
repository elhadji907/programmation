@extends('layout.default')
@section('title', 'ONFP - Liste des depenses')
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
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weiht-bold text-info"><i class="fas fa-table"></i>&nbsp;Dépenses</h6>
                    </div>     
                    <div class="card-body">
                        <div class="table-responsive">
                            <div align="right">
                                <a href="{{ route('depenses.create') }}">
                                    <div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div>
                                </a>
                            </div>
                            <br />
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                id="table-depenses">
                                <thead class="table-dark">
                                    <tr>
                                        <th>N°</th>
                                        <th style="width:5%;">Projets</th>
                                        <th style="width:12%;">Activités</th>
                                        <th>Désignation</th>
                                        <th>Fournisseurs</th>
                                        <th style="width:12%;">Montant</th>
                                        <th style="width:12%;">TVA</th>
                                        <th style="width:10%;">IR</th>
                                        <th style="width:12%;">Montant TTC</th>
                                        <th style="width:5%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>N°</th>
                                        <th>Projets</th>
                                        <th>Activités</th>
                                        <th>Désignation</th>
                                        <th>Fournisseurs</th>
                                        <th>Montant</th>
                                        <th>TVA</th>
                                        <th>IR</th>
                                        <th>Montant TTC</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($depenses as $depense)
                                        <tr>
                                            <td class="align-middle">{!! $i++ !!}</td>
                                            <td class="align-middle">
                                                <a style="color: darkorange; text-decoration: none;"
                                                href="{!! url('projets/'. $depense->projet->id) !!}" class="view" title="voir"
                                                target="_blank">
                                                {!! $depense->projet->sigle !!}
                                            </a>
                                            </td>
                                            <td class="align-middle">{!! $depense->activite->name !!}</td>
                                            <td class="align-middle">{!! $depense->designation !!}</td>
                                            <td class="align-middle">{!! $depense->fournisseurs !!}</td>
                                            <td class="align-middle">{!! number_format($depense->montant, 0, ',', ' ') . ' ' !!}</td>
                                            <td class="align-middle">{!! number_format($depense->tva, 0, ',', ' ') . ' ' !!}</td>
                                            <td class="align-middle">{!! number_format($depense->ir, 0, ',', ' ') . ' ' !!}</td>
                                            <td class="align-middle">{!! number_format($depense->total, 0, ',', ' ') . ' ' !!}</td>
                                            <td class="d-flex align-items-center justify-content-center">
                                                {{-- @can('update', $depense) --}}
                                                <a href="{!! url('depenses/' . $depense->id . '/edit') !!}" class='btn btn-success btn-sm'
                                                    title="modifier">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                {{-- @endcan --}}
                                                &nbsp
                                                {{-- <a href="{!! url('courriers/' .$depense->id) !!}" class= 'btn btn-primary btn-sm' title="voir">
                                    <i class="far fa-eye">&nbsp;</i>
                                  </a> --}}
                                                {{-- @can('delete', $depense) --}}
                                                {!! Form::open(['method' => 'DELETE', 'url' => 'depenses/' . $depense->id, 'id' => 'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
                                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'supprimer']) !!}
                                                {!! Form::close() !!}
                                                {{-- @endcan --}}
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

    <div class="modal fade" id="modal_delete_domaine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form method="POST" action="" id="form-delete-domaine">
            @csrf
            @method('DELETE')
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Êtes-vous sûr de bien vouloir supprimer cet admin ?
                        </h6>
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
        $(document).ready(function() {
            $('#table-depenses').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ],
                "lengthMenu": [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "Tout"]
                ],
                "order": [
                    [0, 'asc']
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
