@extends('layout.default')
@section('title', 'ONFP - Enregistrement facture ')
@section('content')
    <div class="content">
        <div class="container col-12 col-md-12 col-lg-8 col-xl-12">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                <div class="row pt-0"></div>
                <div class="card p-3">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="h4 card-title text-center h-100 text-uppercase mb-0">Enregistrement facture</h3>
                    </div>
                    <div class="card-body">
                        <b> NB </b> : Les champs (<span class="text-danger"> <b>*</b> </span>) sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">INFORMATIONS</p>
                        </div>
                        <form method="POST" action="{{ url('facturesdafs') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Date imputation :', null, ['class' => 'control-label']) !!}
                                    {!! Form::date('date_imp', null, ['placeholder' => '', 'class' => 'form-control']) !!}
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
                                    {!! Form::date('date_recep', null, ['placeholder' => '', 'class' => 'form-control']) !!}
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
                                    {!! Form::text('numero_courrier', null, ['placeholder' => 'numero du courrier', 'class' => 'form-control']) !!}
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
                                    {!! Form::textarea('objet', null, ['placeholder' => 'objet', 'rows' => 2, 'class' => 'form-control']) !!}
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
                                    {!! Form::textarea('designation', null, ['placeholder' => 'designation', 'rows' => 2, 'class' => 'form-control']) !!}
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
                                    {!! Form::text('montant', null, ['placeholder' => 'Le montant en F CFA', 'class' => 'form-control']) !!}
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
                                    {!! Form::text('autres_montant', null, ['placeholder' => 'Le autres_montant en F CFA', 'class' => 'form-control']) !!}
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
                                    {!! Form::text('numero_mandat', null, ['placeholder' => 'Le numéro du mandat', 'class' => 'form-control']) !!}
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
                                    {!! Form::date('date_cg', null, ['placeholder' => '', 'class' => 'form-control']) !!}
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
                                    {!! Form::date('date_dg', null, ['placeholder' => '', 'class' => 'form-control']) !!}
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
                                    {!! Form::date('date_ac', null, ['placeholder' => '', 'class' => 'form-control']) !!}
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
                                    {!! Form::email('email', null, ['placeholder' => 'adresse e-mail', 'class' => 'form-control', 'id' => 'email']) !!}
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
                                    {!! Form::text('telephone', null, ['placeholder' => 'numero de téléphone', 'class' => 'form-control']) !!}
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
                                    {!! Form::textarea('adresse', null, ['placeholder' => 'adresse', 'rows' => 1, 'class' => 'form-control']) !!}
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
                                    {!! Form::textarea('observation', null, ['placeholder' => 'observations éventuelles', 'rows' => 2, 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('observation'))
                                            @foreach ($errors->get('observation') as $message)
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
