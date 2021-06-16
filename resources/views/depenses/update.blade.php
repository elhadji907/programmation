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

                        <form method="POST" action="{{ action('DepensesController@update', $id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH" />
                            <div class="form-row">
                                <div class="form-group col col-md-8 col-lg-8 col-xs-12 col-sm-12">
                                    <label for="input-name"><b>{{ __("Projet") }}:</b></label>
                                    <select name="projet" id="projet" class="form-control" data-width="100%">
                                        <option value="{{ $projet->id }}">{{ $projet->name }}</option>
                                        <option value="">{{ __('-----sélectionner-----') }}</option>
                                        @foreach ($projets as $projet)
                                            <option value="{{ $projet->id }}">{{ $projet->name }}</option>
                                        @endforeach
                                    </select>
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('secteur'))
                                            @foreach ($errors->get('secteur') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="input-name"><b>{{ __("Sigle") }}:</b></label>
                                    <select disabled name="sigle" id="projet-sigle" class="form-control" data-width="100%">
                                        <option value="{{ $projet->id }}">{{ $projet->sigle }}</option>
                                        <option value="">{{ __('-----sélectionner-----') }}</option>
                                        @foreach ($projets as $projet)
                                            <option value="{{ $projet->id }}">{{ $projet->sigle }}</option>
                                        @endforeach
                                    </select>
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('secteur'))
                                            @foreach ($errors->get('secteur') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label for="input-name"><b>{{ __("Activié") }}:</b></label>
                                    <select name="activite" id="activite" class="form-control" data-width="100%">
                                        <option value="{{ $activite->id }}">{{ $activite->name }}</option>
                                        <option value="">{{ __('-----sélectionner-----') }}</option>
                                        @foreach ($activites as $activite)
                                            <option value="{{ $activite->id }}">{{ $activite->name }}</option>
                                        @endforeach
                                    </select>
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('secteur'))
                                            @foreach ($errors->get('secteur') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label for="input-name"><b>{{ __('Désignation') }}:</b></label>
                                    <input type="text" name="designation" class="form-control" id="input-designation"
                                        placeholder="Désignation" value="{{ old('designation') ?? $depenses->designation }}">
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
                                    <label for="input-name"><b>{{ __('Fournisseur') }}:</b></label>
                                    <input type="text" name="fournisseur" class="form-control" id="input-fournisseur"
                                        placeholder="Désignation" value="{{ old('fournisseur') ?? $depenses->fournisseurs }}">
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
                                <div class="form-group col col-md-8 col-lg-8 col-xs-12 col-sm-12">
                                    <label for="input-name"><b>{{ __('Montant') }}:</b></label>
                                    <input type="text" name="montant" class="form-control" id="input-montant"
                                        placeholder="Montant" value="{{ old('montant') ?? $depenses->montant }}">
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('montant'))
                                            @foreach ($errors->get('montant') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="input-name"><b>{{ __('IR') }}:</b></label>
                                    <input type="text" name="ir" class="form-control" id="input-ir"
                                        placeholder="IR" value="{{ old('ir') ?? $depenses->ir }}">
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('ir'))
                                            @foreach ($errors->get('ir') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i
                                    class="far fa-paper-plane"></i>&nbsp;Modifier</button>
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
