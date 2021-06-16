@extends('layout.default')
@section('title', 'ONFP - Enregistrement depenses')
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
                        <h3 class="card-title">{{ 'Enregistrement' }}</h3>
                        <p class="card-category">{{ 'depense' }}</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('depenses') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <div class="form-group col-md-12">
                                        {!! Form::label('Projet') !!}<span class="text-danger"> <b>*</b> </span>
                                        {!! Form::select('projet', $projets, null, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'projet']) !!}
                                        <small id="emailHelp" class="form-text text-muted">
                                            @if ($errors->has('projet'))
                                                @foreach ($errors->get('projet') as $message)
                                                    <p class="text-danger">{{ $message }}</p>
                                                @endforeach
                                            @endif
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <div class="form-group col-md-12">
                                        {!! Form::label('Activité') !!}<span class="text-danger"> <b>*</b> </span>
                                        {!! Form::select('activite', $activites, null, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'activite']) !!}
                                        <small id="emailHelp" class="form-text text-muted">
                                            @if ($errors->has('activite'))
                                                @foreach ($errors->get('activite') as $message)
                                                    <p class="text-danger">{{ $message }}</p>
                                                @endforeach
                                            @endif
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    {!! Form::label('Désignation :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::textarea('designation', null, ['placeholder' => "Nom et prénom de l'expéditeur", 'rows' => 1, 'class' => 'form-control', 'id' => 'designation']) !!}
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
                                    {!! Form::textarea('fournisseur', null, ['placeholder' => "Nom et prénom de l'expéditeur", 'rows' => 1, 'class' => 'form-control']) !!}
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
                                    {!! Form::text('montant', null, ['placeholder' => 'Montant', 'class' => 'form-control']) !!}
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
                                    {!! Form::text('ir', null, ['placeholder' => 'IR', 'class' => 'form-control']) !!}
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
                                    {!! Form::text('autre_montant', null, ['placeholder' => 'Autre Montant', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('autre_montant'))
                                            @foreach ($errors->get('autre_montant') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            {!! Form::submit('Enregistrer', ['class' => 'btn btn-outline-primary pull-right']) !!}
                            {!! Form::close() !!}
                            <div class="modal fade" id="error-modal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es
                                                saisies
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
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Fermer</button>
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
