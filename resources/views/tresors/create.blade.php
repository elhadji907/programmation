@extends('layout.default')
@section('title', 'ONFP - Enregistrement bordereaux ')
@section('content')
    <div class="content">
        <div class="container col-12 col-md-12 col-lg-8 col-xl-12">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                <div class="row pt-0"></div>
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="card-title">Enregistrement bordereaux</h3>
                    </div>
                    <div class="card-body">
                       <b> NB </b> : Les champs (<span class="text-danger"> <b>*</b> </span>) sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">INFORMATIONS</p>
                        </div>
                        <form method="POST" action="{{ url('bordereaus') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {!! Form::label('Objet') !!}       <span class="text-danger"> <b>*</b> </span>             
                                    {!! Form::textarea('objet', null, ['placeholder'=>'', 'class'=>'form-control','rows' => 2, 'id'=>'objets']) !!}                    
                                </div> 
                            </div>
                                    
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    {!! Form::label('Expéditeur') !!}  <span class="text-danger"> <b>*</b> </span>                  
                                    {!! Form::text('expediteur', null, ['placeholder'=>"Nom et prénom de l'expéditeur", 'class'=>'form-control']) !!}                    
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Adresse e-mail') !!} <span class="text-danger"> <b>*</b> </span>                   
                                    {!! Form::email('email', null, ['placeholder'=>'Votre adresse e-mail', 'class'=>'form-control', 'id'=>'email']) !!}                    
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Téléphone') !!}<span class="text-danger"> <b>*</b> </span>                    
                                    {!! Form::text('telephone', null, ['placeholder'=>"Votre numero de téléphone", 'class'=>'form-control']) !!}                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    {!! Form::label('Numéro mandat :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('numero_mandat', null, ['placeholder' => 'Le numéro du mandat', 'class' => 'form-control'])
                                    !!}
                                </div>                                
                                <div class="form-group col-md-3">
                                    {!! Form::label('Date de mandatement :', null, ['class' => 'control-label']) !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::date('date_mandat', null, ['placeholder' => 'La date de naissance', 'class' =>
                                    'form-control']) !!}
                                </div>
                                <div class="form-group col-md-3">
                                    {!! Form::label('Montant :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('montant', null, ['placeholder' => 'Le montant en F CFA', 'class' =>
                                    'form-control']) !!}
                                </div>
                                <div class="form-group col-md-3">
                                    {!! Form::label('Nombre de pièces :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::number('nombre_de_piece', null, ['placeholder' => 'Le nombre de pièces', 'class' =>
                                    'form-control', 'min'=>'0','max'=>'100']) !!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('Désignation :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::textarea('designation', null, ['placeholder' => 'Désignation pour le réglement', 'rows' => 5,
                                    'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('Observations :') !!}
                                    {!! Form::textarea('observation', null, ['placeholder' => 'observations éventuelles', 'rows' => 5,
                                    'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-row">
                                
                            </div>
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">PROJET</p>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {!! Form::label('Projet :', null, ['class' => 'control-label']) !!}
                                    {!! Form::select('projet', $projets, null, ['placeholder' => '',
                                    'class' => 'form-control', 'id' => 'projet']) !!}
                                </div>                               
                            </div>
                            <button type="submit" class="btn btn-primary float-right"><i class="far fa-paper-plane"></i>&nbsp;Enregistrer</button>
                        </form>
                        
                        <div class="modal fade" id="error-modal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es saisies
                                            svp</h5>
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
                                                    $(document).ready(function() {
                                                        $("#error-modal").modal({
                                                            'show': true,
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
