@extends('layout.default')
@section('title', 'ONFP - Fiche Courier reçu')
@section('content')
    @foreach ($internes as $interne)  
        <div class="container">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{!! $interne->courrier->types_courrier->name !!}</h5>
                        <h5 class="card-category">{!! $interne->courrier->objet !!}</h5>
                        <p>{{ $interne->courrier->message }}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <small>Posté le {!! $interne->courrier->created_at->format('d/m/Y à H:m') !!}</small>
                            <span class="badge badge-primary">{!! $interne->courrier->user->firstname !!}</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-5">
                            <a href="{!! url('internes/' .$interne->id. '/edit') !!}" title="modifier" class="btn btn-outline-warning">
                                <i class="far fa-edit">&nbsp;Modifier</i>
                            </a>
                            <a href="{!! url('courriers/' .$interne->courrier->id. '/edit') !!}" title="voir les d&eacute;tails du courrier" class="btn btn-outline-primary">
                                <i class="far fa-eye">&nbsp;D&eacute;tails</i>
                            </a>
                            {{--  <a href="{!! url('courriers/' .$interne->courrier->id. '/edit') !!}" title="supprimer" class="btn btn-outline-danger">
                                <i class="far fa-edit">&nbsp;Supprimer</i>
                            </a>  --}}
                            {!! Form::open(['method'=>'DELETE', 'url'=>'internes/' .$interne->id, 'id'=>'deleteForm']) !!}
                            {!! Form::button('<i class="fa fa-trash">&nbsp;Supprimer</i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger', 'title'=>"supprimer"] ) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection