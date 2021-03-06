@extends('layout.default') 
@section('title', 'ONFP - Modification des courriers reçus')
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
                    <p class="card-category">Courriers arrivés</p>
                </div>

                <div class="card-body">
                {!! Form::open(['url'=>'recues/'.$recue->id, 'method'=>"PATCH", 'files' => true]) !!}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::label('Objet') !!}                    
                            {!! Form::text('objet', $recue->courrier->objet, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'objet']) !!}                    
                        </div> 
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::label('Message') !!}                    
                            {!! Form::textarea('message',  $recue->courrier->message, ['placeholder'=>'Message du courrier', 'rows' => 4, 'class'=>'form-control', 'id'=>'message']) !!}                    
                        </div> 
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Expéditeur') !!}                    
                            {!! Form::text('expediteur', $recue->courrier->expediteur, ['placeholder'=>"Nom et prénom de l'expéditeur", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Imputation') !!}                    
                            {!! Form::select('imputations[]', $imputations, null, ['multiple'=>'multiple', 'class'=>'form-control', 'id'=>'imputation']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Telephone') !!}                    
                            {!! Form::text('telephone', $recue->courrier->telephone, ['placeholder'=>"Votre numero de téléphone", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="invalid-feedback">
                            {{ $errors->first('telephone') }}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Adresse e-mail') !!}                    
                            {!! Form::email('email', $recue->courrier->email, ['placeholder'=>'Votre adresse e-mail', 'class'=>'form-control', 'id'=>'email']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Adresse') !!}                    
                            {!! Form::text('adresse', $recue->courrier->adresse, ['placeholder'=>'Votre adresse de résidence', 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="form-group col-md-3">
                            {!! Form::label('Date correspondance', null, ['class' => 'control-label']) !!}                    
                            {!! Form::date('date_cores', Carbon\Carbon::parse($recue->courrier->date_c)->format('Y-m-d'), ['placeholder'=>"La date de dépos du courrier", 'class'=>'form-control']) !!}                    
                        </div> 
                        <div class="form-group col-md-3">
                            {!! Form::label('Date réception', null, ['class' => 'control-label']) !!}                    
                            {!! Form::date('date_recep', Carbon\Carbon::parse($recue->courrier->date_r)->format('Y-m-d'), ['placeholder'=>"La date de réception du courrier", 'class'=>'form-control']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('Numero fax') !!}                    
                            {!! Form::text('fax', $recue->courrier->fax, ['placeholder'=>"Votre numero fax", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Boite postale') !!}                    
                            {!! Form::text('bp', $recue->courrier->bp, ['placeholder'=>'Votre Boite postale', 'class'=>'form-control']) !!}                    
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {!! Form::label('', null, ['class' => 'control-label']) !!}                    
                            {!! Form::file('file', null, ['class'=>'form-control-file']) !!}
                            @if ($recue->courrier->file !== "")
                            <a class="btn btn-outline-secondary mt-2" title="télécharger le fichier joint" target="_blank" href="{{ asset($recue->courrier->getFile()) }}">
                                <i class="fas fa-download">&nbsp;Télécharger le courrier</i>
                            </a>
                            @endif                   
                        </div>
                        <div class="form-group col-md-6">                
                            {!! Form::text('legende', $recue->courrier->legende, ['placeholder'=>'Le nom du fichier joint', 'class'=>'form-control']) !!}                    
                        </div> 
                    </div>
                    {!! Form::submit('Enregistrer', ['class'=>'btn btn-outline-primary pull-right', ]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascripts')
    <script type="text/javascript">
        $('#imputation').select2().val({!! json_encode($recue->courrier->imputations()->allRelatedIds()) !!}).trigger('change');
    </script>
@endsection