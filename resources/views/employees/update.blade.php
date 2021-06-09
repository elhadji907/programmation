@extends('layout.default')
@section('title', 'ONFP - Modification employee')
@section('content')
    <div class="container">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif
            <div class="row pt-5"></div>
            <div class="card">
                <div class="card-header card-header-primary text-center">
                    <h3 class="card-title">Modification</h3>
                    <p class="card-category">employee</p>
                </div>
                <div class="card-body">
                    {!! Form::open(['url' => 'employees/' . $employee->id, 'method' => 'PATCH', 'files' => true]) !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('civilite') !!}
                            {!! Form::select('civilite', $civilites, $employee->user->civilite, ['placeholder' => '', 'class' => 'form-control', 'id' => 'civilite']) !!}
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
                            {!! Form::select('direction', $directions, $employee->direction->sigle ?? '', ['placeholder' => '', 'class' => 'form-control', 'id' => 'direction']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('direction'))
                                    @foreach ($errors->get('direction') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('categorie') !!}
                            {!! Form::select('categorie', $categories, $employee->category->name, ['placeholder' => '', 'class' => 'form-control', 'id' => 'categorie']) !!}
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
                            {!! Form::select('fonction', $fonctions, $employee->fonction->name, ['placeholder' => '', 'class' => 'form-control', 'id' => 'fonction']) !!}
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
                            {!! Form::text('firstname', $employee->user->firstname, ['placeholder' => 'Votre prenom', 'class' => 'form-control']) !!}
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
                            {!! Form::text('name', $employee->user->name, ['placeholder' => 'Votre nom', 'class' => 'form-control', 'id' => 'email']) !!}
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
                            {!! Form::date('date_naiss', Carbon\Carbon::parse($employee->user->date_naissance)->format('Y-m-d'), ['placeholder' => 'La date de naissance', 'class' => 'form-control']) !!}
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
                            {!! Form::text('lieu', $employee->user->lieu_naissance, ['placeholder' => 'Votre lieu de naissance', 'class' => 'form-control']) !!}
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
                            {!! Form::label('cin') !!}
                            {!! Form::text('cin', $employee->cin, ['placeholder' => 'Votre cin', 'class' => 'form-control']) !!}
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
                            {!! Form::text('matricule', $employee->matricule, ['placeholder' => 'Votre matricule', 'class' => 'form-control', 'id' => 'email']) !!}
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
                            {!! Form::label('Situation familiale') !!}
                            {!! Form::select('familiale', ['Marié(e)' => 'Marié(e)', 'Célibataire' => 'Célibataire'], $employee->user->situation_familiale,
                            ['placeholder' => 'Votre situation familiale', 'class' => 'form-control', 'id' =>
                            'familiale']) !!}
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
                            {!! Form::date('date_embauche', Carbon\Carbon::parse($employee->date_embauche)->format('Y-m-d'), ['placeholder' => 'La date de recrutement', 'class' => 'form-control']) !!}
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
                            {!! Form::text('adresse', $employee->user->adresse, ['placeholder' => 'Votre adresse', 'class' => 'form-control']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('adresse'))
                                    @foreach ($errors->get('adresse') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Autre adresse') !!}
                            {!! Form::text('autre_adresse', $employee->adresse, ['placeholder' => 'Autre adresse', 'class' => 'form-control']) !!}
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
                            {!! Form::text('telephone', $employee->user->telephone, ['placeholder' => 'Numero de telephone portable', 'class' => 'form-control']) !!}
                            <small id="emailHelp" class="form-text text-muted">
                                @if ($errors->has('telephone'))
                                    @foreach ($errors->get('telephone') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Telephone fixe') !!}
                            {!! Form::text('fixe', $employee->user->fixe, ['placeholder' => 'Numero de telephone fixe', 'class' => 'form-control']) !!}
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
                            {!! Form::text('fax', $employee->user->fax, ['placeholder' => 'Votre numero fax', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Boite postale') !!}
                            {!! Form::text('bp', $employee->user->bp, ['placeholder' => 'Votre Boite postale', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Image de profile') !!}<br />
                            {!! Form::file('image', null, ['class' => 'form-control-file rounded-circle w-100']) !!}
                            <img class="pt-1" src="{{ asset($employee->user->profile->getImage()) }}" width="50"
                                height="auto">
                        </div>
                    </div>
                    {!! Form::submit('Modifier', ['class' => 'btn btn-outline-primary pull-right']) !!}
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
@endsection
