@extends('layouts.app')
@section('title', 'ONFP - Inscription')
@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card card-header text-center bg-gradient-success">
                    <h1 class="h4 text-white mb-0"><span data-feather="info"></span> INSCRIPTION</h1>
                </div>
                <div class="card-body">
                    <form class="user" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname"><b>{{ __('Prénom') }}</b>(<span class="text-danger">*</span>)</label>
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" placeholder="Votre et prenom" value="{{ old('firstname') }}" autocomplete="firstname" autofocus>
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>                            
                            <div class="form-group col-md-6">
                                <label for="name"><b>{{ __('Nom') }}</b>(<span class="text-danger">*</span>)</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Votre et nom" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>     
                        </div>
                        <div class="form-row">                                                   
                            <div class="form-group col-md-4">
                                <label for="username"><b>{{ __('Pseudo') }}</b>(<span class="text-danger">*</span>)</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Ex: jean21" value="{{ old('username') }}" autocomplete="username" autofocus>    
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                                                       
                            <div class="form-group col-md-4">
                                <label for="date_naissance"><b>{{ __('Date de naissance') }}</b>(<span class="text-danger">*</span>)</label>
                                    <input id="date_naissance" {{ $errors->has('date_r') ? 'is-invalid' : '' }} type="date" class="form-control @error('date_naissance') is-invalid @enderror" name="date_naissance" placeholder="Votre date de naissance" value="{{ old('date_naissance') }}" autocomplete="username" autofocus>    
                                    @error('date_naissance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group col-md-4">
                            <label for="lieu_naissance"><b>{{ __('Lieu de naissance') }}</b>(<span class="text-danger">*</span>)</label>
                                <input id="lieu_naissance" type="text" class="form-control @error('lieu_naissance') is-invalid @enderror" name="lieu_naissance" placeholder="Votre lieu de naissance" value="{{ old('lieu_naissance') }}" autocomplete="lieu_naissance">
                                @error('lieu_naissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                                    
                           {{--   <div class="form-group col-md-4">
                                <label for="exampleInputEmail1"><b>Civilité</b></b>(<span class="text-danger">*</span>)</label>
                                <select name="civilite" id="civilite" class="form-control {{ $errors->has('civilite') ? 'is-invalid' : '' }}">
                                        <option value="">-selectionnez-</option>
                                        <option value="M.">{{ ('M.') }}</option>
                                        <option value="Mme">{{ ('Mme') }}</option>
                                </select>
                                @error('civilite')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>  --}}
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="email"><b>{{ __('Addresse E-Mail') }}</b>(<span class="text-danger">*</span>)</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Votre adresse e-mail" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                            <label for="telephone"><b>{{ __('Telephone') }}</b>(<span class="text-danger">*</span>)</label>
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" placeholder="Votre numero de telephone" value="{{ old('telephone') }}" autocomplete="telephone" autofocus>

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="password"><b>{{ __('Mot de passe') }}</b>(<span class="text-danger">*</span>)</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Votre mot de passe" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                            
                            <div class="form-group col-md-6">
                            <label for="password-confirm"><b>{{ __('Mot de passe confirmation') }}</b>(<span class="text-danger">*</span>)</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Répéter votre mot de passe" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-row">
                        </div>
                        <div class="col-md-12 offset-md-0">
                            <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fas fa-paper-plane"></i>&nbsp;
                                {{ __("Créer un compte") }}
                            </button>
                        </div>
                        <hr>
                        <div class="text-center">
                          <a class="small" href="{{ route('password.request') }}">{{ __('Mot de passe oublié?') }}</a>
                        </div>
                        <div class="text-center">
                          <a class="small" href="{{ route('login') }}">{{ __("Vous avez déjà un compte? S'identifier!") }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
