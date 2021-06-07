@extends('layout.default')
@section('title', 'ONFP - Liste des bordereaux')
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
                        Liste des bordereaux
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div align="right">
                                <a href="{!! url('bordereaus/create') !!}">
                                    <div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div>
                                </a>
                            </div>
                            <table class="table table-bordered table-striped" id="table-bordereaus" width="100%"
                                cellspacing="0">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width:7%;">N° MP</th>
                                        <th style="width:8%;">Date MP</th>
                                        <th style="width:25%;">Désignation réglement</th>
                                        <th style="width:5%;">Projet</th>
                                        <th style="width:10%;">Montant</th>
                                        <th style="width:10%;">Nbre pièces</th>
                                        <th style="width:25%;">Bobservations</th>
                                        <th style="width:10%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>N° MP</th>
                                        <th>Date MP</th>
                                        <th>Désignation réglement</th>
                                        <th>Projet</th>
                                        <th>Montant</th>
                                        <th>Nbre pièces</th>
                                        <th>Bobservations</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($bordereaus as $bordereau)
                                        <tr>
                                            {{-- <td class="align-middle">{!! $i++ !!}</td> --}}
                                            <td class="align-middle">{!! $bordereau->numero_mandat !!}</td>
                                            <td class="align-middle">{!! Carbon\Carbon::parse($bordereau->date_mandat)->format('d/m/Y') !!}</td>
                                            <td class="align-middle">{!! $bordereau->designation !!}</td>
                                            <td class="align-middle">{!! $bordereau->courrier->projet->sigle !!}</td>
                                            <td class="align-middle">{!! $bordereau->montant !!}</td>
                                            <td class="align-middle">{!! $bordereau->nombre_de_piece !!}</td>
                                            <td class="align-middle">{!! $bordereau->observation !!}</td>
                                            <td class="d-flex align-items-center justify-content-center"
                                                style="height: 150px;">
                                                @can('update', $bordereau->courrier)
                                                    <a href="{!! url('bordereaus/' . $bordereau->id . '/edit') !!}" class='btn btn-success btn-sm'
                                                        title="modifier">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                @endcan
                                                &nbsp
                                                <a href="{!! url('courriers/' . $bordereau->courrier->id) !!}" class='btn btn-primary btn-sm'
                                                    title="voir">
                                                    <i class="far fa-eye">&nbsp;</i>
                                                </a>
                                                &nbsp;
                                                @can('delete', $bordereau->courrier)
                                                    {!! Form::open(['method' => 'DELETE', 'url' => 'bordereaus/' . $bordereau->id, 'id' => 'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
                                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'supprimer']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
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
            $('#table-bordereaus').DataTable({
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
