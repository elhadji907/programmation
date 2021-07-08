@extends('layout.default')
@section('title', 'ONFP - Liste des demandeurs')
@section('content')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <div class="row justify-content-center">
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
                                <a href="{{ route('demandeurs.create') }}">
                                    <div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div>
                                </a>
                            </div>
                            <br />
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                id="table-demandeurs">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Civilité</th>
                                        <th>Prenom & Nom</th>
                                        <th>Date nais.</th>
                                        <th>Lieu nais.</th>
                                        <th>Téléphone</th>
                                        <th>Module</th>
                                        <th>Type demande</th>
                                        <th>Localité</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>Civilité</th>
                                        <th>Prenom & Nom</th>
                                        <th>Date nais.</th>
                                        <th>Lieu nais.</th>
                                        <th>Téléphone</th>
                                        <th>Module</th>
                                        <th>Type demande</th>
                                        <th>Localité</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($demandeurs as $demandeur)
                                        <tr>
                                            <td>{!! $demandeur->user->civilite !!}</td>
                                            <td>{!! ucwords($demandeur->user->firstname) . '&nbsp;&nbsp;' . mb_strtoupper($demandeur->user->name, 'UTF-8') !!}</td>
                                            <td>{!! $demandeur->user->date_naissance->format('d/m/Y') !!}</td>
                                            <td>{!! mb_strtoupper($demandeur->user->lieu_naissance, 'UTF-8') !!}</td>
                                            <td>{!! $demandeur->user->telephone !!}</td>
                                            <td>
                                                @foreach ($demandeur->modules as $module)
                                                    {!! $module->name !!}
                                                @endforeach
                                            </td>
                                            <td>{!! $demandeur->types_demande->name !!}</td>
                                            <td>{!! $demandeur->departement->nom ?? ' ' !!}</td>
                                            <td>
                                                <a href="{!! url('demandeurs/' . $demandeur->id) !!}" class='btn btn-primary btn-sm'
                                                    title="voir">
                                                    <i class="far fa-eye">&nbsp;</i>
                                                </a>
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
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-demandeurs').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ],
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "Tout"]
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
