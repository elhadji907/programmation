@extends('layout.default')
@section('title', 'ONFP - Enregistrement demandeur individuelle')
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
                        <h3 class="card-title">Enregistrement demandeur individuelle</h3>
                    </div>
                    <div class="card-body">
                        <b> NB </b> : Les champs<span class="text-danger"> <b>*</b> </span>sont obligatoires
                        <div class="bg-gradient-secondary text-center">
                            <p class="h4 text-white mb-2 mt-0">IDENTIFICATION</p>
                        </div>
                        <form method="POST" action="{{ url('individuelles') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Cin :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('cin', null, ['placeholder' => 'Votre numéro national d\'identité', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('cin'))
                                            @foreach ($errors->get('cin') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Prénom :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('prenom', null, ['placeholder' => 'Votre prénom', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('prenom'))
                                            @foreach ($errors->get('prenom') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Nom :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('nom', null, ['placeholder' => 'Votre nom', 'class' => 'form-control']) !!}
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
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Date naissance :', null, ['class' => 'control-label']) !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::date('date_naiss', null, ['placeholder' => 'La date de naissance', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('date_naiss'))
                                            @foreach ($errors->get('date_naiss') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Lieu naissance :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('lieu', null, ['placeholder' => 'Votre lieu de naissance', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('lieu'))
                                            @foreach ($errors->get('lieu') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('e-mail :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::email('email', null, ['placeholder' => 'Votre adresse e-mail', 'class' => 'form-control', 'id' => 'email']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('email'))
                                            @foreach ($errors->get('email') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Téléphone portable :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('telephone', null, ['placeholder' => 'Numero de telephone', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('telephone'))
                                            @foreach ($errors->get('telephone') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Téléphone fixe :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('fixe', null, ['placeholder' => 'Numero de téléphone fixe', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('fixe'))
                                            @foreach ($errors->get('fixe') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Adresse :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::textarea('adresse', null, ['placeholder' => 'Votre adresse', 'rows' => 1, 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('adresse'))
                                            @foreach ($errors->get('adresse') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Civilité :', null, ['class' => 'control-label']) !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('civilite', $civilites, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'civilite', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('civilite'))
                                            @foreach ($errors->get('civilite') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Situation familiale :') !!}
                                    {!! Form::select('familiale', ['Marié' => 'Marié', 'Célibataire' => 'Célibataire'], null, ['placeholder' => 'Votre situation familiale', 'class' => 'form-control', 'id' => 'familiale', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('familiale'))
                                            @foreach ($errors->get('familiale') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    {!! Form::label('Situation professionnelle :') !!}
                                    {!! Form::select('professionnelle', ['Employé' => 'Employé', 'Recherche emploi' => 'Recherche emploi'], null, ['placeholder' => 'Votre situation professionnelle', 'class' => 'form-control', 'id' => 'professionnelle', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('professionnelle'))
                                            @foreach ($errors->get('professionnelle') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Région :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('region', $regions, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'region', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('region'))
                                            @foreach ($errors->get('region') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Département :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('departement', $departements, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'departement', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('departement'))
                                            @foreach ($errors->get('departement') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">DEMANDE</p>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Numéro courrier :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::text('numero_courrier', null, ['placeholder' => 'Le numéro du courrier', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('numero_courrier'))
                                            @foreach ($errors->get('numero_courrier') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Date dépot :', null, ['class' => 'control-label']) !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::date('date_depot', null, ['placeholder' => 'La date de dépot', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('date_depot'))
                                            @foreach ($errors->get('date_depot') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                {{-- <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label("Type demande :") !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('type_demande', $types_demandes, null, ['placeholder' => '--sélectionnez--', 'class' =>
                                    'form-control', 'id' => 'type_demande']) !!}
                                </div> --}}
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('module :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('modules[]', $modules, null, ['placeholder' => '', 'class' => 'form-control', 'id' => 'module', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('modules'))
                                            @foreach ($errors->get('modules') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                {{-- <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label("Niveau d'etude :") !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('niveaux', $niveaux, null, ['placeholder' => '', 'class' =>
                                    'form-control', 'id' => 'niveau']) !!}
                                </div> --}}

                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Diplômes :') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('diplomes[]', $diplomes, null, ['placeholder' => 'diplome', 'class' => 'form-control', 'id' => 'diplome', 'data-width' => '100%']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('diplomes'))
                                            @foreach ($errors->get('diplomes') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>

                            </div>
                            {{-- <div class="form-row">
                            <div class="form-group col-md-12">
                                {!! Form::label('Projet :') !!}
                                {!! Form::textarea('projet', null, ['placeholder' => 'Décrire en quelques lignes votre projet professionnel...', 'rows' => 4,
                                'class' => 'form-control']) !!}
                            </div>
                        </div> --}}
                            {{-- <div class="form-row">
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label('Expérience :') !!}
                                {!! Form::textarea('experience', null, ['placeholder' => 'Votre expérience', 'rows' => 3,
                                'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label('Information :') !!}
                                {!! Form::textarea('information', null, ['placeholder' => 'Informations complémentaires', 'rows' => 3,
                                'class' => 'form-control']) !!}
                            </div>
                        </div> --}}
                            <div class="bg-gradient-secondary text-center">
                                <p class="h4 text-white mb-2">INSCRIVEZ-VOUS A UN PROGRAMME</p>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    {!! Form::label('Programme :') !!}
                                    {!! Form::select('programme', $programmes, null, ['placeholder' => 'sélectionner un programme', 'class' => 'form-control', 'id' => 'programme', 'data-width' => '100%']) !!}
                                </div>


                                {{-- <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                {!! Form::label("localité :") !!}
                                {!! Form::select('localite', $localites, null, ['placeholder' => '', 'class' =>
                                'form-control', 'id' => 'localite']) !!}
                            </div> --}}

                            </div>

                            <span>Product Category: </span>
                            <select style="width: 200px" class="productcategory" id="prod_cat_id">

                                <option value="0" disabled="true" selected="true">-Select-</option>
                                @foreach ($prod as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->nom }}</option>
                                @endforeach

                            </select>

                            <span>Product Name: </span>
                            <select style="width: 200px" class="productname">

                                <option value="0" disabled="true" selected="true">Product Name</option>
                            </select>


                            <input type="hidden" name="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Mot de passe">
                            {!! Form::hidden('password', null, ['placeholder' => 'Votre mot de passe', 'class' => 'form-control']) !!}
                            <button type="submit" class="btn btn-primary"><i
                                    class="far fa-paper-plane"></i>&nbsp;Enregistrer</button>
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

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('change', '.productcategory', function() {
                // console.log("hmm its change");

                var cat_id = $(this).val();
                // console.log(cat_id);
                var div = $(this).parent();

                var op = " ";

                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('findProductName') !!}',
                    data: {
                        'id': cat_id
                    },
                    success: function(data) {
                        //console.log('success');

                        //console.log(data);

                        //console.log(data.length);
                        op += '<option value="0" selected disabled>chose product</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].nom +
                                '</option>';
                        }

                        div.find('.productname').html(" ");
                        div.find('.productname').append(op);
                    },
                    error: function() {

                    }
                });
            });

            $(document).on('change', '.productname', function() {
                var prod_id = $(this).val();

                var a = $(this).parent();
                console.log(prod_id);
                var op = "";
                $.ajax({
                    type: 'get',
                    url: '{!! URL::to('findPrice') !!}',
                    data: {
                        'id': prod_id
                    },
                    dataType: 'json', //return data will be json
                    success: function(data) {
                        console.log("price");
                        console.log(data.price);

                        // here price is coloumn name in products table data.coln name

                        a.find('.prod_price').val(data.price);

                    },
                    error: function() {

                    }
                });


            });

        });
    </script>


@endpush
