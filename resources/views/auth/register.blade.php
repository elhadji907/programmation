@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
            <div class="card">
                <div class="card card-header text-center bg-gradient-success">
                    <h1 class="h4 text-white mb-0"><span data-feather="info"></span> INSCRIPTION</h1>
                </div>

                <div class="card-body">
                    <form class="user" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control form-control-user @error('firstname') is-invalid @enderror" name="firstname" placeholder="Votre et prenom" value="{{ old('firstname') }}" autocomplete="firstname" autofocus>

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
                                <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" placeholder="Votre et nom" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control form-control-user @error('username') is-invalid @enderror" name="username" placeholder="Votre username" value="{{ old('username') }}" autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Addresse E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" placeholder="Votre adresse e-mail" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Votre mot de passe" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe confirmation') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Répéter votre mot de passe" autocomplete="new-password">
                            </div>
                        </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fas fa-paper-plane"></i>&nbsp;
                                    {{ __("Créer un compte") }}
                                </button>
                            </div>
                            <hr>
                       <div class="form-group row">
                       <div class="col-md-6 offset-md-4">
                            <a href="#" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Inscrivez-vous avec Google
                            </a>
                        </div> 
                        </div>
                        <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <a href="#" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Inscrivez-vous avec Facebook
                            </a>
                        </div> 
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
