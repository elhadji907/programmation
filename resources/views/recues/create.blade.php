@extends('layout.default') 
@section('content')
<div class="container">   
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
                    {{ $errors->first('expediteur') }}
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
    <button class="btn btn-outline-primary" type="submit">
        <span data-feather="save"></span> Enregistrer
    </button>
    </form>
</div>
@endsection

