@extends('layout.default')
@section('title', 'ONFP - Enregistrement demandeurs')
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
                        <h3 class="card-title">Enregistrement demandeurs</h3>
                    </div>
                    <div class="card-body">
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">IDENTIFICATION</p>
                        </div>
                        <form method="POST" action="{{ url('demandeurs') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    {!! Form::label('CIN') !!}
                                    {!! Form::text('cin', null, ['placeholder' => 'Votre numéro national d\'identité',
                                    'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Prénom') !!}
                                    {!! Form::text('prenom', null, ['placeholder' => 'Votre prénom', 'class' =>
                                    'form-control']) !!}
                                </div>

                                <div class="form-group col-md-4">
                                    {!! Form::label('NOM') !!}
                                    {!! Form::text('nom', null, ['placeholder' => 'Votre nom', 'class' => 'form-control'])
                                    !!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    {!! Form::label('Civilité', null, ['class' => 'control-label']) !!}
                                    {!! Form::select('civilite', $civilites, null, ['placeholder' => '--sélectionnez--',
                                    'class' => 'form-control', 'id' => 'civilites']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Date naissance', null, ['class' => 'control-label']) !!}
                                    {!! Form::date('date_naiss', null, ['placeholder' => 'La date de naissance', 'class' =>
                                    'form-control']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Lieu naissance') !!}
                                    {!! Form::text('lieu', null, ['placeholder' => 'Votre lieu de naissance', 'class' =>
                                    'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    {!! Form::label('adresse e-mail') !!}
                                    {!! Form::email('email', null, ['placeholder' => 'Votre adresse e-mail', 'class' =>
                                    'form-control', 'id' => 'email']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Téléphone') !!}
                                    {!! Form::text('telephone', null, ['placeholder' => 'Numero de telephone', 'class' =>
                                    'form-control']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Région') !!}
                                    {!! Form::text('region', null, ['placeholder' => 'Votre région', 'class' =>
                                    'form-control', 'id' => 'region']) !!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    {!! Form::label('Situation familiale') !!}
                                    {!! Form::text('familiale', null, ['placeholder' => 'Votre situation familiale', 'class'
                                    => 'form-control']) !!}
                                </div>
                                <div class="invalid-feedback">
                                    {{ $errors->first('familiale') }}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Situation professionnelle') !!}
                                    {!! Form::text('professionnelle', null, [
                                    'placeholder' => 'Votre situation professionnelle',
                                    'class' => 'form-control',
                                    ]) !!}
                                </div>
                                <div class="invalid-feedback">
                                    {{ $errors->first('professionnelle') }}
                                </div>

                                <div class="form-group col-md-4">
                                    {!! Form::label('Adresse') !!}
                                    {!! Form::textarea('adresse', null, ['placeholder' => 'Votre adresse', 'rows' => 1,
                                    'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">Remplir la demande</p>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    {!! Form::label('Numéro courrier') !!}
                                    {!! Form::text('numero_courrier', null, ['placeholder' => 'Le numéro du courrier',
                                    'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Date dépot', null, ['class' => 'control-label']) !!}
                                    {!! Form::date('date_depot', null, ['placeholder' => 'La date de dépot', 'class' =>
                                    'form-control']) !!}
                                </div>
                                
                            <div class="form-group col-md-4">
                                {!! Form::label("localité") !!}
                                {!! Form::select('localite', $localites, null, ['placeholder' => '', 'class' =>
                                'form-control', 'id' => 'localite']) !!}
                            </div>
                        </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    {!! Form::label("Objet") !!}
                                    {!! Form::select('objet', $objets, null, ['placeholder' => '', 'class' =>
                                    'form-control', 'id' => 'objet']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label("Type demande") !!}
                                    {!! Form::select('type_demande', $types_demandes, null, ['placeholder' => '--sélectionnez--', 'class' =>
                                    'form-control', 'id' => 'type_demande']) !!}
                                </div>
                                                               
                                <input type="hidden" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Mot de passe">
                                {!! Form::hidden('password', null, ['placeholder' => 'Votre mot de passe', 'class' =>
                                'form-control']) !!}
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    {!! Form::label("Programme") !!}
                                    {!! Form::select('programme', $programmes, null, ['placeholder' => 'sélectionner un programme', 'class' =>
                                    'form-control', 'id' => 'programme']) !!}
                                </div>
                            
                            <div class="form-group col-md-4">
                                {!! Form::label("Niveau d'etude") !!}
                                {!! Form::select('niveau', $niveaux, null, ['placeholder' => '', 'class' =>
                                'form-control', 'id' => 'niveau']) !!}
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label("module") !!}
                                {!! Form::select('modules[]', $modules, null, ['multiple'=>'multiple', 'class' =>
                                'form-control', 'id' => 'module']) !!}
                            </div>
                        </div>
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
