@extends('layout.default')
@section('content')
    <div class="container-fluid">
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
                        {{ __("Sélection de l'ingénieur") }}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div align="right">
                            </div>
                            <br />
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                style="height: 100px;">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Cin</th>
                                        <th>Civilité</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Date nais.</th>
                                        <th>Lieu nais.</th>
                                        <th>Téléphone</th>
                                        <th>Département</th>
                                        <th>Région</th>
                                        <th width="50px">Ajouter</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Cin</th>
                                        <th>Civilité</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Date nais.</th>
                                        <th>Lieu nais.</th>
                                        <th>Téléphone</th>
                                        <th>Département</th>
                                        <th>Région</th>
                                        <th>Ajouter</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if ($individuelles->count())
                                        @foreach ($individuelles as $key => $individuelle)
                                            <tr id="tr_{{ $individuelle->id }}">
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $individuelle->cin }}</td>
                                                <td>{!! $individuelle->demandeur->user->civilite !!}</td>
                                                <td>{!! $individuelle->demandeur->user->firstname !!}</td>
                                                <td>{!! $individuelle->demandeur->user->name !!}</td>
                                                <td>{!! $individuelle->demandeur->user->date_naissance->format('d/m/Y') !!}</td>
                                                <td>{!! $individuelle->demandeur->user->lieu_naissance !!}</td>
                                                <td>{!! $individuelle->demandeur->user->telephone !!}</td>
                                                <td>{!! $individuelle->demandeur->departement->nom !!}</td>
                                                <td>{!! $individuelle->demandeur->departement->region->nom !!}</td>
                                                <td>
                                                    <a href="{{ route('adddindividuelles', ['$id_ind' => $individuelle->id, '$id_form' => $id_form]) }}"
                                                        title="ajouter" class="btn btn-outline-primary btn-sm mt-0">
                                                        <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between align-items-center mt-5">                                   
                                <a href="{!! url('formations/' . $id_form) !!}" class='btn btn-primary btn-sm'
                                    title="voir">
                                    <i class="far fa-eye">&nbsp;</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
