@extends('layout.default')
@section('title', 'ONFP - Enregistrement demanandeurs!')
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
                    <h3 class="card-title">Enregistrement</h3>
                    <p class="card-category">demandeurs</p>
                </div>
                <div class="card-body">
                    {!! Form::open(['url'=>'demandeurs','files' => true]) !!}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('civilite') !!}                    
                                {!! Form::select('civilite', $civilites, null, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'civilite']) !!}                    
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label("Niveau d'etude") !!}                    
                                {!! Form::select('niveau', $niveaux, null, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'niveau']) !!}                    
                            </div>
                        </div>
                        <div class="form-row">
                           
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
                                {!! Form::label('Lieu de naissance') !!}                    
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
                                {!! Form::label('adresse e-mail') !!}                    
                                {!! Form::email('email', null, ['placeholder'=>'Votre adresse e-mail', 'class'=>'form-control', 'id'=>'email']) !!}                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('cin') !!}                    
                                {!! Form::text('cin', null, ['placeholder'=>"Votre cin", 'class'=>'form-control', 'id'=>'cin']) !!}                    
                            </div>
                            <div class="invalid-feedback">
                                {{ $errors->first('cin') }}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Téléphone') !!}                    
                                {!! Form::text('telephone', null, ['placeholder'=>'Numero de telephone', 'class'=>'form-control']) !!}                    
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
                                {!! Form::label('Situation professionnelle') !!}                    
                                {!! Form::text('professionnelle', null, ['placeholder'=>"Votre situation professionnelle", 'class'=>'form-control']) !!}                    
                            </div>
                            <div class="invalid-feedback">
                                {{ $errors->first('professionnelle') }}
                            </div>
                           
                        </div>
                        <div class="form-row">
                           {{--  <div class="form-group col-md-6">
                                {!! Form::label("date d'entrée en fonction", null, ['class' => 'control-label']) !!}                    
                                {!! Form::date('date_debut', null, ['placeholder'=>"La date de recrutement", 'class'=>'form-control']) !!}                    
                            </div> --}}
                            <div class="form-group col-md-6">
                                {!! Form::label('Téléphone 1') !!}                    
                                {!! Form::text('telephone_1', null, ['placeholder'=>'Numero de telephone', 'class'=>'form-control']) !!}                    
                            </div> 
                            <div class="form-group col-md-6">
                                {!! Form::label('Téléphone 2') !!}                    
                                {!! Form::text('telephone_2', null, ['placeholder'=>'Numero de telephone secondaire', 'class'=>'form-control']) !!}                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Adresse') !!}                    
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
        </div>
    </div>
@endsection