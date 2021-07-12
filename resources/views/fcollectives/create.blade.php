@extends('layout.default')
@section('title', 'ONFP - Enregistrement demandeurs')
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
                        <h3 class="card-title">Enregistrement demandeurs</h3>
                    </div>
                    <div class="card-body">
                       <b> NB </b> : Les champs<span class="text-danger"> <b>*</b> </span>sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">IDENTIFICATION</p>
                        </div>
                        <form method="POST" action="{{ url('demandeurs') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    {!! Form::label('Prénom :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('prenom', null, ['placeholder' => 'Votre prénom', 'class' =>
                                    'form-control']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Nom :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('nom', null, ['placeholder' => 'Votre nom', 'class' => 'form-control'])
                                    !!}
                                </div>                                
                                <div class="form-group col-md-4">
                                    {!! Form::label('Date naissance :', null, ['class' => 'control-label']) !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::date('date_naiss', null, ['placeholder' => 'La date de naissance', 'class' =>
                                    'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-row">                                
                                <div class="form-group col-md-4">
                                    {!! Form::label('Lieu naissance :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('lieu', null, ['placeholder' => 'Votre lieu de naissance', 'class' =>
                                    'form-control']) !!}
                                </div>                                
                                <div class="form-group col-md-4">
                                    {!! Form::label('Cin :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('cin', null, ['placeholder' => 'Votre numéro national d\'identité',
                                    'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Civilité :', null, ['class' => 'control-label']) !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('civilite', $civilites, null, ['placeholder' => '--sélectionnez--',
                                    'class' => 'form-control', 'id' => 'civilite']) !!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    {!! Form::label('e-mail :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::email('email', null, ['placeholder' => 'Votre adresse e-mail', 'class' =>
                                    'form-control', 'id' => 'email']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Téléphone :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('telephone', null, ['placeholder' => 'Numero de telephone', 'class' =>
                                    'form-control']) !!}
                                </div>

                                <div class="form-group col-md-4">
                                    {!! Form::label("Département :") !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('departements[]', $departements, null, ['placeholder' => '', 'class' =>
                                    'form-control', 'id' => 'departement']) !!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    {!! Form::label('Situation familiale :') !!}
                                    {!! Form::select('familiale', ['Marié' => 'Marié', 
                                                             'Célibataire' => 'Célibataire'],
                                     null, ['placeholder' => 'Votre situation familiale', 'class'  
                                    => 'form-control', 'id' => 'familiale']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Situation professionnelle :') !!}
                                    {!! Form::select('professionnelle', ['Employé' => 'Employé',
                                                                        'Recherche emploi' => 'Recherche emploi'],
                                                                         null, ['placeholder' => 'Votre situation professionnelle', 'class'  
                                    => 'form-control', 'id' => 'professionnelle']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Adresse :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::textarea('adresse', null, ['placeholder' => 'Votre adresse', 'rows' => 1,
                                    'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">DEMANDE</p>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('Numéro courrier :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('numero_courrier', null, ['placeholder' => 'Le numéro du courrier',
                                    'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('Date dépot :', null, ['class' => 'control-label']) !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::date('date_depot', null, ['placeholder' => 'La date de dépot', 'class' =>
                                    'form-control']) !!}
                                </div>                                
                        </div>
                            <div class="form-row">
                               {{--   <div class="form-group col-md-6">
                                    {!! Form::label("Type demande :") !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('type_demande', $types_demandes, null, ['placeholder' => '--sélectionnez--', 'class' =>
                                    'form-control', 'id' => 'type_demande']) !!}
                                </div>  --}}
                                <div class="form-group col-md-6">
                                    {!! Form::label("module :") !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('modules', $modules, null, ['placeholder' => '', 'class' =>
                                    'form-control', 'id' => 'module']) !!}
                                </div>                            

                            </div>
                            <div class="form-row">
                               {{--   <div class="form-group col-md-6">
                                    {!! Form::label("Niveau d'etude :") !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('niveaux', $niveaux, null, ['placeholder' => '', 'class' =>
                                    'form-control', 'id' => 'niveau']) !!}
                                </div>  --}}
    
                                <div class="form-group col-md-6">
                                    {!! Form::label("Diplômes :") !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('diplomes[]', $diplomes, null, ['placeholder' => 'diplome', 'class' =>
                                    'form-control', 'id' => 'diplome']) !!}
                                </div>

                            </div>
                       {{--   <div class="form-row">
                            <div class="form-group col-md-12">
                                {!! Form::label('Projet :') !!}
                                {!! Form::textarea('projet', null, ['placeholder' => 'Décrire en quelques lignes votre projet professionnel...', 'rows' => 4,
                                'class' => 'form-control']) !!}
                            </div>
                        </div>  --}}
                        {{--  <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Expérience :') !!}
                                {!! Form::textarea('experience', null, ['placeholder' => 'Votre expérience', 'rows' => 3,
                                'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Information :') !!}
                                {!! Form::textarea('information', null, ['placeholder' => 'Informations complémentaires', 'rows' => 3,
                                'class' => 'form-control']) !!}
                            </div>
                        </div>  --}}
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2">INSCRIVEZ-VOUS A UN PROGRAMME</p>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                {!! Form::label("Programme :") !!}
                                {!! Form::select('programme', $programmes, null, ['placeholder' => 'sélectionner un programme', 'class' =>
                                'form-control', 'id' => 'programme']) !!}
                            </div>

                            
                           {{--   <div class="form-group col-md-6">
                                {!! Form::label("localité :") !!}
                                {!! Form::select('localite', $localites, null, ['placeholder' => '', 'class' =>
                                'form-control', 'id' => 'localite']) !!}
                            </div>  --}}

                        </div>                        
                        <input type="hidden" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Mot de passe">
                    {!! Form::hidden('password', null, ['placeholder' => 'Votre mot de passe', 'class' =>
                    'form-control']) !!}
                            <button type="submit" class="btn btn-primary"><i
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
