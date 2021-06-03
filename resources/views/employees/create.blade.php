@extends('layout.default') 
@section('title', 'ONFP - Enregistrement personnel')
@section('content')
<div class="container">
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif                    
            <div class="row pt-5"></div>
            <div class="card">
                <div class="card-header card-header-primary text-center">
                    <h3 class="card-title">Enregistrement</h3>
                    <p class="card-category">Personnels</p>
                </div>

                <div class="card-body">
                {!! Form::open(['url'=>'personnels','files' => true]) !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('civilite') !!}                    
                            {!! Form::select('civilite', $civilites, null, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'civilite']) !!}                    
                        </div> 
                        <div class="form-group col-md-6">
                            {!! Form::label('direction') !!}                    
                            {!! Form::select('direction', $directions, null, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'direction']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('categorie') !!}                    
                            {!! Form::select('categorie', $categories, null, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'categorie']) !!}                    
                        </div> 
                        <div class="form-group col-md-6">
                            {!! Form::label('fonction') !!}                    
                            {!! Form::select('fonction', $fonctions, null, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'fonction']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('prenom') !!}                    
                            {!! Form::text('firstname', null, ['placeholder'=>"Votre prenom", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="invalid-feedback">
                            {{ $errors->first('prenom') }}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('nom') !!}                    
                            {!! Form::text('name', null, ['placeholder'=>'Votre nom', 'class'=>'form-control', 'id'=>'email']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Date de naissance', null, ['class' => 'control-label']) !!}                    
                            {!! Form::date('date_naiss', null, ['placeholder'=>"La date de naissance", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Lieu') !!}                    
                            {!! Form::text('lieu', null, ['placeholder'=>'Votre lieu de naissance', 'class'=>'form-control']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('pseudo') !!}                    
                            {!! Form::text('username', null, ['placeholder'=>"Votre pseudo", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="invalid-feedback">
                            {{ $errors->first('username') }}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('votre adresse e-mail') !!}                    
                            {!! Form::email('email', null, ['placeholder'=>'Votre adresse e-mail', 'class'=>'form-control', 'id'=>'email']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('cin') !!}                    
                            {!! Form::text('cin', null, ['placeholder'=>"Votre cin", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="invalid-feedback">
                            {{ $errors->first('cin') }}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('matricule') !!}                    
                            {!! Form::text('matricule', null, ['placeholder'=>'Votre matricule', 'class'=>'form-control', 'id'=>'email']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Situation familiale') !!}                    
                            {!! Form::text('familiale', null, ['placeholder'=>"Votre situation familiale", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="invalid-feedback">
                            {{ $errors->first('familiale') }}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label("Le nombre d'enfant") !!}                    
                            {!! Form::number('enfant', null, ['min'=>'0','placeholder'=>"Le nombre d'enfant obtenu(s)", 'class'=>'form-control', 'id'=>'email']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label("date d'entrée en fonction", null, ['class' => 'control-label']) !!}                    
                            {!! Form::date('date_debut', null, ['placeholder'=>"La date de recrutement", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Telephone') !!}                    
                            {!! Form::text('telephone', null, ['placeholder'=>'Numero de telephone', 'class'=>'form-control']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Numero fax') !!}                    
                            {!! Form::text('fax', null, ['placeholder'=>"Votre numero fax", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Boite postale') !!}                    
                            {!! Form::text('bp', null, ['placeholder'=>'Votre Boite postale', 'class'=>'form-control']) !!}                    
                        </div> 
                    </div>
                    {!! Form::submit('Enregistrer', ['class'=>'btn btn-outline-primary pull-right', ]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

