@extends('layout.default')
@section('title', 'ONFP - Modification bordereaux ')
@section('content')
    <div class="content">
        <div class="container col-12 col-md-12 col-lg-8 col-xl-12">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                <div class="row pt-0"></div>
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="card-title">Modification bordereaux</h3>
                    </div>
                    <div class="card-body">
                        <b> NB </b> : Les champs (<span class="text-danger"> <b>*</b> </span>) sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">INFORMATIONS</p>
                        </div>
                        {!! Form::open(['url' => 'bordereaus/' . $bordereau->id, 'method' => 'PATCH', 'files' => true]) !!}
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                {!! Form::label('Objet') !!} <span class="text-danger"> <b>*</b> </span>
                                {!! Form::textarea('objet', $bordereau->courrier->objet, ['placeholder' => '', 'class' => 'form-control', 'rows' => 2, 'id' => 'objets']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Adresse e-mail') !!} <span class="text-danger"> <b>*</b> </span>
                                {!! Form::email('email', $bordereau->courrier->email, ['placeholder' => 'Votre adresse e-mail', 'class' => 'form-control', 'id' => 'email']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Téléphone') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('telephone', $bordereau->courrier->telephone, ['placeholder' => 'Votre numero de téléphone', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Expéditeur') !!} <span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('expediteur', $bordereau->courrier->expediteur, ['placeholder' => "Nom et prénom de l'expéditeur", 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Imputation') !!}
                                {!! Form::select('directions[]', $directions, null, ['multiple' => 'multiple', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'direction']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Numéro mandat :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('numero_mandat', $bordereau->numero_mandat, ['placeholder' => 'Le numéro du mandat', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Date de mandatement :', null, ['class' => 'control-label']) !!}
                                {!! Form::date('date_mandat', Carbon\Carbon::parse($bordereau->date_mandat)->format('Y-m-d'), ['placeholder' => 'La date de naissance', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Montant :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('montant', $bordereau->montant, ['placeholder' => 'Le montant en F CFA', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Nombre de pièces :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::number('nombre_de_piece', $bordereau->nombre_de_piece, ['placeholder' => 'Le nombre de pièces', 'class' => 'form-control', 'min' => '0', 'max' => '100']) !!}
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Désignation :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::textarea('designation', $bordereau->designation, ['placeholder' => 'Désignation pour le réglement', 'rows' => 5, 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Observations :') !!}
                                {!! Form::textarea('observation', $bordereau->observation, ['placeholder' => 'observations éventuelles', 'rows' => 5, 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('', null, ['class' => 'control-label']) !!}
                                {!! Form::file('file', null, ['class' => 'form-control-file', 'data-width' => '100%']) !!}
                                @if ($bordereau->courrier->file !== '')
                                    <a class="btn btn-outline-secondary mt-2" title="télécharger le fichier joint"
                                        target="_blank" href="{{ asset($bordereau->courrier->getFile()) }}">
                                        <i class="fas fa-download">&nbsp;Télécharger le courrier</i>
                                    </a>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::text('legende', $bordereau->courrier->legende, ['placeholder' => 'attribué un nom du fichier joint', 'data-width' => '100%', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2">PROJET</p>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                {!! Form::label('Projet') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::select('projet', $projets, $bordereau->courrier->projet->sigle, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'projet']) !!}
                            </div>
                        </div>
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2">METTRE DANS UN CLASSEUR</p>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                {!! Form::label('Classeur :', null, ['class' => 'control-label']) !!}
                                {!! Form::select('liste', $listes, $bordereau->liste->numero, ['placeholder' => '', 'class' => 'form-control', 'id' => 'classeur', 'data-width' => '100%']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('classeur'))
                                        @foreach ($errors->get('classeur') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                        </div>

                        {!! Form::submit('Enregistrer', ['class' => 'btn btn-outline-primary pull-right']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascripts')
    <script type="text/javascript">
        $('#direction').select2().val({!! json_encode($bordereau->courrier->directions()->allRelatedIds()) !!}).trigger('change');

    </script>
@endsection
