@extends('layout.default')
@section('title', 'ONFP - détails demandeurs')
@section('content')
    <div class="content">
        <div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                <div class="row pt-0"></div>
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="card-title">Détails demandeurs</h3>
                    </div>
                    <div class="card-body">
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">IDENTIFICATION</p>
                        </div>
                        {!! Form::open(['url' => '', 'method' => 'PATCH', 'files' => true]) !!}
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label('CIN') !!}
                                {!! Form::text('cin', $demandeurs->cin, ['placeholder' => 'Votre numéro national d\'identité', 'class'
                                => 'form-control','disabled' => 'disabled']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('Prénom') !!}
                                {!! Form::text('prenom', $utilisateurs->firstname, ['placeholder' => 'Votre prénom', 'class' => 'form-control','disabled' => 'disabled'])
                                !!}
                            </div>

                            <div class="form-group col-md-4">
                                {!! Form::label('NOM') !!}
                                {!! Form::text('nom', $utilisateurs->name, ['placeholder' => 'Votre nom', 'class' => 'form-control','disabled' => 'disabled']) !!}
                            </div>

                           {{--   <div class="form-group col-md-4">
                                {!! Form::label('NOM') !!}  --}}
                                {!! Form::hidden('username', $utilisateurs->username, ['placeholder' => 'Votre nom', 'class' => 'form-control','disabled' => 'disabled']) !!}
                           {{--   </div>  --}}
                           {{--   <div class="form-group col-md-4">
                                {!! Form::label('NOM') !!}  --}}
                                {!! Form::hidden('matricule', $utilisateurs->matricule, ['placeholder' => 'Votre nom', 'class' => 'form-control','disabled' => 'disabled']) !!}
                           {{--   </div>  --}}

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label('Civilité', null, ['class' => 'control-label']) !!}
                                {!! Form::select('civilite', $civilites, $utilisateurs->civilite, ['placeholder' => 'sélectionnez', 'class'
                                => 'form-control','disabled' => 'disabled', 'id' => 'civilites']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('Date naissance', null, ['class' => 'control-label']) !!}
                                {!! Form::date('date_naiss', $utilisateurs->date_naissance->format('Y-m-d'), ['placeholder' => 'La date de naissance', 'class' =>
                                'form-control','disabled' => 'disabled']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('Lieu naissance') !!}
                                {!! Form::text('lieu', $utilisateurs->lieu_naissance, ['placeholder' => 'Votre lieu de naissance', 'class' =>
                                'form-control','disabled' => 'disabled']) !!}
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label('E-mail') !!}
                                {!! Form::email('email', $utilisateurs->email, ['placeholder' => 'Votre adresse e-mail', 'class' =>
                                'form-control','disabled' => 'disabled', 'id' => 'email']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('Téléphone') !!}
                                {!! Form::text('telephone', $utilisateurs->telephone, ['placeholder' => 'Numero de telephone', 'class' =>
                                'form-control','disabled' => 'disabled']) !!}
                            </div>

                            
                            <div class="form-group col-md-4">
                                {!! Form::label('Département') !!}
                                {!! Form::select('departements[]', $departements, $utilisateurs->demandeur->departements, ['class' =>
                                'form-control','disabled' => 'disabled', 'id' => 'departement']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label('Situation familiale') !!}
                                {!! Form::select('familiale', ['Marié' => 'Marié', 'Célibataire' => 'Célibataire'], $utilisateurs->situation_familiale,
                                ['placeholder' => 'Votre situation familiale', 'class' => 'form-control','disabled' => 'disabled', 'id' =>
                                'familiale']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('Situation professionnelle') !!}
                                {!! Form::select('professionnelle', ['Employé' => 'Employé', 'Recherche emploi' =>
                                'Recherche emploi'], $utilisateurs->situation_professionnelle, ['placeholder' => 'Votre situation professionnelle', 'class' =>
                                'form-control','disabled' => 'disabled', 'id' => 'professionnelle']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('Adresse') !!}
                                {!! Form::textarea('adresse', $utilisateurs->adresse, ['placeholder' => 'Votre adresse', 'rows' => 1, 'class'
                                => 'form-control','disabled' => 'disabled']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Enregistrée par:') !!}
                                {!! Form::text('cin', $utilisateurs->created_by.'  le  '.$utilisateurs->created_at->format('d/m/Y H:m:s').' à '.$utilisateurs->created_at->format('H:m:s'), ['placeholder' => '', 'class'
                                => 'form-control','disabled' => 'disabled']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Modifiée par :') !!}
                                {!! Form::text('prenom', $utilisateurs->updated_by.' le '.$utilisateurs->created_at->format('d/m/Y H:m:s').' à '.$utilisateurs->created_at->format('H:m:s'), ['placeholder' => '', 'class' => 'form-control','disabled' => 'disabled'])
                                !!}
                            </div>
                        </div>
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2">DEMANDE</p>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label('Numéro courrier') !!}
                                {!! Form::text('numero_courrier', $demandeurs->numero_courrier, ['placeholder' => 'Le numéro du courrier', 'class'
                                => 'form-control','disabled' => 'disabled']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('Date dépot', null, ['class' => 'control-label']) !!}
                                {!! Form::date('date_depot', $demandeurs->date_depot->format('Y-m-d'), ['placeholder' => 'La date de dépot', 'class' =>
                                'form-control','disabled' => 'disabled']) !!}
                            </div>

                            <div class="form-group col-md-4">
                                {!! Form::label('localité') !!}
                                {!! Form::select('localite', $localites, $demandeurs->localite->name, ['placeholder' => '', 'class' =>
                                'form-control','disabled' => 'disabled', 'id' => 'localite']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label('Objet') !!}
                                {!! Form::select('objet', $objets, $demandeurs->objet->name, ['placeholder' => '', 'class' => 'form-control','disabled' => 'disabled',
                                'id' => 'objet']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('Type demande') !!}
                                {!! Form::select('type_demande', $types_demandes, $demandeurs->typedemande->name, ['placeholder' =>
                                '--sélectionnez--', 'class' => 'form-control','disabled' => 'disabled', 'id' => 'type_demande']) !!}
                            </div>

                            <div class="form-group col-md-4">
                                {!! Form::label('Programme') !!}
                                {!! Form::select('programme', $programmes, $demandeurs->programme->sigle, ['class' => 'form-control','disabled' => 'disabled', 'id' => 'programme']) !!}
                            </div>
                            <input type="hidden" name="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Mot de passe">
                            {!! Form::hidden('password', null, ['placeholder' => 'Votre mot de passe', 'class' =>
                            'form-control','disabled' => 'disabled']) !!}
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-4">
                                {!! Form::label("Niveau d'etude") !!}
                                {!! Form::select('niveaux[]', $niveaux, $demandeurs->nivauxes, ['placeholder' => '', 'class' =>
                                'form-control','disabled' => 'disabled', 'id' => 'niveau']) !!}
                            </div>

                            <div class="form-group col-md-4">
                                {!! Form::label('Diplômes') !!}
                                {!! Form::select('diplomes[]', $diplomes, $demandeurs->diplomes, ['placeholder' => 'diplome', 'class' =>
                                'form-control','disabled' => 'disabled', 'id' => 'diplome']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('module') !!}
                                {!! Form::select('modules[]', $modules, $demandeurs->modules, ['placeholder' => '','class' =>
                                'form-control','disabled' => 'disabled', 'id' => 'module']) !!}
                            </div>
                        </div>                        
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                {!! Form::label('Projet') !!}
                                {!! Form::textarea('projet', $demandeurs->projet, ['placeholder' => 'Décrire en quelques lignes votre projet professionnel...', 'rows' => 4,
                                'class' => 'form-control','disabled' => 'disabled']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Expérience') !!}
                                {!! Form::textarea('experience', $demandeurs->experience, ['placeholder' => 'Votre expérience', 'rows' => 3,
                                'class' => 'form-control','disabled' => 'disabled']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Information') !!}
                                {!! Form::textarea('information', $demandeurs->information, ['placeholder' => 'Informations complémentaires', 'rows' => 3,
                                'class' => 'form-control','disabled' => 'disabled']) !!}
                            </div>
                        </div>
                        {{--  {!! Form::submit('Modifier', ['class' => 'btn btn-outline-primary pull-right']) !!}  --}}
                        {!! Form::close() !!}
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
