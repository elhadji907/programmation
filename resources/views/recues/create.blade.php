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
                    <p class="card-category">Courriers arrivés</p>
                </div>

                <div class="card-body">
                {!! Form::open(['url'=>'recues','files' => true]) !!}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::label('Objet') !!}                    
                            {!! Form::select('objet', $objets, null, ['placeholder'=>'', 'class'=>'form-control', 'id'=>'objet']) !!}                    
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
                            {!! Form::label('Telephone') !!}                    
                            {!! Form::text('telephone', null, ['placeholder'=>"Votre numero de téléphone", 'class'=>'form-control']) !!}                    
                        </div>
                        <div class="invalid-feedback">
                            {{ $errors->first('telephone') }}
                        </div>
                        <div class="form-group col-md-6">
                            {!! Form::label('Adresse e-mail') !!}                    
                            {!! Form::email('email', null, ['placeholder'=>'Votre adresse e-mail', 'class'=>'form-control', 'id'=>'email']) !!}                    
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

                
       {{--  <form method="POST" action="{{ url('recues') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="objet"><b>Objet:</b></label>
                    <select autofocus name="objet" id="objet" class="form-control @error('objet') is-invalid @enderror" value="{{ old('objet') }}">
                        <option value="">-----Selectionnez-----</option>
                    @foreach($objets as $objet)
                        <option value="{{ $objet->name }}">{{ $objet->name }}</option>
                    @endforeach
                    </select>
                    <div class="invalid-feedback">
                        {{ $errors->first('objet') }}
                    </div>
                </div>            
            </div>  
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="expediteur"><b>Expéditeur:</b></label>
                    <input class="form-control {{ $errors->has('expediteur') ? 'is-invalid' : '' }}" type="text" name="expediteur" placeholder="Prénom et Nom de l'expéditeur..."
                        id="expediteur" value="{{ old('expediteur') }}">
                    <div class="invalid-feedback">
                        {{ $errors->first('expediteur') }}
                    </div>
                </div>
                
                <div class="form-group col-md-6">
                    <label for="imputation"><b>Imputation:</b></label>
                    <select name="imputation[]" id="imputation" multiple="true" class="form-control sselecter @error('imputation') is-invalid @enderror" value="{{ old('imputation') }}">
                        <option value="">-----Selectionnez-----</option>
                    @foreach($directions as $direction)
                        <option value="{{ $direction->sigle }}">{{ $direction->sigle }}</option>
                    @endforeach
                    </select>
                <div class="invalid-feedback">
                    {{ $errors->first('imputation') }}
                </div>
            </div>                  
            </div>
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="telephone"><b>Téléphone:</b></label>
                        <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" type="text" name="telephone" placeholder="Téléphone..."
                            id="telephone" value="{{ old('telephone') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('telephone') }}
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email"><b>Adresse E-mail:</b></label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" placeholder="Adresse E-mail..."
                            id="email" value="{{ old('email') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>                   
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fax"><b>Fax:</b></label>
                        <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" placeholder="Fax..."
                            id="fax" value="{{ old('fax') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('fax') }}
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bp"><b>BP:</b></label>
                        <input class="form-control {{ $errors->has('bp') ? 'is-invalid' : '' }}" type="text" name="bp" placeholder="BP..."
                            id="bp" value="{{ old('bp') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('bp') }}
                        </div>
                    </div>                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date_r"><b>Date du courrier:</b></label>
                        <input class="form-control {{ $errors->has('date_r') ? 'is-invalid' : '' }}" type="date" value="{{ $date }}" name="date_r" placeholder="date réception courrier..."
                            id="date_r" value="{{ old('date_r') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('date_r') }}
                        </div>
                    </div> 
                    <div class="form-group col-md-6">
                        <label for="adresse"><b>Adresse:</b></label>
                        <input class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }}" type="text" name="adresse" placeholder="Adresse complète..."
                            id="adresse" value="{{ old('adresse') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('adresse') }}
                        </div>
                    </div>   
                </div> 
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="file"><b>Joindre le courrier:</b></label>
                        <input type="file" class="form-control-file @error('file') is-invalid @enderror" name="file" value="" id="validatedCustomFile">
                     
                        <div class="invalid-feedback">
                            {{ $errors->first('file') }}
                        </div> 
                    </div>                                 
                <div class="form-group col-md-6">
                    <label for="legende"><b>Légende</b></label>                            
                        <input id="legende" type="text" class="form-control @error('legende') is-invalid @enderror" name="legende" value="{{ old('legende') }}" placeholder="donner un nom à ce fichier..." autocomplete="legende">
                       
                        <div class="invalid-feedback">
                            {{ $errors->first('legende') }}
                        </div> 
                </div> 
                </div>   
                <button class="btn btn-outline-primary" type="submit">
                    <span data-feather="save"></span> Enregistrer
                </button>
            </form> --}}

            </div>
        </div>
    </div>
</div>
</div>

@endsection

