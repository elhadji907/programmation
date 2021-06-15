@extends('layout.default')
@section('title', 'ONFP - Modification directions')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                @endif
                <div class="row pt-5"></div>
                <div class="card">
                    <div class="card-header card-header-primary text-center">
                        <h3 class="card-title">Modification</h3>
                        <p class="card-category">Direction / Service</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ action('DirectionsController@update', $id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH" />
                            <div class="row">
                                <div class="form-group col col-md-12 col-lg-8 col-xs-12 col-sm-12">
                                    <label for="input-direction"><b>Direction / Service:</b></label>
                                    <input type="text" name="direction" class="form-control" id="input-direction"
                                        placeholder="Entrer nom direction" value="{{ $directions->name }}">
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('direction'))
                                            @foreach ($errors->get('direction') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-12 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="input-sigle"><b>sigle:</b></label>
                                    <input type="text" name="sigle" class="form-control" id="input-sigle"
                                        placeholder="Entrer sigle" value="{{ $directions->sigle }}">
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('sigle'))
                                            @foreach ($errors->get('sigle') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    {!! Form::label('Type direction') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('type_direction', $types_directions, $directions->types_direction->name, ['placeholder' => '', 'data-width'=>'100%', 'class' => 'form-control', 'id' => 'type_direction']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('type_direction'))
                                            @foreach ($errors->get('type_direction') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    {!! Form::label('Responsable') !!}<span class="text-danger"> <b>*</b> </span>
                                    {!! Form::select('employee', $employees, $directions->chef->matricule, ['placeholder' => '', 'data-width'=>'100%', 'class' => 'form-control', 'id' => 'employee']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('employee'))
                                            @foreach ($errors->get('employee') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            &nbsp;
                            &nbsp;
                            <button type="submit" class="btn btn-outline-primary float-right"><i
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
