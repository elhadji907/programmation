@extends('layout.default')
@section('title', 'ONFP - Modification opérateurs')
@section('content')
    <div class="content">
        <div class="container col-12 col-md-12 col-lg-8 col-xl-12">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                <div class="row pt-0"></div>
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="card-title">Modification opérateurs</h3>
                    </div>
                    <div class="card-body">
                        <b> NB </b> : Les champs<span class="text-danger"> <b>*</b> </span>sont obligatoires
                        {!! Form::open(['url' => 'operateurs/' . $operateur->id, 'method' => 'PATCH', 'files' => true]) !!}
                        @csrf
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">IDENTIFICATION</p>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="operateur">{{ __('Opérateur') }}(<span class="text-danger">*</span>)</label>
                                <textarea id="operateur" rows="2"
                                    class="form-control @error('operateur') is-invalid @enderror" name="operateur"
                                    placeholder="Opérateur" autocomplete="operateur"
                                    autofocus>{{ $operateur->name ?? old('operateur') }}</textarea>
                                @error('operateur')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2 col-lg-2 col-xs-12 col-sm-12">
                                <label for="sigle">{{ __('Sigle') }}(<span class="text-danger">*</span>)</label>
                                <textarea id="sigle" rows="2" class="form-control @error('sigle') is-invalid @enderror"
                                    name="sigle" placeholder="Sigle"
                                    autocomplete="sigle">{{ $operateur->sigle ?? old('sigle') }}</textarea>
                                @error('sigle')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <label for="numero_agrement">{{ __('numero agrement') }}(<span
                                        class="text-danger">*</span>)</label>
                                <input id="numero_agrement" type="text"
                                    class="form-control @error('numero_agrement') is-invalid @enderror"
                                    name="numero_agrement" placeholder="numero agrement"
                                    value="{{ $operateur->numero_agrement ?? old('numero_agrement') }}"
                                    autocomplete="numero_agrement">
                                @error('numero_agrement')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <label for="email1">{{ __('E-mail') }}(<span class="text-danger">*</span>)</label>
                                <input id="email1" type="text" class="form-control @error('email1') is-invalid @enderror"
                                    name="email1" placeholder="adresse e-mail"
                                    value="{{ $operateur->email1 ?? old('email1') }}" autocomplete="email1">
                                @error('email1')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('type structure :', null, ['class' => 'control-label']) !!}(<span class="text-danger">*</span>)
                                {!! Form::select('type_structure', ['Publique' => 'Publique', 'Privé' => 'Privé'], $operateur->type_structure, ['placeholder' => 'sélectionner type structure', 'class' => 'form-control', 'id' => 'type_structure', 'data-width' => '100%']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('type_structure'))
                                        @foreach ($errors->get('type_structure') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('type operateur :', null, ['class' => 'control-label']) !!}(<span class="text-danger">*</span>)
                                {!! Form::select('type_operateur', $types_operateurs, $operateur->types_operateur->name, ['placeholder' => '', 'class' => 'form-control', 'id' => 'type_operateur', 'data-width' => '100%']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('type_operateur'))
                                        @foreach ($errors->get('type_operateur') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Département :', null, ['class' => 'control-label']) !!}(<span class="text-danger">*</span>)
                                {!! Form::select('departement', $departements, $operateur->departement->nom ?? "", ['placeholder' => 'sélectionner régions de résidence', 'class' => 'form-control', 'id' => 'departement', 'data-width' => '100%']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('departement'))
                                        @foreach ($errors->get('departement') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                <label for="adresse">{{ __('Adresse complète') }}(<span
                                        class="text-danger">*</span>)</label>
                                <textarea id="adresse" rows="2" class="form-control @error('adresse') is-invalid @enderror"
                                    name="adresse" placeholder="adresse de la structure" autocomplete="adresse"
                                    autofocus>{{ $operateur->adresse ?? old('adresse') }}</textarea>
                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                {!! Form::label('Régions d\'intervention :') !!}(<span class="text-danger">*</span>)
                                {!! Form::select('regions[]', $regions, null, ['multiple' => 'multiple', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'regions_op']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('region'))
                                        @foreach ($errors->get('region') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label('Fixe :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('fixe_op', $operateur->fixe, ['placeholder' => 'Numero fixe', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label('Téléphone :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('telephone1', $utilisateurs->telephone, ['placeholder' => 'Numero de telephone de la structure', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label('E-mail secondaire:') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('email2', $operateur->email2, ['placeholder' => 'adresse e-mail secondaire de la structure', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label('Téléphone secondaire:') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('telephone2', $operateur->telephone2, ['placeholder' => 'Numero de telephone secondaire de la structure', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <label for="bp">{{ __('Boite postale') }}</label>
                                <input id="bp" type="text" class="form-control @error('bp') is-invalid @enderror" name="bp"
                                    placeholder="Votre adresse postale"
                                    value="{{ $operateur->user->bp ?? old('bp') }}" autocomplete="bp"
                                    autofocus>
                                @error('bp')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <label for="fax">{{ __('Téléphone fax') }}</label>
                                <input id="fax" type="text" class="form-control @error('fax') is-invalid @enderror"
                                    name="fax" placeholder="Votre numero de fax"
                                    value="{{ $operateur->user->fax ?? old('fax') }}" autocomplete="fax"
                                    autofocus>
                                @error('fax')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label('Ninéa :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('ninea', $operateur->ninea, ['placeholder' => 'Le ninea de votre structure', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label('Régistre de commerce:') !!}
                                {!! Form::text('registre', $operateur->rccm, ['placeholder' => 'Le registre de commerce de votre établissement', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Numéro quitus fiscal:') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('quitus', $operateur->quitus, ['placeholder' => 'Le numéro du quitus fiscal de votre structure', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                <label for="debut_quitus">{{ __('Date délivrance') }}(<span
                                        class="text-danger">*</span>)</label>
                                <input id="debut_quitus" {{ $errors->has('debut_quitus') ? 'is-invalid' : '' }}
                                    type="date" class="form-control @error('debut_quitus') is-invalid @enderror"
                                    name="debut_quitus" placeholder="Votre date de naissance"
                                    value="{{ $operateur->debut_quitus->format('Y-m-d') ?? old('debut_quitus') }}"
                                    autocomplete="username" autofocus>
                                @error('debut_quitus')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                <label for="fin_quitus">{{ __('Date fin') }}(<span class="text-danger">*</span>)</label>
                                <input id="fin_quitus" {{ $errors->has('fin_quitus') ? 'is-invalid' : '' }} type="date"
                                    class="form-control @error('fin_quitus') is-invalid @enderror" name="fin_quitus"
                                    placeholder="Votre date de naissance"
                                    value="{{ $operateur->fin_quitus->format('Y-m-d') ?? old('fin_quitus') }}"
                                    autocomplete="username" autofocus>
                                @error('fin_quitus')
                                    <span class="invalid-feedback" role="alert">
                                        <div>{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2">RESPONSABLE</p>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2 col-lg-2 col-xs-12 col-sm-12">
                                {!! Form::label('sexe :', null, ['class' => 'control-label']) !!}(<span class="text-danger">*</span>)
                                {!! Form::select('sexe', ['M' => 'M', 'F' => 'F'], $operateur->user->sexe, ['placeholder' => 'sélectionner sexe', 'class' => 'form-control', 'id' => 'sexe', 'data-width' => '100%']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('sexe'))
                                        @foreach ($errors->get('sexe') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Prénom :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('prenom', $utilisateurs->firstname, ['placeholder' => 'Votre prénom', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                {!! Form::label('Nom :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('nom', $utilisateurs->name, ['placeholder' => 'Votre nom', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                {!! Form::label('CIN :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('cin', $operateur->cin_responsable, ['placeholder' => 'numéro de CIN', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('E-mail :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::email('email', $utilisateurs->email, ['placeholder' => 'Votre adresse e-mail', 'class' => 'form-control', 'id' => 'email']) !!}
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Téléphone :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('telephone', $utilisateurs->telephone, ['placeholder' => 'Numero de telephone', 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                {!! Form::label('Fonction :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('fonction_responsable', $operateur->fonction_responsable, ['placeholder' => 'Ex: Directeur', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <input type="hidden" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Mot de passe">
                        {!! Form::hidden('password', null, ['placeholder' => 'Votre mot de passe', 'class' => 'form-control']) !!}
                        {!! Form::submit('Modifier', ['class' => 'btn btn-outline-primary pull-right']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascripts')
    <script type="text/javascript">
        $('#regions_op').select2().val({!! json_encode($operateur->regions()->allRelatedIds()) !!}).trigger('change');
    </script>
@endsection
