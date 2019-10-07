@extends('layout.default') 


@section('content')
<div class="container">
   
    <form method="POST" action="#" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="numero">Numero</label>
                <input class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" type="text" name="numero" placeholder="Numéro du courrier..."
                    id="numero" value="{{ old('numero') }}">
                <div class="invalid-feedback">
                    {{ $errors->first('numero') }}
                </div>
                
            </div>
            <div class="form-group col-md-6">
                <label for="nom">Objet</label>
                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" placeholder="Objet du courrier..."
                    id="nom" value="{{ old('nom') }}">
                <div class="invalid-feedback">
                    {{ $errors->first('nom') }}
                </div>
            </div>   
            <div class="form-group col-md-3">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control selectpicker">
                        <option value="" class="text-gray-600 small">--Sélectionner le type--</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    {{ $errors->first('type') }}
                </div>
            </div>
                
        </div>        
        <div class="form-group">
            <label for="content">Message</label>
            <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" rows="7" name="content" id="textarea"></textarea>
            <div class="invalid-feedback">
                {{ $errors->first('content') }}
            </div>
        </div>           
    {{-- <input class="btn btn-outline-primary" type="submit" value="Enregistrer">  --}}

    <button class="btn btn-outline-primary">
            <span data-feather="save"></span> Enregistrer
    </button>
    </form>
</div>
@endsection

