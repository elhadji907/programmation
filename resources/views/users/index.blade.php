@extends('layout.default')
@section('title', 'ONFP - Liste des users')
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
                        Liste des utilisateurs
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <br />
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-users">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Civilité</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Date naissance</th>
                                        <th>Lieu naissance</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>Civilité</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Date naissance</th>
                                        <th>Lieu naissance</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                  @foreach ($users as $user)
                                      <tr>
                                          <td>{!! $user->civilite !!}</td>
                                          <td>{!! ucwords(strtolower($user->firstname)) !!}</td>
                                          <td>{!! mb_strtoupper($user->name, 'UTF-8') !!}</td>
                                          <td>{!! $user->date_naissance->format('d/m/Y') !!}</td>
                                          <td>{!! mb_strtoupper($user->lieu_naissance) !!}</td>
                                          <td>{!! $user->telephone !!}</td>
                                          <td>{!! $user->email !!}</td>
                                          <td>{!! mb_strtolower($user->username) !!}</td>
                                          <td>{!! ucwords(strtolower($user->role->name)) !!}</td>
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
            $('#table-users').DataTable({
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
