@extends('layout.default') 
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
                    <p class="card-category">Courrier arrivé</p>
                </div>
                <div class="card-body">
        <form method="POST" action="{{ action('RecuesController@update', $id) }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH" />       
            <div class="form-row">
                <div class="form-group col-md-12">
                   {{--   <label for="objet"><b>Objet:</b></label>
                    <input class="form-control {{ $errors->has('objet') ? 'is-invalid' : '' }}" type="text" name="objet" placeholder="Objet du courrier..."
                        id="objet" value="{{ old('objet') ?? $recue->courrier->objet }} ">  --}}
                        <label for="objet"><b>Objet:</b></label>
                        <select name="objet" id="objet" class="form-control @error('objet') is-invalid @enderror" value="{{ old('objet') ?? $recue->courrier->objet }}">
                            <option value="{{ $recue->courrier->objet }}">{{ $recue->courrier->objet }}</option>
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
                        id="expediteur" value="{{ old('expediteur') ?? $recue->courrier->expediteur }}">
                    <div class="invalid-feedback">
                        {{ $errors->first('expediteur') }}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="adresse"><b>Adresse:</b></label>
                    <input class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }}" type="text" name="adresse" placeholder="Adresse complète..."
                        id="adresse" value="{{ old('adresse') ?? $recue->courrier->adresse }}">
                    <div class="invalid-feedback">
                        {{ $errors->first('adresse') }}
                    </div>
                </div>                   
            </div>
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="telephone"><b>Téléphone:</b></label>
                        <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" type="text" name="telephone" placeholder="Téléphone..."
                            id="telephone" value="{{ old('telephone') ?? $recue->courrier->telephone }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('telephone') }}
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email"><b>Adresse E-mail:</b></label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" placeholder="Adresse E-mail..."
                            id="email" value="{{ old('email') ?? $recue->courrier->email }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>                   
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="fax"><b>Fax:</b></label>
                        <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" placeholder="Fax..."
                            id="fax" value="{{ old('fax') ?? $recue->courrier->fax }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('fax') }}
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="bp"><b>BP:</b></label>
                        <input class="form-control {{ $errors->has('bp') ? 'is-invalid' : '' }}" type="text" name="bp" placeholder="BP..."
                            id="bp" value="{{ old('bp') ?? $recue->courrier->bp }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('bp') }}
                        </div>
                    </div>                     
                    <div class="form-group col-md-4">
                        <label for="date_r"><b>Date:</b></label>
                        @if ($recue->courrier->date !== NULL)
                        <input class="form-control {{ $errors->has('date_r') ? 'is-invalid' : '' }}" type="date" name="date_r" placeholder="date réception courrier..."
                            id="date_r" value="{{ old('date_r') ?? $recue->courrier->date->format('Y-m-d') }}">
                        @else
                        <input class="form-control {{ $errors->has('date_r') ? 'is-invalid' : '' }}" type="date" name="date_r" placeholder="date réception courrier..."
                        id="date_r" value="{{ old('date_r') ?? $recue->courrier->date }}">
                        @endif
                        <div class="invalid-feedback">
                            {{ $errors->first('date_r') }}
                        </div>
                    </div>                   
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="file"><b>Joindre le courrier:</b></label>
                        <input type="file" class="form-control-file @error('file') is-invalid @enderror" name="file" value="" id="validatedCustomFile">
                        {{--   <h3><a href="#">{{ asset($recue->courrier->getFile()) }}</a></h3>  --}}
                        {{-- <a target="_blank" href="{{ asset($recue->courrier->getFile()) }}">{{ $recue->courrier->legende }}</a> --}}
                        @if ($recue->courrier->file !== "")
                        <a class="btn btn-outline-secondary mt-2" title="télécharger le fichier joint" target="_blank" href="{{ asset($recue->courrier->getFile()) }}">
                            <i class="fas fa-download">&nbsp;Télécharger le courrier</i>
                        </a>  
                        @else
                            {{ __("Aucun document n'a été télécharger, merci de cliquer sur choisir un fichier pour joindre un nouveau fichier.") }}
                        @endif
                        <div class="invalid-feedback">
                            {{ $errors->first('file') }}
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                            <label for="legende"><b>Légende</b></label>                            
                            <input id="legende" type="text" class="form-control @error('legende') is-invalid @enderror" name="legende" value="{{ old('legende') ?? $recue->courrier->legende}}" placeholder="donner un nom à ce fichier..." autocomplete="legende" autofocus>                               
                            @error('legende')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                       {{--   <label for="imputation"><b>Imputation:</b></label>
                        <input class="form-control {{ $errors->has('imputation') ? 'is-invalid' : '' }}" type="text" name="imputation" placeholder="imputation courrier..."
                            id="imputation" value="{{ old('imputation') ?? $recue->courrier->imputation }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('imputation') }}
                        </div>  --}}
                    </div>
                    </div>
                <button class="btn btn-outline-primary" type="submit">
                    <span data-feather="save"></span> Enregistrer
                </button>
            </form>
            </div>
        </div>
    </div>
</div></div>

@endsection

