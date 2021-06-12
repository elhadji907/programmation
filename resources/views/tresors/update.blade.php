@extends('layout.default')
@section('title', 'ONFP - Modification recette trésor')
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
                        <h3 class="card-title">Modification recette trésor</h3>
                    </div>
                    <div class="card-body">
                       <b> NB </b> : Les champs (<span class="text-danger"> <b>*</b> </span>) sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">INFORMATIONS</p>
                        </div>
                        {!! Form::open(['url'=>'tresors/'.$tresor->id, 'method'=>"PATCH", 'files' => true]) !!}
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {!! Form::label('Objet') !!}       <span class="text-danger"> <b>*</b> </span>             
                                    {!! Form::textarea('objet', $tresor->courrier->objet, ['placeholder'=>'', 'class'=>'form-control','rows' => 2, 'id'=>'objets']) !!}                    
                                </div> 
                            </div>
                                    
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    {!! Form::label('Expéditeur') !!}  <span class="text-danger"> <b>*</b> </span>                  
                                    {!! Form::text('expediteur', $tresor->courrier->expediteur, ['placeholder'=>"Nom et prénom de l'expéditeur", 'class'=>'form-control']) !!}                    
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Adresse e-mail') !!} <span class="text-danger"> <b>*</b> </span>                   
                                    {!! Form::email('email', $tresor->courrier->email, ['placeholder'=>'Votre adresse e-mail', 'class'=>'form-control', 'id'=>'email']) !!}                    
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Téléphone') !!}<span class="text-danger"> <b>*</b> </span>                    
                                    {!! Form::text('telephone', $tresor->courrier->telephone, ['placeholder'=>"Votre numero de téléphone", 'class'=>'form-control']) !!}                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    {!! Form::label('Numéro mandat :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('numero_mandat', $tresor->numero_mandat, ['placeholder' => 'Le numéro du mandat', 'class' => 'form-control'])
                                    !!}
                                </div>                                
                                <div class="form-group col-md-3">
                                    {!! Form::label('Date de mandatement :', null, ['class' => 'control-label']) !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::date('date_mandat', Carbon\Carbon::parse( $tresor->date_mandat)->format('Y-m-d'), ['placeholder' => 'La date de naissance', 'class' =>
                                    'form-control']) !!}
                                </div>
                                <div class="form-group col-md-3">
                                    {!! Form::label('Montant :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('montant',  $tresor->montant, ['placeholder' => 'Le montant en F CFA', 'class' =>
                                    'form-control']) !!}
                                </div>
                                <div class="form-group col-md-3">
                                    {!! Form::label('Nombre de pièces :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::number('nombre_de_piece',  $tresor->nombre_de_piece, ['placeholder' => 'Le nombre de pièces', 'class' =>
                                    'form-control', 'min'=>'0','max'=>'100']) !!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('Désignation :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::textarea('designation', $tresor->designation, ['placeholder' => 'Désignation pour le réglement', 'rows' => 5,
                                    'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    {!! Form::label('Observations :') !!}
                                    {!! Form::textarea('observation', $tresor->observation, ['placeholder' => 'observations éventuelles', 'rows' => 5,
                                    'class' => 'form-control']) !!}
                                </div>
                            </div>                           
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    {!! Form::label('', null, ['class' => 'control-label']) !!}                    
                                    {!! Form::file('file', null, ['class'=>'form-control-file']) !!}
                                    @if ($tresor->courrier->file !== "")
                                    <a class="btn btn-outline-secondary mt-2" title="télécharger le fichier joint" target="_blank" href="{{ asset($tresor->courrier->getFile()) }}">
                                        <i class="fas fa-download">&nbsp;Télécharger le courrier</i>
                                    </a>
                                    @endif             
                                </div>
                                <div class="form-group col-md-6">                
                                    {!! Form::text('legende', $tresor->courrier->legende, ['placeholder'=>'attribué un nom du fichier joint', 'class'=>'form-control']) !!}                    
                                </div> 
                            </div>
                           
                            {!! Form::submit('Enregistrer', ['class'=>'btn btn-outline-primary pull-right', ]) !!}
                            {!! Form::close() !!}
                        
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