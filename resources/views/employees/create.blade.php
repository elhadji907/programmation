@extends('layout.default')
@section('title', 'ONFP - Enregistrement Employes')
@section('content')
    <div class="container">
        <div class="container-fluid">
            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif
            <div class="row pt-5"></div>
            <div class="card">
                <div class="card-header card-header-primary text-center">
                    <h3 class="card-title">Enregistrement</h3>
                    <p class="card-category">Employes</p>
                </div>

                <div class="card-body">
                    {!! Form::open(['url' => 'employees', 'files' => true]) !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('civilite') !!}
                            {!! Form::select('civilite', $civilites, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'civilite']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('civilite'))
                                    @foreach ($errors->get('civilite') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('direction') !!}
                            {!! Form::select('direction', $directions, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'direction']) !!}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('categorie') !!}
                            {!! Form::select('categorie', $categories, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'categorie']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('categorie'))
                                    @foreach ($errors->get('categorie') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('fonction') !!}
                            {!! Form::select('fonction', $fonctions, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'fonction']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('fonction'))
                                    @foreach ($errors->get('fonction') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('prenom') !!}
                            {!! Form::text('firstname', null, ['placeholder' => 'Votre prenom', 'class' => 'form-control']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('firstname'))
                                    @foreach ($errors->get('firstname') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('nom') !!}
                            {!! Form::text('name', null, ['placeholder' => 'Votre nom', 'class' => 'form-control', 'id' => 'email']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Date de naissance', null, ['class' => 'control-label']) !!}
                            {!! Form::date('date_naiss', null, ['placeholder' => 'La date de naissance', 'class' => 'form-control']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('date_naiss'))
                                    @foreach ($errors->get('date_naiss') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Lieu') !!}
                            {!! Form::text('lieu', null, ['placeholder' => 'Votre lieu de naissance', 'class' => 'form-control']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('lieu'))
                                    @foreach ($errors->get('lieu') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('pseudo') !!}
                            {!! Form::text('username', null, ['placeholder' => 'Votre pseudo', 'class' => 'form-control']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('username'))
                                    @foreach ($errors->get('username') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="invalid-feedback">
                            {{ $errors->first('username') }}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('votre adresse e-mail') !!}
                            {!! Form::email('email', null, ['placeholder' => 'Votre adresse e-mail', 'class' => 'form-control', 'id' => 'email']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('cin') !!}
                            {!! Form::text('cin', null, ['placeholder' => 'Votre cin', 'class' => 'form-control']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('cin'))
                                    @foreach ($errors->get('cin') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="invalid-feedback">
                            {{ $errors->first('cin') }}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('matricule') !!}
                            {!! Form::text('matricule', null, ['placeholder' => 'Votre matricule', 'class' => 'form-control', 'id' => 'email']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('matricule'))
                                    @foreach ($errors->get('matricule') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Situation familiale :') !!}
                            {!! Form::select('familiale', ['Marié(e)' => 'Marié(e)', 'Célibataire' => 'Célibataire'], null, ['placeholder' => 'Votre situation familiale', 'class' => 'form-control', 'id' => 'familiale']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('familiale'))
                                    @foreach ($errors->get('familiale') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('date embauche', null, ['class' => 'control-label']) !!}
                            {!! Form::date('date_embauche', null, ['placeholder' => 'La date de recrutement', 'class' => 'form-control']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('date_embauche'))
                                    @foreach ($errors->get('date_embauche') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Adresse') !!}
                            {!! Form::text('adresse', null, ['placeholder' => 'Votre adresse', 'class' => 'form-control']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('adresse'))
                                    @foreach ($errors->get('adresse') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Autre Adresse') !!}
                            {!! Form::text('autre_adresse', null, ['placeholder' => 'Votre deuxième adresse', 'class' => 'form-control']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('autre_adresse'))
                                    @foreach ($errors->get('autre_adresse') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Telephone portable') !!}
                            {!! Form::text('telephone', null, ['placeholder' => 'Numero de telephone portable', 'class' => 'form-control']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('telephone'))
                                    @foreach ($errors->get('telephone') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Telephone Fixe') !!}
                            {!! Form::text('fixe', null, ['placeholder' => 'Numero de telephone fixe', 'class' => 'form-control']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('fixe'))
                                    @foreach ($errors->get('fixe') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Numero fax') !!}
                            {!! Form::text('fax', null, ['placeholder' => 'Votre numero fax', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Boite postale') !!}
                            {!! Form::text('bp', null, ['placeholder' => 'Votre Boite postale', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    {!! Form::submit('Enregistrer', ['class' => 'btn btn-outline-primary pull-right']) !!}
                    {!! Form::close() !!}
                    <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es saisies svp
                                    </h5>
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
    &nbsp;
    &nbsp;
@endsection
