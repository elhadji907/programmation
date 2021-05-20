@extends('layout.default') 
@section('title', 'ONFP - Enregistrement des courriers internes')
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
                    <p class="card-category">Courriers internes</p>
                </div>

                <div class="card-body">
                {!! Form::open(['url'=>'internes','files' => true]) !!}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::label('Objet') !!}                    
                            {!! Form::text('objet', null, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'objet']) !!}                    
                        </div> 
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::label('Message') !!}                    
                            {!! Form::textarea('message', null, ['placeholder'=>'Message du courrier', 'rows' => 4, 'class'=>'form-control', 'id'=>'message']) !!}                    
                        </div> 
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Expéditeur') !!}                    
                            {!! Form::text('expediteur', null, ['placeholder'=>"Nom et prénom de l'expéditeur", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Imputation') !!}                    
                            {!! Form::select('directions[]', $directions, null, ['multiple'=>'multiple', 'class'=>'form-control', 'id'=>'direction']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Adresse e-mail') !!}                    
                            {!! Form::email('email', null, ['placeholder'=>'Votre adresse e-mail', 'class'=>'form-control', 'id'=>'email']) !!}                    
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Téléphone') !!}                    
                            {!! Form::text('telephone', null, ['placeholder'=>"Votre numero de téléphone", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="invalid-feedback">
                            {{ $errors->first('telephone') }}
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Adresse') !!}                    
                            {!! Form::text('adresse', null, ['placeholder'=>'Votre adresse de résidence', 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="form-group col-md-3">
                            {!! Form::label('Date correspondance', null, ['class' => 'control-label']) !!}                    
                            {!! Form::date('date_cores', $date_r->format('Y-m-d'), ['placeholder'=>"La date de correspondance du courrier", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="form-group col-md-3">
                            {!! Form::label('Date réception', null, ['class' => 'control-label']) !!}                    
                            {!! Form::date('date_recep', $date_r->format('Y-m-d'), ['placeholder'=>"La date de reception du courrier", 'class'=>'form-control']) !!}                    
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

