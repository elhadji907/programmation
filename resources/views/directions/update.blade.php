@extends('layout.default')
@section('title', 'ONFP - Modification directions!')
@section('content')
    <div class="container">
        <div class="container-fluid">
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
                        <form method="POST" action="{{  action('DirectionsController@update', $id) }}">
                            @csrf            
                            <input type="hidden" name="_method" value="PATCH" />
                            <div class="form-group">
                                <label for="input-direction"><b>Direction / Service:</b></label>
                                <input type="text" name="direction" class="form-control" id="input-direction" placeholder="Entrer le nom de la direction ou du service" value="{{ $direction->name }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('direction'))
                                        @foreach ($errors->get('direction') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="input-sigle"><b>sigle:</b></label>
                                <input type="text" name="sigle" class="form-control" id="input-sigle" placeholder="Entrer le sigle(abréviation) de la direction ou du service" value="{{ $direction->sigle }}">
                                <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('sigle'))
                                        @foreach ($errors->get('sigle') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                </small>
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