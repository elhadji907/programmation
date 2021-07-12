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
                        NB : Les champs(<span class="text-danger">*</span>)sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">IDENTIFICATION</p>
                        </div>
                        <form method="POST" action="{{ url('individuelles') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="cin">{{ __('CIN') }}(<span class="text-danger">*</span>)</label>
                                    <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror"
                                        name="cin" placeholder="Votre et cin" value="{{ old('cin') }}" autocomplete="cin"
                                        autofocus>
                                    @error('cin')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="prenom">{{ __('Prénom') }}(<span class="text-danger">*</span>)</label>
                                    <input id="prenom" type="text"
                                        class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                        placeholder="Votre et prenom" value="{{ old('prenom') }}" autocomplete="prenom"
                                        autofocus>
                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="nom">{{ __('Nom') }}(<span class="text-danger">*</span>)</label>
                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                        name="nom" placeholder="Votre et nom" value="{{ old('nom') }}" autocomplete="nom"
                                        autofocus>
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="date_naiss">{{ __('Date de naissance') }}(<span
                                            class="text-danger">*</span>)</label>
                                    <input id="date_naiss" {{ $errors->has('date_r') ? 'is-invalid' : '' }} type="date"
                                        class="form-control @error('date_naiss') is-invalid @enderror" name="date_naiss"
                                        placeholder="Votre date de naissance" value="{{ old('date_naiss') }}"
                                        autocomplete="username" autofocus>
                                    @error('date_naiss')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="lieu_naissance">{{ __('Lieu de naissance') }}(<span
                                            class="text-danger">*</span>)</label>
                                    <input id="lieu_naissance" type="text"
                                        class="form-control @error('lieu_naissance') is-invalid @enderror"
                                        name="lieu_naissance" placeholder="Votre lieu de naissance"
                                        value="{{ old('lieu_naissance') }}" autocomplete="lieu_naissance">
                                    @error('lieu_naissance')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="email">{{ __('Addresse E-Mail') }}(<span
                                            class="text-danger">*</span>)</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Votre adresse e-mail" value="{{ old('email') }}"
                                        autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="telephone">{{ __('Telephone') }}(<span
                                            class="text-danger">*</span>)</label>
                                    <input id="telephone" type="text"
                                        class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                        placeholder="7x xxx xx xx" value="{{ old('telephone') }}"
                                        autocomplete="telephone" autofocus>
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="fixe">{{ __('Fixe') }}(<span class="text-danger">*</span>)</label>
                                    <input id="fixe" type="text" class="form-control @error('fixe') is-invalid @enderror"
                                        name="fixe" placeholder="3x xxx xx xx" value="{{ old('fixe') }}"
                                        autocomplete="fixe" autofocus>
                                    @error('fixe')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="autre_tel">{{ __('Téléphone secondaire') }}</label>
                                    <input id="autre_tel" type="text"
                                        class="form-control @error('autre_tel') is-invalid @enderror" name="autre_tel"
                                        placeholder="7x xxx xx xx" value="{{ old('autre_tel') }}"
                                        autocomplete="autre_tel" autofocus>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('sexe :', null, ['class' => 'control-label']) !!}(<span class="text-danger">*</span>)
                                    {!! Form::select('sexe', ['M' => 'M', 'F' => 'F'], null, ['placeholder' => 'sélectionner sexe', 'class' => 'form-control-lg', 'id' => 'sexe', 'data-width' => '100%']) !!}
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
                                    {!! Form::select('professionnelle', ['Demandeur d\'emploi actif' => 'Demandeur d\'emploi actif', 'Salarié CDD' => 'Salarié CDD', 'Salarié CDI' => 'Salarié CDI', 'Élève' => 'Élève', 'Étudiant(e)' => 'Étudiant(e)', 'Sans activité' => 'Sans activité', 'En stage' => 'En stage', 'Autre' => 'Autre'], null, ['placeholder' => 'Votre situation professionnelle', 'class' => 'form-control', 'id' => 'professionnelle', 'data-width' => '100%']) !!}
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
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="bp">{{ __('Boite postale') }}</label>
                                    <input id="bp" type="text" class="form-control @error('bp') is-invalid @enderror"
                                        name="bp" placeholder="Votre adresse postale" value="{{ old('bp') }}"
                                        autocomplete="bp" autofocus>
                                    @error('bp')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="fax">{{ __('Téléphone fax') }}</label>
                                    <input id="fax" type="text" class="form-control @error('fax') is-invalid @enderror"
                                        name="fax" placeholder="Votre numero de fax" value="{{ old('fax') }}"
                                        autocomplete="fax" autofocus>
                                    @error('fax')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label for="adresse">{{ __('Adresse de résidence') }}(<span
                                            class="text-danger">*</span>)</label>
                                    <textarea class="form-control  @error('adresse') is-invalid @enderror" name="adresse"
                                        id="adresse" rows="1"
                                        placeholder="Votre adresse complète">{{ old('adresse') }}</textarea>
                                    @error('adresse')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">DEMANDE</p>
                            </div>
                            {{-- <div class="form-row"> --}}
                            {{-- <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12"> --}}
                            {{-- {!! Form::label('N° courrier :') !!}(<span class="text-danger">*</span>) --}}
                            {!! Form::hidden('numero_courrier', null, ['placeholder' => 'Le numéro du courrier', 'class' => 'form-control']) !!}
                            {{-- <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('numero_courrier'))
                                            @foreach ($errors->get('numero_courrier') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12"> --}}
                            {{-- {!! Form::label('Nbre pièces:') !!}(<span class="text-danger">*</span>) --}}
                            {!! Form::hidden('nombre_de_piece', 3, ['placeholder' => 'Le nombre de pièces fournis', 'class' => 'form-control', 'min' => '3', 'max' => '20']) !!}
                            {{-- <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('nombre_de_piece'))
                                            @foreach ($errors->get('nombre_de_piece') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12"> --}}
                            {{-- {!! Form::label('Dépot :', null, ['class' => 'control-label']) !!}(<span class="text-danger">*</span>) --}}
                            {!! Form::hidden('date_depot', $date_depot->format('Y-m-d'), ['placeholder' => 'La date de dépot', 'class' => 'form-control']) !!}
                            {{-- <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('date_depot'))
                                            @foreach ($errors->get('date_depot') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div> --}}
                            {{-- </div> --}}
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Niveau :') !!}(<span class="text-danger">*</span>)
                                    {!! Form::select('niveau_etude', ['Aucun' => 'Aucun', 'Elémentaire' => 'Elémentaire', 'Moyen' => 'Moyen', 'Secondaire' => 'Secondaire', 'Supérieur' => 'Supérieur', 'Arabe' => 'Arabe'], null, ['placeholder' => 'Niveau d\'étude', 'class' => 'form-control', 'id' => 'niveau_etude', 'data-width' => '100%']) !!}
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
                                </div><div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="Option">{{ __('Option du diplôme') }}(<span
                                            class="text-danger">*</span>)</label>
                                    <input id="option" type="option" class="form-control @error('option') is-invalid @enderror"
                                        name="option" placeholder="Ex: Gestion finance" value="{{ old('option') }}"
                                        autocomplete="option">
                                    @error('option')
                                        <span class="invalid-feedback" role="alert">
                                            <div>{{ $message }}</div>
                                        </span>
                                    @enderror
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    {!! Form::label('module :') !!}(<span class="text-danger">*</span>)
                                    {!! Form::select('modules[]', $modules, null, ['multiple' => 'multiple', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'module']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('modules'))
                                            @foreach ($errors->get('modules') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <label for="autres_diplomes">{{ __('Autres diplomes') }}</label>
                                    <textarea class="form-control  @error('autres_diplomes') is-invalid @enderror"
                                        name="autres_diplomes" id="autres_diplomes" rows="1"
                                        placeholder="Si vous possédez d'autres diplômes">{{ old('autres_diplomes') }}</textarea>
                                    @error('autres_diplomes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <label for="etablissement">{{ __('Etablissement d\'obtention') }}(<span
                                            class="text-danger">*</span>)</label>
                                    <textarea class="form-control  @error('etablissement') is-invalid @enderror"
                                        name="etablissement" id="etablissement" rows="1"
                                        placeholder="Votre etablissement complète">{{ old('etablissement') }}</textarea>
                                    @error('etablissement')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <label
                                        for="motivation">{{ __('Pourquoi voulez-vous faire cette formation ?') }}(<span
                                            class="text-danger">*</span>)</label>
                                    <textarea class="form-control  @error('motivation') is-invalid @enderror"
                                        name="motivation" id="motivation" rows="1"
                                        placeholder="Décrire en quelques lignes votre motivation à faire cette formation">{{ old('motivation') }}</textarea>
                                    @error('motivation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    <label for="prerequis">{{ __('Avez-vous des prerequis ?') }}(<span
                                            class="text-danger">*</span>)</label>
                                    <textarea class="form-control  @error('prerequis') is-invalid @enderror"
                                        name="prerequis" id="prerequis" rows="1"
                                        placeholder="Prérequis par rapport à la formation demandée">{{ old('prerequis') }}</textarea>
                                    @error('prerequis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Qualifications :') !!}
                                    {!! Form::textarea('qualification', null, ['placeholder' => 'Qualifications et autres diplômes', 'rows' => 1, 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('experience :') !!}
                                    {!! Form::textarea('experience', null, ['placeholder' => 'Experience, stage, attestions, ...', 'rows' => 1, 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    {!! Form::label('Informations :') !!}
                                    {!! Form::textarea('information', null, ['placeholder' => 'Informations complémenaires', 'rows' => 1, 'class' => 'form-control']) !!}
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
