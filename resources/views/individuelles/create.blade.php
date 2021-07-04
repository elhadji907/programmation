@extends('layout.default')
@section('title', 'ONFP - Enregistrement demandeur individuelle')
@section('content')
    <div class="content mb-5">
        <div class="container col-12 col-md-12 col-lg-8 col-xl-12">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                <div class="row pt-0"></div>
                <div class="card">
                    <div class="card-header bg-gradient-info text-center">
                        <h1 class="h4 text-white mb-0"><span data-feather="info"></span>Enregistrement demande
                            individuelle</h1>
                    </div>
                    <div class="card-body">
                        <b> NB </b> : Les champs(<span class="text-danger">*</span>)sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">IDENTIFICATION</p>
                        </div>
                        <form method="POST" action="{{ url('individuelles') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="cin"><b>{{ __('CIN') }}</b>(<span class="text-danger">*</span>)</label>
                                    <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror"
                                        name="cin" placeholder="Votre et cin" value="{{ old('cin') }}"
                                        autocomplete="cin" autofocus>
                                    @error('cin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="prenom"><b>{{ __('Prénom') }}</b>(<span
                                            class="text-danger">*</span>)</label>
                                    <input id="prenom" type="text"
                                        class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                        placeholder="Votre et prenom" value="{{ old('prenom') }}" autocomplete="prenom"
                                        autofocus>
                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="nom"><b>{{ __('Nom') }}</b>(<span class="text-danger">*</span>)</label>
                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                        name="nom" placeholder="Votre et nom" value="{{ old('nom') }}" autocomplete="nom"
                                        autofocus>
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="date_naiss"><b>{{ __('Date de naissance') }}</b>(<span
                                            class="text-danger">*</span>)</label>
                                    <input id="date_naiss" {{ $errors->has('date_r') ? 'is-invalid' : '' }} type="date"
                                        class="form-control @error('date_naiss') is-invalid @enderror" name="date_naiss"
                                        placeholder="Votre date de naissance" value="{{ old('date_naiss') }}"
                                        autocomplete="username" autofocus>
                                    @error('date_naiss')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="lieu_naissance"><b>{{ __('Lieu de naissance') }}</b>(<span
                                            class="text-danger">*</span>)</label>
                                    <input id="lieu_naissance" type="text"
                                        class="form-control @error('lieu_naissance') is-invalid @enderror"
                                        name="lieu_naissance" placeholder="Votre lieu de naissance"
                                        value="{{ old('lieu_naissance') }}" autocomplete="lieu_naissance">
                                    @error('lieu_naissance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="email"><b>{{ __('Addresse E-Mail') }}</b>(<span
                                            class="text-danger">*</span>)</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Votre adresse e-mail" value="{{ old('email') }}"
                                        autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="telephone"><b>{{ __('Telephone') }}</b>(<span
                                            class="text-danger">*</span>)</label>
                                    <input id="telephone" type="text"
                                        class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                        placeholder="Votre numero de telephone" value="{{ old('telephone') }}"
                                        autocomplete="telephone" autofocus>
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="fixe"><b>{{ __('Fixe') }}</b>(<span
                                            class="text-danger">*</span>)</label>
                                    <input id="fixe" type="text" class="form-control @error('fixe') is-invalid @enderror"
                                        name="fixe" placeholder="Votre numero de fixe" value="{{ old('fixe') }}"
                                        autocomplete="fixe" autofocus>
                                    @error('fixe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="autre_tel"><b>{{ __('Téléphone secondaire') }}</b></label>
                                    <input id="autre_tel" type="text"
                                        class="form-control @error('autre_tel') is-invalid @enderror" name="autre_tel"
                                        placeholder="téléphone secondaire" value="{{ old('autre_tel') }}"
                                        autocomplete="autre_tel" autofocus>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('sexe :', null, ['class' => 'control-label']) !!}(<span class="text-danger">*</span>)
                                    {!! Form::select('sexe', ['Masculin' => 'Masculin', 'Féminin' => 'Féminin'], null, ['placeholder' => 'sélectionner sexe', 'class' => 'form-control-lg', 'id' => 'sexe', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('sexe'))
                                            @foreach ($errors->get('sexe') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Situation familiale :') !!}(<span class="text-danger">*</span>)
                                    {!! Form::select('familiale', ['Marié(e)' => 'Marié(e)', 'Célibataire' => 'Célibataire'], null, ['placeholder' => 'Votre situation familiale', 'class' => 'form-control', 'id' => 'familiale', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('familiale'))
                                            @foreach ($errors->get('familiale') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Situation professionnelle :') !!}(<span class="text-danger">*</span>)
                                    {!! Form::select('professionnelle', 
                                    ['Demandeur d\'emploi actif' => 'Demandeur d\'emploi actif', 
                                    'Salarié CDD' => 'Salarié CDD',
                                    'Salarié CDI' => 'Salarié CDI',
                                    'Élève' => 'Élève',
                                    'Étudiant(e)' => 'Étudiant(e)',
                                    'Sans activité' => 'Sans activité',
                                    'En stage' => 'En stage',
                                    'Autre' => 'Autre'], 
                                    null, ['placeholder' => 'Votre situation professionnelle', 'class' => 'form-control', 'id' => 'professionnelle', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('professionnelle'))
                                            @foreach ($errors->get('professionnelle') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Département :') !!}(<span class="text-danger">*</span>)
                                    {!! Form::select('departement', $departements, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'departement', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('departement'))
                                            @foreach ($errors->get('departement') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-8 col-lg-8 col-xs-12 col-sm-12">
                                    {!! Form::label('Adresse complète :') !!}(<span class="text-danger">*</span>)
                                    {!! Form::textarea('adresse', null, ['placeholder' => 'Votre adresse', 'rows' => 1, 'class' => 'form-control']) !!}
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
                            </div>
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">DEMANDE</p>
                            </div>
                            {{--  <div class="form-row">  --}}
                                {{--  <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">  --}}
                                    {{--  {!! Form::label('N° courrier :') !!}(<span class="text-danger">*</span>)  --}}
                                    {!! Form::hidden('numero_courrier', null, ['placeholder' => 'Le numéro du courrier', 'class' => 'form-control']) !!}
                                   {{--   <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('numero_courrier'))
                                            @foreach ($errors->get('numero_courrier') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">  --}}
                                    {{--  {!! Form::label('Nbre pièces:') !!}(<span class="text-danger">*</span>)  --}}
                                    {!! Form::hidden('nombre_de_piece', 3, ['placeholder' => 'Le nombre de pièces fournis', 'class' => 'form-control', 'min' => '3', 'max' => '20']) !!}
                                  {{--    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('nombre_de_piece'))
                                            @foreach ($errors->get('nombre_de_piece') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">  --}}
                                    {{--  {!! Form::label('Dépot :', null, ['class' => 'control-label']) !!}(<span class="text-danger">*</span>)  --}}
                                    {!! Form::hidden('date_depot', $date_depot->format('Y-m-d'), ['placeholder' => 'La date de dépot', 'class' => 'form-control']) !!}
                                   {{--   <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('date_depot'))
                                            @foreach ($errors->get('date_depot') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>  --}}
                           {{--   </div>  --}}
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('module :') !!}(<span class="text-danger">*</span>)
                                    {!! Form::select('modules[]', $modules, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'module', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('modules'))
                                            @foreach ($errors->get('modules') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Niveau :') !!}(<span class="text-danger">*</span>)
                                    {!! Form::select('niveau_etude', 
                                    ['Aucun' => 'Aucun', 
                                    'Elémentaire' => 'Elémentaire', 
                                    'Moyen' => 'Moyen', 
                                    'Secondaire' => 'Secondaire', 
                                    'Supérieur' => 'Supérieur', 
                                    'Arabe' => 'Arabe'], null, 
                                    ['placeholder' => 'Niveau d\'étude', 'class' => 'form-control', 'id' => 'niveau_etude', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('niveau_etude'))
                                            @foreach ($errors->get('niveau_etude') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Diplômes :') !!}(<span class="text-danger">*</span>)
                                    {!! Form::select('diplome', $diplomes, null, ['placeholder' => 'diplome', 'class' => 'form-control', 'id' => 'diplome', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('diplome'))
                                            @foreach ($errors->get('diplome') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {!! Form::label('Pourquoi voulez-vous faire cette formation ? ') !!}(<span class="text-danger">*</span>)
                                    {!! Form::textarea('motivation', null, ['placeholder' => 'Décrire en quelques lignes votre motivation à faire cette formation', 'id' => 'motivation', 'rows' => 2, 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('motivation'))
                                            @foreach ($errors->get('motivation') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Qualifications :') !!}
                                    {!! Form::textarea('qualification', null, ['placeholder' => 'Qualifications et autres diplômes', 'rows' => 3, 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('experience :') !!}
                                    {!! Form::textarea('experience', null, ['placeholder' => 'Experience, stage, attestions, ...', 'rows' => 3, 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">INSCRIVEZ-VOUS A UN PROGRAMME</p>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    {!! Form::label('Programme :') !!}
                                    {!! Form::select('programme', $programmes, null, ['placeholder' => 'sélectionner un programme', 'class' => 'form-control', 'id' => 'programme', 'data-width' => '100%']) !!}
                                </div>
                            </div>
                            <input type="hidden" name="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Mot de passe">
                            {!! Form::hidden('password', null, ['placeholder' => 'Votre mot de passe', 'class' => 'form-control']) !!}
                            <button type="submit" class="btn btn-primary"><i
                                    class="far fa-paper-plane"></i>&nbsp;Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
