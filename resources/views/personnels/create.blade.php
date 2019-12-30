@extends('layout.default') 
@section('title', 'ONFP - Enregistrement courrier !')
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
                {!! Form::open(['url'=>'recues','files' => true]) !!}
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
                            {!! Form::label('prenom') !!}                    
                            {!! Form::text('firstname', null, ['placeholder'=>"le prenom", 'class'=>'form-control']) !!}                    
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
                            {!! Form::label('Numero fax') !!}                    
                            {!! Form::text('fax', null, ['placeholder'=>"Votre numero fax", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Boite postale') !!}                    
                            {!! Form::text('bp', null, ['placeholder'=>'Votre Boite postale', 'class'=>'form-control']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Date du courrier', null, ['class' => 'control-label']) !!}                    
                            {!! Form::date('date', null, ['placeholder'=>"La date de dépos du courrier", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Adresse') !!}                    
                            {!! Form::text('adresse', null, ['placeholder'=>'Votre adresse de résidence', 'class'=>'form-control']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('', null, ['class' => 'control-label']) !!}                    
                            {!! Form::file('file', null, ['class'=>'form-control-file']) !!}                    
                        </div>
                        <div class="form-group col-md-6">                
                            {!! Form::text('legende', null, ['placeholder'=>'Le nom du fichier joint', 'class'=>'form-control']) !!}                    
                        </div> 
                    </div>
                    {!! Form::submit('Enregistrer', ['class'=>'btn btn-outline-primary pull-right', ]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</div>

@endsection

