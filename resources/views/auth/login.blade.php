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
                        <h1 class="h4 text-white mb-0"><span data-feather="log-in"></span> CONNEXION</h1>
                </div>

                <div class="card-body">
                    <form class="user" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Addresse E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" placeholder="Votre adresse e-mail" value="{{ old('email') }}" autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Votre mot de passe" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                       {{--   <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">  --}}
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fas fa-paper-plane"></i>&nbsp;
                                    {{ __("S'identifier") }}
                                </button>

                               {{--   @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié?') }}
                                    </a>
                                @endif  --}}
                            </div>
                            <hr>
                                {{--  <button type="submit" class="btn btn-primary">
                                    {{ __("S'identifier") }}
                                </button>  --}}
                           {{--   </div>
                        </div>  --}}
                        @if (Route::has('password.request'))
                        <div class="text-center">
                            <a class="small" href="{{ route('password.request') }}">{{ __('Mot de passe oublié?') }}</a>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
