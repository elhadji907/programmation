@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         {{--    @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
            @endif --}}
            <div class="card">
                <div class="card card-header text-center bg-gradient-success">
                    <h1 class="h4 text-white mb-0"><span data-feather="x"></span> {{ __('REINITIALISER LE MOT DE PASSE') }}</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="user" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Addresse E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Votre adresse e-mail" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fas fa-paper-plane"></i>&nbsp;
                                    {{ __('Envoyer le lien') }}
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
