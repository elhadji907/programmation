@extends('layout.default') 
@section('title', 'ONFP - Modification personnel')
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
                    <h3 class="card-title">Modification</h3>
                    <p class="card-category">personnel</p>
                </div>

              
                <div class="card-body">

                    {!! Form::open(['url'=>'personnels/'.$personnel->id, 'method'=>"PATCH", 'files' => true]) !!}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('civilite') !!}                    
                                {!! Form::select('civilite', $civilites, $personnel->user->civilite, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'civilite']) !!}                    
                            </div> 
                            <div class="form-group col-md-6">
                                {!! Form::label('direction') !!}                    
                                {!! Form::select('direction', $directions, $personnel->direction->name, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'direction']) !!}                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('categorie') !!}                    
                                {!! Form::select('categorie', $categories, $personnel->categorie->name, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'categorie']) !!}                    
                            </div> 
                            <div class="form-group col-md-6">
                                {!! Form::label('fonction') !!}                    
                                {!! Form::select('fonction', $fonctions, $personnel->fonction->name, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'fonction']) !!}                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('prenom') !!}                    
                                {!! Form::text('firstname', $personnel->user->firstname, ['placeholder'=>"Votre prenom", 'class'=>'form-control']) !!}                    
                            </div>
                            <div class="invalid-feedback">
                                {{ $errors->first('prenom') }}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('nom') !!}                    
                                {!! Form::text('name', $personnel->user->name, ['placeholder'=>'Votre nom', 'class'=>'form-control', 'id'=>'email']) !!}                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Date de naissance', null, ['class' => 'control-label']) !!}                    
                                {!! Form::date('date_naiss', $personnel->user->date_naissance->format('Y-m-d'), ['placeholder'=>"La date de naissance", 'class'=>'form-control']) !!}                    
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Lieu') !!}                    
                                {!! Form::text('lieu', $personnel->user->lieu_naissance, ['placeholder'=>'Votre lieu de naissance', 'class'=>'form-control']) !!}                    
                            </div> 
                        </div>
                        {{-- <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('pseudo') !!}                    
                                {!! Form::text('username', $personnel->user->username, ['placeholder'=>"Votre pseudo", 'class'=>'form-control']) !!}                    
                            </div>
                            <div class="invalid-feedback">
                                {{ $errors->first('username') }}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('votre adresse e-mail') !!}                    
                                {!! Form::email('email', $personnel->user->email, ['placeholder'=>'Votre adresse e-mail', 'class'=>'form-control', 'id'=>'email']) !!}                    
                            </div> 
                        </div> --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('cin') !!}                    
                                {!! Form::text('cin', $personnel->cin, ['placeholder'=>"Votre cin", 'class'=>'form-control']) !!}                    
                            </div>
                            <div class="invalid-feedback">
                                {{ $errors->first('cin') }}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('matricule') !!}                    
                                {!! Form::text('matricule', $personnel->matricule, ['placeholder'=>'Votre matricule', 'class'=>'form-control', 'id'=>'email']) !!}                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Situation familiale') !!}                    
                                {!! Form::text('familiale', $personnel->user->situation_familiale, ['placeholder'=>"Votre situation familiale", 'class'=>'form-control']) !!}                    
                            </div>
                            <div class="invalid-feedback">
                                {{ $errors->first('familiale') }}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label("Le nombre d'enfant") !!}                    
                                {!! Form::number('enfant', $personnel->nbrefant, ['min'=>'0','placeholder'=>"Le nombre d'enfant obtenu(s)", 'class'=>'form-control', 'id'=>'email']) !!}                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label("date d'entrée en fonction", null, ['class' => 'control-label']) !!}                    
                                {!! Form::date('date_debut', $personnel->debut->format('Y-m-d'), ['placeholder'=>"La date de recrutement", 'class'=>'form-control']) !!}                    
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Telephone') !!}                    
                                {!! Form::text('telephone', $personnel->user->telephone, ['placeholder'=>'Numero de telephone', 'class'=>'form-control']) !!}                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Numero fax') !!}                    
                                {!! Form::text('fax', $personnel->user->fax, ['placeholder'=>"Votre numero fax", 'class'=>'form-control']) !!}                    
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Boite postale') !!}                    
                                {!! Form::text('bp', $personnel->user->bp, ['placeholder'=>'Votre Boite postale', 'class'=>'form-control']) !!}                    
                            </div> 
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">                
                                {!! Form::label('Image de profile') !!}<br/>
                                {!! Form::file('image',null, ['class'=>'form-control-file rounded-circle w-100']) !!} 
                                <img class="pt-1" src="{{ asset($personnel->user->profile->getImage()) }}" width="50" height="auto">
                            </div>
                        </div> 
                        {!! Form::submit('Modifier', ['class'=>'btn btn-outline-primary pull-right', ]) !!}
                    {!! Form::close() !!}
                    
                </div>


        </div>
    </div>
</div>
@endsection

