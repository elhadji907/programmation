@extends('layout.default')
@section('title', 'ONFP - Modification facture ')
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
                        <h3 class="h4 card-title text-center h-100 text-uppercase mb-0">Modification facture</h3>
                    </div>
                    <div class="card-body">
                        <b> NB </b> : Les champs (<span class="text-danger"> <b>*</b> </span>) sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">INFORMATIONS</p>
                        </div>
                        {!! Form::open(['url' => 'tresors/' . $tresor->id, 'method' => 'PATCH', 'files' => true]) !!}
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Date imputation :', null, ['class' => 'control-label']) !!}
                                {!! Form::date('date_imp', Carbon\Carbon::parse($tresor->date_imp)->format('Y-m-d'), ['placeholder' => '', 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('date_imp'))
                                        @foreach ($errors->get('date_imp') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Date reception :', null, ['class' => 'control-label']) !!}
                                {!! Form::date('date_recep', Carbon\Carbon::parse($tresor->date_recep)->format('Y-m-d'), ['placeholder' => '', 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('date_recep'))
                                        @foreach ($errors->get('date_recep') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Numéro du courrier') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('numero_courrier', $tresor->courrier->numero, ['placeholder' => 'numero du courrier', 'class' => 'form-control']) !!}
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
                                {!! Form::label('Objet') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::textarea('objet', $tresor->courrier->objet, ['placeholder' => 'objet', 'rows' => 2, 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('objet'))
                                        @foreach ($errors->get('objet') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label('Designation') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::textarea('designation', $tresor->designation, ['placeholder' => 'designation', 'rows' => 2, 'class' => 'form-control']) !!}
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
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Montant HT :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('montant', $tresor->montant, ['placeholder' => 'Le montant en F CFA', 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('montant'))
                                        @foreach ($errors->get('montant') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Autre montant :') !!}
                                {!! Form::text('autres_montant', $tresor->courrier->autres_montant, ['placeholder' => 'Autre montant', 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('autres_montant'))
                                        @foreach ($errors->get('autres_montant') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Numéro mandat :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('numero_mandat', $tresor->numero, ['placeholder' => 'Le numéro du mandat', 'class' => 'form-control']) !!}
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
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Visa CG :', null, ['class' => 'control-label']) !!}
                                {!! Form::date('date_cg', Carbon\Carbon::parse($tresor->date_cg)->format('Y-m-d'), ['placeholder' => '', 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('date_cg'))
                                        @foreach ($errors->get('date_cg') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Visa DG :', null, ['class' => 'control-label']) !!}
                                {!! Form::date('date_dg', Carbon\Carbon::parse($tresor->date_dg)->format('Y-m-d'), ['placeholder' => '', 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('date_dg'))
                                        @foreach ($errors->get('date_dg') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Visa AC :', null, ['class' => 'control-label']) !!}
                                {!! Form::date('date_ac', Carbon\Carbon::parse($tresor->date_ac)->format('Y-m-d'), ['placeholder' => '', 'class' => 'form-control']) !!}
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
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Adresse e-mail') !!} <span class="text-danger"> <b>*</b> </span>
                                {!! Form::email('email', $tresor->courrier->email, ['placeholder' => 'adresse e-mail', 'class' => 'form-control', 'id' => 'email']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('email'))
                                        @foreach ($errors->get('email') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Téléphone') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('telephone', $tresor->courrier->telephone, ['placeholder' => 'numero de téléphone', 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('telephone'))
                                        @foreach ($errors->get('telephone') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Adresse') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::textarea('adresse', $tresor->courrier->adresse, ['placeholder' => 'adresse', 'rows' => 1, 'class' => 'form-control']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('adresse'))
                                        @foreach ($errors->get('adresse') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                {!! Form::label('Observations :') !!}
                                {!! Form::textarea('observation', $tresor->observation, ['placeholder' => 'observations éventuelles', 'rows' => 2, 'class' => 'form-control']) !!}
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
                            <div class="form-group col-md-6">
                                {!! Form::label('', null, ['class' => 'control-label']) !!}
                                {!! Form::file('file', null, ['class' => 'form-control-file', 'data-width' => '100%']) !!}
                                @if ($tresor->courrier->file !== '')
                                    <a class="btn btn-outline-secondary mt-2" title="télécharger le fichier joint"
                                        target="_blank" href="{{ asset($tresor->courrier->getFile()) }}">
                                        <i class="fas fa-download">&nbsp;Télécharger le courrier</i>
                                    </a>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::text('legende', $tresor->courrier->legende, ['placeholder' => 'attribué un nom du fichier joint', 'data-width' => '100%', 'class' => 'form-control']) !!}
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
        $('#direction').select2().val({!! json_encode($tresor->courrier->directions()->allRelatedIds()) !!}).trigger('change');
    </script>
@endsection
