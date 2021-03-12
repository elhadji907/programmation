@extends('layout.default')
@section('title', 'ONFP - Modification opérateurs')
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
                        <h3 class="card-title">Modification opérateurs</h3>
                    </div>
                    <div class="card-body">                    
                        <b> NB </b> : Les champs<span class="text-danger"> <b>*</b> </span>sont obligatoires
                        {!! Form::open(['url' => 'operateurs/' . $operateurs->id, 'method' => 'PATCH', 'files' => true]) !!}
                            @csrf
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2 mt-0">INFORMATIONS GENERALES</p>
                            </div>
                           <div class="form-row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Numéro courrier :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('numero_courrier', $operateurs->numero, ['placeholder' => 'Le numéro du courrier',
                                'class' => 'form-control']) !!}
                            </div>                                              
                            <div class="form-group col-md-6">
                                {!! Form::label('Date dépot :', null, ['class' => 'control-label']) !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::date('date_depot', $operateurs->date_debut->format('Y-m-d'), ['placeholder' => 'La date de dépot', 'class' =>
                                'form-control']) !!}
                            </div> 
                           </div>
                             <div class="bg-gradient-secondary text-center">
                                 <p class="h4 text-white mb-2 mt-0">IDENTIFICATION DE LA STRUCTURE</p>
                             </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    {!! Form::label('Nom:') !!}<span class="text-danger"><b>*</b> </span>
                                    {!! Form::textarea('name', $operateurs->name, ['placeholder' => 'Le nom de la structure (opérateur)', 'rows' => 1, 'class' => 'form-control'])
                                    !!}
                                </div>                                
                                <div class="form-group col-md-2">
                                    {!! Form::label('Sigle :', null, ['class' => 'control-label']) !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::textarea('sigle', $operateurs->sigle, ['placeholder' => 'Le sigle', 'rows' => 1, 'class' =>
                                    'form-control']) !!}
                                </div>
                                <div class="form-group col-md-2">
                                    {!! Form::label('Type de structure :', null, ['class' => 'control-label']) !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('structure', $structures, $operateurs->structure->name, ['placeholder' =>
                                    '--sélectionnez--', 'class' => 'form-control', 'id' => 'structure']) !!}
                                </div>
                            </div>

                            <div class="form-row">                                
                                <div class="form-group col-md-4">
                                    {!! Form::label('Ninéa :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('ninea', $operateurs->ninea, ['placeholder' => 'Le ninea de votre structure', 'class' =>
                                    'form-control']) !!}
                                </div>                                
                                <div class="form-group col-md-4">
                                    {!! Form::label('Régistre :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('registre', $operateurs->registre, ['placeholder' => 'Le registre de commerce de votre établissement',
                                    'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Quitus :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('quitus', $operateurs->quitus, ['placeholder' => 'Le numéro du quitus fiscal de votre structure',
                                    'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    {!! Form::label('e-mail :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::email('email_s', $operateurs->email, ['placeholder' => 'Adresse e-mail de la structure', 'class' =>
                                    'form-control', 'id' => 'email_s']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Téléphone :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('telephone_s', $operateurs->telephone, ['placeholder' => 'Numero de telephone de la structure', 'class' =>
                                    'form-control']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Adresse :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::textarea('adresse_s', $operateurs->adresse, ['placeholder' => 'Adresse de la structure', 'rows' => 1,
                                    'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">INFORMATIONS SUR LE RESPONSABLE</p>
                            </div>                            
                            <div class="form-row">                                
                                <div class="form-group col-md-4">
                                    {!! Form::label('Civilité :', null, ['class' => 'control-label']) !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('civilite', $civilites, $utilisateurs->civilite, ['placeholder' => '--sélectionnez--',
                                    'class' => 'form-control', 'id' => 'civilite']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Prénom :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('prenom', $utilisateurs->firstname, ['placeholder' => 'Votre prénom', 'class' =>
                                    'form-control']) !!}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::label('Nom :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('nom', $utilisateurs->name, ['placeholder' => 'Votre nom', 'class' => 'form-control'])
                                    !!}
                                </div>  
                            </div>

                            <div class="form-row">                                  
                                <div class="form-group col-md-4">
                                    {!! Form::label('E-mail :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::email('email', $utilisateurs->email, ['placeholder' => 'Votre adresse e-mail', 'class' =>
                                    'form-control', 'id' => 'email']) !!}
                                </div>  
                                <div class="form-group col-md-4">
                                    {!! Form::label('Téléphone :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('telephone', $utilisateurs->telephone, ['placeholder' => 'Numero de telephone', 'class' =>
                                    'form-control']) !!}
                                </div>                                                                  
                                <div class="form-group col-md-4">
                                    {!! Form::label('Fonction :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('statut', $utilisateurs->status, ['placeholder' => 'Ex: Directeur', 'class' =>
                                    'form-control']) !!}
                                </div>                                                                                                                          
                             </div>
                             <div class="form-row">  
                             <div class="form-group col-md-4">
                                {!! Form::label('CIN :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::text('cin', $operateurs->cin, ['placeholder' => 'numéro de CIN', 'class' =>
                                'form-control']) !!}
                            </div>
                        </div>                 
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">MODULES DEMANDES</p>
                            </div>
                            <div class="form-row">                                
                                <div class="form-group col-md-12">
                                    {!! Form::label('module') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::select('modules[]', $modules, $operateurs->modules, ['placeholder' => 'choisir','class' =>
                                'form-control', 'id' => 'module']) !!}
                                </div> 
                            </div>
                            
                            <input type="hidden" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Mot de passe">
                        {!! Form::hidden('password', null, ['placeholder' => 'Votre mot de passe', 'class' =>
                        'form-control']) !!}
                        {!! Form::submit('Modifier', ['class' => 'btn btn-outline-primary pull-right']) !!}
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
