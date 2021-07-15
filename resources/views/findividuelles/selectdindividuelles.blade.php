@extends('layout.default')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        {{ __("Sélection de l'ingénieur") }}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div align="right">
                            </div>
                            <br />
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                id="table-individuelles" style="height: 100px;">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width:5%;">ID</th>
                                        <th>CIN</th>
                                        <th>Civilite</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Département</th>
                                        <th>Région</th>
                                        <th>Choisir</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>CIN</th>
                                        <th>Civilite</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Département</th>
                                        <th>Région</th>
                                        <th>Choisir</th>
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
        $(document).ready(function() {
            $('#table-individuelles').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('individuelles.list') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'cin',
                        name: 'cin'
                    },
                    {
                        data: 'demandeur.user.name',
                        name: 'demandeur.user.name'
                    },
                    {
                        data: 'cin',
                        name: 'cin'
                    },
                    {
                        data: 'cin',
                        name: 'cin'
                    },
                    {
                        data: 'cin',
                        name: 'cin'
                    },
                    {
                        data: 'cin',
                        name: 'cin'
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false
                    }

                ],
                "columnDefs": [{
                        "data": null,
                        "render": function(data, type, row) {
                            url_e = "{!! route('findividuelles.create', 'ingenieur=:id') !!}".replace(':id', data.id);
                            return '<a href=' + url_e +
                                '  class="btn btn-outline-primary" ><i class="fa fa-check" aria-hidden="true"></i>';
                        },
                        "targets": 7
                    },

                ],

                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ],

                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "Tout"]
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
                },

            });

        });
    </script>
@endpush
