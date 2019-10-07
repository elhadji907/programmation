@extends('layout.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier mon profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profiles.update', ['$user' => $user]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>   
                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control form-control-user @error('firstname') is-invalid @enderror" name="firstname" placeholder="Votre prénom" value="{{ old('firstname') ?? auth::user()->firstname }}" autocomplete="firstname" autofocus>    
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>   
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" placeholder="Votre nom" value="{{ old('name') ?? auth::user()->name }}" autocomplete="name" autofocus>    
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_naissance" class="col-md-4 col-form-label text-md-right">{{ __('Date de naissance') }}</label>   
                            <div class="col-md-6">

                                @if (auth::user()->date_naissance!==NULL)
                                <input id="date_naissance" type="date" class="form-control form-control-user @error('date_naissance') is-invalid @enderror" name="date_naissance" placeholder="Votre date de naissance" value="{{ old('date_naissance') ?? auth::user()->date_naissance->format('Y-m-d') }}" autocomplete="date_naissance" autofocus>    
                                @else
                                <input id="date_naissance" type="date" class="form-control form-control-user @error('date_naissance') is-invalid @enderror" name="date_naissance" placeholder="Votre date de naissance" value="{{ old('date_naissance') ?? auth::user()->date_naissance }}" autocomplete="date_naissance" autofocus>    
                                @endif
                                @error('date_naissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="lieu_naissance" class="col-md-4 col-form-label text-md-right">{{ __('Lieu de naissance') }}</label>   
                            <div class="col-md-6">
                                <input id="lieu_naissance" type="text" class="form-control form-control-user @error('lieu_naissance') is-invalid @enderror" name="lieu_naissance" placeholder="Votre lieu de naissance" value="{{ old('lieu_naissance') ?? auth::user()->lieu_naissance }}" autocomplete="lieu_naissance" autofocus>    
                                @error('lieu_naissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Téléphone') }}</label>   
                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control form-control-user @error('telephone') is-invalid @enderror" name="telephone" placeholder="Votre numéro de téléphone" value="{{ old('telephone') ?? auth::user()->telephone }}" autocomplete="telephone" autofocus>    
                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       {{--  <div class="form-group">
                            <label for="description">Description</label>                            
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus>{{ old('description') ?? auth::user()->description }}
                            </textarea>                               
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror    
                        </div>  --}}
                       {{--  <div class="form-group">
                            <label for="url">URL</label>                            
                            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? auth::user()->url }}" autocomplete="url" autofocus>                                   
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror        
                        </div> --}}
                        {{--  <div class="form-group row">
                            <label for="sexe" class="col-md-4 col-form-label text-md-right">{{ __('Sexe') }}</label>   
                            <div class="col-md-6">
                                <select name="sexe" id="sexe" class="form-control selectpicker">
                                    <option class="text-gray-600 small">--Sélectionner--</option>
                                @foreach($sexes as $sexe)
                                    <option value="{{ $sexe->id }}">{{ $sexe->name }}</option>
                                @endforeach
                                </select>
                                @error('sexe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  --}}
{{-- 
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Photo de profil') }}</label>   
                            <div class="col-md-6 custom-file">
                                <input id="image" type="image" class="form-control form-control-user @error('image') is-invalid @enderror" name="image" placeholder="Votre image de profil" value="{{ old('image') ?? auth::user()->image }}" autocomplete="image" autofocus>    
                                <label class="custom-file-label" for="validatedCustomFile">Chisir une image...</label> 
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <img class="img-profile img-fluid" src="{{ asset(Auth::user()->profile->getImage()) }}" width="50" height="auto">
                        </div> --}}

                       <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Photo de profil') }}</label> 
                            <div class="custom-file col-md-6">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Chisir une image...</label> 
                                <img class="pt-1" src="{{ asset(Auth::user()->profile->getImage()) }}" width="50" height="auto">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> 
                        <button type="submit" class="btn btn-primary">
                           Modifier mon profile
                        </button>                          
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
