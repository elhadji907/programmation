@extends('layout.default')
@section('title', 'ONFP - Enregistrement projets')
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
                        <h3 class="card-title">{{ 'Enregistrement' }}</h3>
                        <p class="card-category">{{ "Secteur d'activité" }}</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('projets') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-8 col-lg-8 col-xs-12 col-sm-12">
                                    <label for="input-name"><b>{{ __('Nom du projet') }}:</b></label>
                                    <input type="text" name="name" class="form-control" id="input-name"
                                        placeholder="nom complète" value="{{ old('name') }}">
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('name'))
                                            @foreach ($errors->get('name') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="input-name"><b>{{ __('Sigle') }}:</b></label>
                                    <input type="text" name="sigle" class="form-control" id="input-sigle"
                                        placeholder="nom complète" value="{{ old('sigle') }}">
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('sigle'))
                                            @foreach ($errors->get('sigle') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Date début :', null, ['class' => 'control-label']) !!}
                                    {!! Form::date('debut', null, ['placeholder' => 'La date de démarrage', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('debut'))
                                            @foreach ($errors->get('debut') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Date fin :', null, ['class' => 'control-label']) !!}
                                    {!! Form::date('fin', null, ['placeholder' => 'La date de cloture', 'class' => 'form-control']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('fin'))
                                            @foreach ($errors->get('fin') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label for="input-name"><b>{{ __('Budjet') }}:</b></label>
                                    <input type="text" name="budjet" class="form-control" id="input-budjet"
                                        placeholder="Bdjet" value="{{ old('budjet') }}">
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('budjet'))
                                            @foreach ($errors->get('budjet') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
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
