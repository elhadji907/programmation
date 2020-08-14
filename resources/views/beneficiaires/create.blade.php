@extends('layout.default')
@section('title', 'ONFP - Création bénéficiaires')
@section('content')
<div class="content">
    <div class="container col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif                    
            <div class="row pt-5"></div>
            <div class="card">
                <div class="card-header card-header-primary text-center">
                    <h3 class="card-title">Enregistrement</h3>
                    <p class="card-category">bénéficiaire</p>
                </div>
                <div class="card-body">
                                               
                        <form method="POST" action="{{ url('beneficiaires') }}">
                           @csrf
                            <div class="form-row">                    
                                <div class="form-group col-md-6">
                                <label for="input-cin"><b>CIN:</b></label>
                                <input type="text" name="cin" class="form-control" id="input-cin" placeholder="numéro cin national" value="{{ old('cin') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('cin'))
                                        @foreach ($errors->get('cin') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><b>Civilité</b></label>
                                <select name="civilite" id="civilite" class="form-control">
                                        <option value="">--Selectionner--</option>
                                    @foreach($civilites as $civilite)
                                        <option value="{{ $civilite->civilite }}">{{ $civilite->civilite }}</option>
                                    @endforeach
                                    </select>
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('civilite'))
                                    @foreach ($errors->get('civilite') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input-prenom"><b>Prénom:</b></label>
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
                            <div class="form-group col-md-6">
                                <label for="input-date"><b>Date naissance:</b></label>
                                <input type="date" name="date" class="form-control" id="input-date" placeholder="date de naissance" value="{{ old('date') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('date'))
                                        @foreach ($errors->get('date') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>                            
                            <div class="form-group col-md-6">
                                <label for="input-lieu"><b>Lieu naissance:</b></label>
                                <input type="text" name="lieu" class="form-control" id="input-lieu" placeholder="votre lieu de naissance" value="{{ old('lieu') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('lieu'))
                                        @foreach ($errors->get('lieu') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="input-region"><b>Région:</b></label>
                                <input type="text" name="region" class="form-control" id="input-region" placeholder="region" value="{{ old('region') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('region'))
                                        @foreach ($errors->get('region') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>                            
                            <div class="form-group col-md-6">
                                <label for="input-departement"><b>Département:</b></label>
                                <input type="text" name="departement" class="form-control" id="input-departement" placeholder="departement" value="{{ old('departement') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('departement'))
                                        @foreach ($errors->get('departement') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="input-arrondissement"><b>Arrondissement:</b></label>
                                <input type="text" name="arrondissement" class="form-control" id="input-arrondissement" placeholder="arrondissement" value="{{ old('arrondissement') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('arrondissement'))
                                        @foreach ($errors->get('arrondissement') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>                            
                            <div class="form-group col-md-6">
                                <label for="input-commune"><b>Commune:</b></label>
                                <input type="text" name="commune" class="form-control" id="input-commune" placeholder="commune" value="{{ old('commune') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('commune'))
                                        @foreach ($errors->get('commune') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><b>Adresse email:</b></label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail" value=" {{old('email')}}">
                                {{--  <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre email avec qui que ce soit.</small>  --}}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1"><b>Téléphone:</b></label>
                                <input type="text" name="telephone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telephone" value="{{old('telephone')}}">
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('telephone'))
                                    @foreach ($errors->get('telephone') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="card card-header text-center bg-gradient-default col-md-12">
                                <h1 class="h4 mb-0">Formations souhaitées</h1>
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