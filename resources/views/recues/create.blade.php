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
                    <h3 class="card-title">Enregistrement</h3>
                    <p class="card-category">Courriers arrivés</p>
                </div>
                <div class="card-body">
        <form method="POST" action="{{ url('recues') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="objet"><b>Objet:</b></label>
                    <input class="form-control {{ $errors->has('objet') ? 'is-invalid' : '' }}" type="text" name="objet" placeholder="Objet du courrier..."
                        id="objet" value="{{ old('objet') }}">
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
                            <label for="date_r"><b>Date:</b></label>
                            <input class="form-control {{ $errors->has('date_r') ? 'is-invalid' : '' }}" type="date" name="date_r" placeholder="date réception courrier..."
                                id="date_r" value="{{ old('date_r') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('date_r') }}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="file"><b>Joindre le courrier:</b></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Chisir le fichier...</label>                                
    
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>    
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

