@extends('layout.default')
@section('title', 'ONFP - Modification Frais bancaire ')
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
                <div class="card p-3">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="h4 card-title text-center h-100 text-uppercase mb-0">Modification Frais bancaire</h3>
                    </div>
                    <div class="card-body">
                        <b> NB </b> : Les champs (<span class="text-danger"> <b>*</b> </span>) sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">INFORMATIONS</p>
                        </div>
                        {!! Form::open(['url' => 'banques/' . $banque->id, 'method' => 'PATCH', 'files' => true]) !!}
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                {!! Form::label('Numéro du courrier') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('numero_courrier', $banque->courrier->numero, ['placeholder' => 'numero du courrier', 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('numero_courrier'))
                                        @foreach ($errors->get('numero_courrier') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label('Designation') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::textarea('designation', $banque->courrier->designation, ['placeholder' => 'designation', 'rows' => 2, 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('designation'))
                                        @foreach ($errors->get('designation') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label('observation') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::textarea('observation', $banque->courrier->observation, ['placeholder' => 'observation', 'rows' => 2, 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('observation'))
                                        @foreach ($errors->get('observation') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10 col-lg-10 col-xs-12 col-sm-12" style="margin:auto">
                                {!! Form::label('Montant HT :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('montant', $banque->courrier->montant, ['placeholder' => 'Le montant en F CFA', 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('montant'))
                                        @foreach ($errors->get('montant') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-2 col-lg-2 col-xs-12 col-sm-12 pt-5" style="margin:auto">
                                {!! Form::label('TVA :') !!}<span class="text-danger"> <b>*</b> </span>
                                <span class="form-check form-check-inline">
                                    {{ Form::radio('tva', 'oui', false, ['class' => 'form-check-input']) }}
                                    <label class="form-check-label ml-2" for="inlineRadio1">Oui</label>
                                </span>
                                <span class="form-check form-check-inline">
                                    {{ Form::radio('tva', 'non', false, ['class' => 'form-check-input']) }}
                                    <label class="form-check-label ml-2" for="inlineRadio2">Non</label>
                                </span>
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('tva'))
                                        @foreach ($errors->get('tva') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12" style="margin:auto">
                                {!! Form::label('IR:') !!}
                                {!! Form::text('ir', $banque->courrier->ir, ['placeholder' => 'IR', 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('ir'))
                                        @foreach ($errors->get('ir') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12" style="margin:auto">
                                {!! Form::label('Autre montant :') !!}
                                {!! Form::text('autres_montant', $banque->courrier->autres_montant, ['placeholder' => 'Autre montant', 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('autres_montant'))
                                        @foreach ($errors->get('autres_montant') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12" style="margin:auto">
                                {!! Form::label('Numéro mandat :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('numero_mandat', $banque->numero, ['placeholder' => 'Le numéro du mandat', 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('numero_mandat'))
                                        @foreach ($errors->get('numero_mandat') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label('Visa DG :', null, ['class' => 'control-label']) !!}
                                {!! Form::date('date_dg', Carbon\Carbon::parse($banque->date_dg)->format('Y-m-d'), ['placeholder' => '', 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('date_dg'))
                                        @foreach ($errors->get('date_dg') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label('Visa AC :', null, ['class' => 'control-label']) !!}
                                {!! Form::date('date_ac', Carbon\Carbon::parse($banque->date_ac)->format('Y-m-d'), ['placeholder' => '', 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('date_ac'))
                                        @foreach ($errors->get('date_ac') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('', null, ['class' => 'control-label']) !!}
                                {!! Form::file('file', null, ['class' => 'form-control-file', 'data-width' => '100%']) !!}
                                @if (isset($banque->courrier->file))
                                    <a class="btn btn-outline-secondary mt-2" title="télécharger le fichier joint"
                                        target="_blank" href="{{ asset($banque->courrier->getFile()) }}">
                                        <i class="fas fa-download">&nbsp;Télécharger le courrier</i>
                                    </a>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::text('legende', $banque->courrier->legende, ['placeholder' => 'attribué un nom du fichier joint', 'data-width' => '100%', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2">PROJET</p>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-12">
                                {!! Form::label('Projet') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::select('projet', $projets, $banque->courrier->projet->sigle, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'projet']) !!}
                            </div>
                        </div>
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2">IMPUTATION DIRECTIONS</p>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                {!! Form::label('Imputation') !!}
                                {!! Form::select('directions[]', $directions, null, ['multiple' => 'multiple', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'direction']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('direction'))
                                        @foreach ($errors->get('direction') as $message)
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
        $('#direction').select2().val({!! json_encode($banque->courrier->directions()->allRelatedIds()) !!}).trigger('change');
    </script>
@endsection
