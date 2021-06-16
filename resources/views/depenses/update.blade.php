@extends('layout.default')
@section('title', 'ONFP - Modification depenses')
@section('content')
    <div class="content">
        <div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                <div class="row pt-5"></div>
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="card-title">{{ 'Modification' }}</h3>
                        <p class="card-category">{{ 'depense' }}</p>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['url' => 'depenses/' . $depense->id, 'method' => 'PATCH', 'files' => true]) !!}
                            @csrf
                            <div class="form-row">
                                <div class="form-group col col-md-8 col-lg-8 col-xs-12 col-sm-12">
                                    <div class="form-group col-md-12">
                                        {!! Form::label('Projet') !!}<span class="text-danger"> <b>*</b> </span>
                                        {!! Form::select('projet', $projets, $depense->projet->name, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'projet']) !!}
                                    </div>
                                </div>
                                <div class="form-group col col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <div class="form-group col-md-12">
                                        {!! Form::label('Sigle') !!}<span class="text-danger"> <b>*</b> </span>
                                        {!! Form::select('sigle', $sigles, $depense->projet->sigle, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'projet-sigle', 'disabled' => 'disabled']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <div class="form-group col-md-12">
                                        {!! Form::label('Activité') !!}<span class="text-danger"> <b>*</b> </span>
                                        {!! Form::select('activite', $activites, $depense->activite->name, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'activite']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    {!! Form::label('Désignation :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::textarea('designation', $depense->designation, ['placeholder' => "Nom et prénom de l'expéditeur", 'rows' => 1, 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('designation'))
                                            @foreach ($errors->get('designation') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    {!! Form::label('Fournisseur :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::textarea('fournisseur', $depense->fournisseurs, ['placeholder' => "Nom et prénom de l'expéditeur", 'rows' => 1, 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('fournisseur'))
                                            @foreach ($errors->get('fournisseur') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Montant :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('montant', $depense->montant, ['placeholder' => 'Montant', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('montant'))
                                            @foreach ($errors->get('montant') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('IR :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('ir', $depense->ir, ['placeholder' => 'IR', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('ir'))
                                            @foreach ($errors->get('ir') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Autre Montant :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('autre_montant', $depense->autre_montant, ['placeholder' => 'Autre Montant', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('autre_montant'))
                                            @foreach ($errors->get('autre_montant') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            {!! Form::submit('Modifier', ['class' => 'btn btn-outline-primary pull-right']) !!}
                            {!! Form::close() !!}
                        <div class="modal fade" id="error-modal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es saisies
                                            svp</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @push('scripts')
                                                <script type="text/javascript">
                                                    $(document).ready(function() {
                                                        $("#error-modal").modal({
                                                            'show': true,
                                                        })
                                                    });

                                                </script>

                                            @endpush
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
