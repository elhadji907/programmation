@extends('layout.default')
@section('title', 'ONFP - Enregistrement direction / service')
@section('content')
    <div class="container">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif
            <div class="row pt-5"></div>
            <div class="card">
                <div class="card-header card-header-primary text-center">
                    <h3 class="card-title">Enregistrement</h3>
                    <p class="card-category">Direction / Service</p>
                </div>
                <div class="card-body">
                    <div class="row pt-5 pl-5">
                        <h4>
                            <b>Responsable : </b>
                            {{ $employee->user->firstname . ' ' . $employee->user->name ?? 'Aucune direction choisie' }}<br />
                            <b>Fonction actuelle : </b> {{ $employee->fonction->sigle ?? 'Aucune fonction attribuée' }}
                        </h4>
                    </div>
                    <div class="row pt-5"></div>
                    <form method="POST" action="{{ url('directions') }}">
                        @csrf
                        <input type="hidden" name="employee" value="{{ $employee->id }}" class="form-control"
                            name="inputName" id="inputName" placeholder="">

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="input-direction"><b>Nom Direction:</b></label>
                                <input type="text" name="direction" class="form-control" id="direction"
                                    placeholder="Entrer nom direction" value="{{ old('direction') }}">
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('direction'))
                                        @foreach ($errors->get('direction') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="input-sigle"><b>sigle:</b></label>
                                <input type="text" name="sigle" class="form-control" id="sigle" placeholder="Entrer sigle"
                                    value="{{ old('sigle') }}">
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
                            <div class="form-group col-md-12">
                                {!! Form::label('Type direction :') !!}<span class="text-danger"> <b>*</b> </span>
                                {!! Form::select('type_direction', $types_directions, null, ['placeholder' => '', 'data-width' => '100%', 'class' => 'form-control', 'id' => 'type_direction']) !!}
                                <small id="emailHelp" class="form-text text-muted">
                                    @if ($errors->has('type_direction'))
                                        @foreach ($errors->get('type_direction') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                    @endif
                                </small>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"><i
                                class="far fa-paper-plane"></i>&nbsp;Enregistrer</button>
                    </form>
                    <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es saisies svp
                                    </h5>
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
@endsection
