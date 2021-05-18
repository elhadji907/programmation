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
                        <form method="POST" action="{{ url('dafs') }}">
                            @csrf
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
                       </div>
                </div>
            </div>
        </div>
    </div>
@endsection
