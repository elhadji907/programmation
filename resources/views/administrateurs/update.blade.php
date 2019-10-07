@extends('layout.default')
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
                    <h3 class="card-title">Modification</h3>
                    <p class="card-category">Utilisateurs</p>
                </div>
                <div class="card-body">
                                               
                        <form method="POST" action="{{ action('AdministrateursController@update', $id) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PATCH" />                         
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1"><b>Civilité</b></label>
                                    <select name="civilite" id="civilite" class="form-control">
                                            <option value="">--Selectionnez--</option>
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
                                    <label for="input-matricule"><b>Matricule:</b></label>
                                    <input type="text" name="matricule" class="form-control" id="input-matricule" placeholder="Matricule" value="{{ $administrateur->matricule }}">
                                    <small id="emailHelp" class="form-text text-muted">
                                            @if ($errors->has('matricule'))
                                            @foreach ($errors->get('matricule') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                            @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="input-prenom"><b>Prenom:</b></label>
                                <input type="text" name="prenom" class="form-control" id="input-prenom" placeholder="Prenom" value="{{ $utilisateur->firstname }}">
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
                                <input type="text" name="nom" class="form-control" id="input-nom" placeholder="Nom" value="{{ $utilisateur->name }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('nom'))
                                        @foreach ($errors->get('nom') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1"><b>Téléphone:</b></label>
                                <input type="text" name="telephone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telephone" value="{{ $utilisateur->telephone }}">
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('telephone'))
                                    @foreach ($errors->get('telephone') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                    @endif
                                </small>
                            </div> 
                    {{--  
                            <div class="form-group">
                                <label for="exampleInputEmail1"><b>Choisir un role:</b></label>
                                <select name="choixrole" id="choixrole" class="form-control">
                                        <option value="">Selectionnez un role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                    </select>
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('choixrole'))
                                    @foreach ($errors->get('choixrole') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                    @endif
                                </small>
                            </div>
                      --}}
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