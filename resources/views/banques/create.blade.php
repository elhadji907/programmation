@extends('layout.default')
@section('title', 'ONFP - Enregistrement frais bancaire ')
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
                        <h3 class="h4 card-title text-center h-100 text-uppercase mb-0">Enregistrement frais bancaire</h3>
                    </div>
                    <div class="card-body">
                        <b> NB </b> : Les champs (<span class="text-danger"> <b>*</b> </span>) sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">INFORMATIONS</p>
                        </div>
                        <form method="POST" action="{{ url('banques') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12" style="margin:auto">
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
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12" style="margin:auto">
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
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12" style="margin:auto">
                                    {!! Form::label('observation') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::textarea('observation', null, ['placeholder' => 'observation', 'rows' => 2, 'class' => 'form-control']) !!}
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
                                    {!! Form::text('montant', null, ['placeholder' => 'Le montant en F CFA', 'class' => 'form-control']) !!}
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
                                    {!! Form::text('ir', null, ['placeholder' => 'IR', 'class' => 'form-control']) !!}
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
                                    {!! Form::text('autres_montant', null, ['placeholder' => 'Autre montant', 'class' => 'form-control']) !!}
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
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12" style="margin:auto">
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
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12" style="margin:auto">
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
                            <div class="bg-gradient-secondary text-center mt-3">
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
