@extends('layout.default')
@section('content')
<div class="content">
    <div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif                    
            <div class="row pt-5"></div>
            <div class="card">
                <div class="card-header card-header-primary text-center">
                    <h3 class="card-title">Enregistrement</h3>
                    <p class="card-category">demandeurs</p>
                </div>
                <div class="card-body">                                               
                        <form method="POST" action="{{ url('demandeurs') }}">
                           @csrf                                    
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="objet"><b>Objet:</b></label>
                                    <select name="objet" id="objet" class="form-control @error('objet') is-invalid @enderror" value="{{ old('objet') }}">
                                        <option value=""></option>
                                    @foreach($objets as $objet)
                                        <option value="{{ $objet->name }}">{{ $objet->name }}</option>
                                    @endforeach
                                    </select>
                                   {{--   <input class="form-control {{ $errors->has('objet') ? 'is-invalid' : '' }}" type="text" name="objet" placeholder="Objet du courrier..."
                                        id="objet" value="{{ old('objet') }}">  --}}
                                    <div class="invalid-feedback">
                                        {{ $errors->first('objet') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date_r"><b>Date:</b></label>
                                    <input class="form-control {{ $errors->has('date_r') ? 'is-invalid' : '' }}" type="date" value="{{ $date }}" name="date_r" placeholder="date réception courrier..."
                                        id="date_r" value="{{ old('date_r') }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('date_r') }}
                                    </div>
                                </div>                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="input-cin"><b>Numero CIN:</b></label>
                                    <input type="text" name="cin" class="form-control" id="input-cin" placeholder="numero cin" value="{{ old('cin') }}">
                                    <small id="emailHelp" class="form-text text-muted">
                                            @if ($errors->has('cin'))
                                            @foreach ($errors->get('cin') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                            @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="input-prenom"><b>Prenom:</b></label>
                                <input type="text" name="prenom" class="form-control" id="input-prenom" placeholder="Prenom" value="{{ old('prenom') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('prenom'))
                                        @foreach ($errors->get('prenom') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="input-nom"><b>Nom:</b></label>
                                <input type="text" name="nom" class="form-control" id="input-nom" placeholder="Nom" value="{{ old('nom') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('nom'))
                                        @foreach ($errors->get('nom') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="input-date_nais"><b>Date de naissance:</b></label>
                                <input type="date" name="date_nais" class="form-control" id="input-date_nais" placeholder="date de naissance" value="{{ old('date_nais') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('date_nais'))
                                        @foreach ($errors->get('date_nais') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="input-lieu"><b>Lieu:</b></label>
                                <input type="text" name="lieu" class="form-control" id="input-lieu" placeholder="lieu" value="{{ old('lieu') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('lieu'))
                                        @foreach ($errors->get('lieu') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="input-email"><b>Adresse email:</b></label>
                                <input type="email" name="email" class="form-control" id="input-email" aria-describedby="emailHelp" placeholder="Adresse E-mail" value=" {{old('email')}}">
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="imput-username"><b>{{ ("Nom d'utilisateur") }}:</b></label>
                                <input type="text" name="username" class="form-control" id="imput-username" aria-describedby="emailHelp" placeholder="Nom d'utilisateur" value="{{old('username')}}">
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('username'))
                                    @foreach ($errors->get('username') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                    @endif
                                </small>
                            </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="input-telephone1"><b>{{ __('Téléphone 1:') }}</b></label>
                                    <input type="text" name="telephone1" class="form-control" id="input-telephone1" aria-describedby="emailHelp" placeholder="Numero de telephone" value="{{old('telephone1')}}">
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('telephone1'))
                                        @foreach ($errors->get('telephone1') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="input-telephone2"><b>{{ __('Téléphone 2:') }}</b></label>
                                    <input type="text" name="telephone2" class="form-control" id="input-telephone2" aria-describedby="emailHelp" placeholder="Numero de telephone secondaire" value="{{old('telephone2')}}">
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('telephone2'))
                                        @foreach ($errors->get('telephone2') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1"><b>Mot de passe:</b></label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
                                @if ($errors->has('password'))
                                @foreach ($errors->get('password') as $message)
                                <p class="text-danger">{{ $message }}</p>
                                @endforeach
                                @endif
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1"><b>Mot de passe:</b>(confirmation)</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Repeter mot de passe">
                                @if ($errors->has('password_confirmation'))
                                @foreach ($errors->get('password_confirmation') as $message)
                                <p class="text-danger">{{ $message }}</p>
                                @endforeach
                                @endif
                            </div>                            
                        </div>                          
                        <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>&nbsp;Enregistrer</button>
                        </form>
                        <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es saisies svp</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @push('scripts')
                                        <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#error-modal").modal({
                                                'show':true,
                                            })
                                        });
                                        </script>
                                            
                                        @endpush
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection