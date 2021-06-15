@extends('layout.default')
@section('title', 'B. DAF' . ' ' . $liste->numero)
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        {!! $liste->numero !!}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div align="right">
                                <a href="{{ route('bordereaus.create') }}">
                                    <div class="btn btn-success btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div>
                                </a>
                            </div>
                            <br />
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                id="table-bordereaus">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width:8%;">{!! __('Numéro') !!}</th>
                                        <th style="width:8%;">{!! __('Date/MP') !!}</th>
                                        <th style="width:30%;">{!! __('Désignation') !!}</th>
                                        <th>{!! __('Projet') !!}</th>
                                        <th>{!! __('Montant') !!}</th>
                                        <th style="width:5%;">{!! __('Nb/Pc') !!}</th>
                                        <th>{!! __('Observation') !!}</th>
                                        <th style="width:10%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>{!! __('Numéro') !!}</th>
                                        <th>{!! __('Date/MP') !!}</th>
                                        <th>{!! __('Désignation') !!}</th>
                                        <th>{!! __('Projet') !!}</th>
                                        <th>{!! __('Montant') !!}</th>
                                        <th>{!! __('Nb/Pc') !!}</th>
                                        <th>{!! __('Observation') !!}</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($bordereaus as $bordereau)
                                        <tr>
                                            {{-- <td>{!! $i++ !!}</td> --}}
                                            <td>{!! $bordereau->numero !!}</td>
                                            <td>{!! Carbon\Carbon::parse($bordereau->date_mandat)->format('d/m/Y') !!}</td>
                                            <td>{!! $bordereau->designation !!}</td>
                                            <td>{!! $bordereau->courrier->projet->sigle !!}</td>
                                            <td>{!! $bordereau->montant !!}</td>
                                            <td>{!! $bordereau->nombre_de_piece !!}</td>
                                            <td>{!! $bordereau->observation !!}</td>
                                            <td class="align-middle d-flex align-items-baseline">
                                                {{--  @can('update', $bordereau->courrier)  --}}
                                                    <a href="{!! url('bordereaus/' . $bordereau->id . '/edit') !!}" class='btn btn-success btn-sm'
                                                        title="modifier" target="_blank">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                {{--  @endcan  --}}
                                                &nbsp
                                                <a href="{!! url('courriers/' . $bordereau->courrier->id) !!}" class='btn btn-primary btn-sm'
                                                    title="voir" target="_blank">
                                                    <i class="far fa-eye">&nbsp;</i>
                                                </a>
                                                &nbsp;
                                                {{--  @can('delete', $bordereau->courrier)  --}}
                                                    {!! Form::open(['method' => 'DELETE', 'url' => 'bordereaus/' . $bordereau->id, 'id' => 'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
                                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'supprimer']) !!}
                                                    {!! Form::close() !!}
                                                {{--  @endcan  --}}
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
