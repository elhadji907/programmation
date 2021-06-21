@extends('layout.default')
@section('title', 'ONFP - Enregistrement bordereaux ')
@section('content')
    <div class="content">
        <div class="container">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                <div class="row pt-0"></div>
                <div class="card p-3">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="h4 card-title text-center h-100 text-uppercase mb-0">Enregistrement bordereaux</h3>
                    </div>
                    <div class="card-body">
                        <b> NB </b> : Les champs (<span class="text-danger"> <b>*</b> </span>) sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">INFORMATIONS</p>
                        </div>
                        <form method="POST" action="{{ url('bordereaus') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    {!! Form::label('Objet') !!} <span class="text-danger"> <b>*</b> </span>
                                    {!! Form::textarea('objet', null, ['placeholder' => '', 'class' => 'form-control', 'rows' => 2, 'id' => 'objets']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('objet'))
                                            @foreach ($errors->get('objet') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    {!! Form::label('Expéditeur') !!} <span class="text-danger"> <b>*</b> </span>
                                    {!! Form::textarea('expediteur', null, ['placeholder' => "Nom et prénom de l'expéditeur", 'rows' => 1, 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('expediteur'))
                                            @foreach ($errors->get('expediteur') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Adresse e-mail') !!} <span class="text-danger"> <b>*</b> </span>
                                    {!! Form::email('email', null, ['placeholder' => 'adresse e-mail', 'class' => 'form-control', 'id' => 'email']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('email'))
                                            @foreach ($errors->get('email') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Téléphone') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('telephone', null, ['placeholder' => 'numero de téléphone', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('telephone'))
                                            @foreach ($errors->get('telephone') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Numéro mandat :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('numero_mandat', null, ['placeholder' => 'Le numéro du mandat', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('numero_mandat'))
                                            @foreach ($errors->get('numero_mandat') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Date mandatement :', null, ['class' => 'control-label']) !!}
                                    {!! Form::date('date_mandat', null, ['placeholder' => 'La date de naissance', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('date_mandat'))
                                            @foreach ($errors->get('date_mandat') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Montant :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('montant', null, ['placeholder' => 'Le montant en F CFA', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('montant'))
                                            @foreach ($errors->get('montant') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Nbre de pièces :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::number('nombre_de_piece', 1, ['placeholder' => 'Le nombre de pièces', 'class' => 'form-control', 'min' => '0', 'max' => '100']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('nombre_de_piece'))
                                            @foreach ($errors->get('nombre_de_piece') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Désignation :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::textarea('designation', null, ['placeholder' => 'Désignation pour le réglement', 'rows' => 5, 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('designation'))
                                            @foreach ($errors->get('designation') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Observations :') !!}
                                    {!! Form::textarea('observation', null, ['placeholder' => 'observations éventuelles', 'rows' => 5, 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('observation'))
                                            @foreach ($errors->get('observation') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">PROJET</p>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    {!! Form::label('Projet :', null, ['class' => 'control-label']) !!}
                                    {!! Form::select('projet', $projets, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'projet', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('projet'))
                                            @foreach ($errors->get('projet') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">METTRE DANS UN CLASSEUR</p>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    {!! Form::label('Classeur :', null, ['class' => 'control-label']) !!}
                                    {!! Form::select('liste', $listes, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'classeur', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('classeur'))
                                            @foreach ($errors->get('classeur') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right"><i
                                    class="far fa-paper-plane"></i>&nbsp;Enregistrer</button>
                        </form>
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
