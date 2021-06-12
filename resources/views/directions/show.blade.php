@extends('layout.default')
@section('title', $direction->name)
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
                @roles('Administrateur')
                <div class="list-group mb-1">
                    @foreach ($direction_courriers as $courrier)
                        <div class="list-group-item">
                                <p class="h4 card-title h-100 m-0"><b><u class="h4">Type </u> : </b> {!! $courrier->types_courrier->name !!}
                                </p>
                                <p class="h4 card-title h-100 mb-0"><b><u class="h4">Objet </u> : </b><a class="font-italic"
                                        style="text-decoration:none"
                                        href="{!! route('courriers.show', $courrier->id) !!}">{!! $courrier->objet !!}</a></p>
                                <p><b><u class="h4">Expéditeur </u> : </b>{!! $courrier->expediteur !!}</p>
                                <p><b><u class="h4">Description </u> : </b>{!! $courrier->description !!}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small>Posté le {!! $courrier->created_at->format('d/m/Y à H:m') !!}</small>
                                    <span
                                        class="badge badge-primary">{!! $courrier->user->firstname !!}&nbsp;{!! $courrier->user->name !!}</span>
                                </div>
                        </div>
                    @endforeach
                    <hr>
                </div>
                <div class="d-flex justify-content-center pt-2">
                    {!! $courriers->links() !!}
                </div>
                @endroles
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        {!! $direction->name !!}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <p>
                                    {{-- <a target="_blank" class="btn btn-primary  btn-sm" href=""><i class="fas fa-eye"></i>&nbsp;Voir les courriers</a> --}}
                                </p>
                                <span>
                                    <a href="{{ route('directions.selectemployees') }}">
                                        <div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div>
                                    </a>
                                </span>
                            </div>
                            <br />
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                id="table-directions">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width:5%;">Matricule</th>
                                        <th style="width:5%;">Civilité</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th style="width:8%;">Date Nais.</th>
                                        <th>Lieu Nais.</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th style="width:15%;">Fonction</th>
                                        <th style="width:10%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>Matricule</th>
                                        <th>Civilité</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Date Nais.</th>
                                        <th>Lieu Nais.</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Fonction</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{!! $employee->matricule !!}</td>
                                            <td>{!! $employee->user->civilite !!}</td>
                                            <td>{!! $employee->user->firstname !!}</td>
                                            <td>{!! $employee->user->name !!}</td>
                                            <td>{!! $employee->user->date_naissance->format('d/m/Y') !!}</td>
                                            <td>{!! $employee->user->lieu_naissance !!}</td>
                                            <td>{!! $employee->user->email !!}</td>
                                            <td>{!! $employee->user->telephone !!}</td>
                                            <td>{!! $employee->fonction->name !!}</td>
                                            <td style="text-align: center;"
                                                class="d-flex align-items-baseline align-content-center">
                                                <a href="{!! url('employees/' . $employee->id . '/edit') !!}" class='btn btn-success btn-sm'
                                                    title="modifier">
                                                    <i class="far fa-edit">&nbsp;</i>
                                                </a>
                                                &nbsp;
                                                <a href="{!! url('employees/' . $employee->id) !!}" class='btn btn-primary btn-sm'
                                                    title="voir">
                                                    <i class="far fa-eye">&nbsp;</i>
                                                </a>
                                                &nbsp;
                                                {!! Form::open(['method' => 'DELETE', 'url' => 'employees/' . $employee->id, 'id' => 'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
                                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'supprimer']) !!}
                                                {!! Form::close() !!}
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
            $('#table-directions').DataTable({
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
