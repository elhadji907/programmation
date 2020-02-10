@extends('layout.default')
@section('title', 'ONFP - Fiche Courier reçu')
@section('content')
    @foreach ($recues as $recue)  
        <div class="container">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{!! $recue->courrier->types_courrier->name !!}</h5>
                        <h5 class="card-category">{!! $recue->courrier->objet !!}</h5>
                        <p>{{ $recue->courrier->message }}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <small>Posté le {!! $recue->courrier->created_at->format('d/m/Y à H:m') !!}</small>
                            <span class="badge badge-primary">{!! $recue->courrier->user->firstname !!}</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-5">
                            <a href="{!! url('recues/' .$recue->id. '/edit') !!}" title="modifier" class="btn btn-outline-warning">
                                <i class="far fa-edit">&nbsp;Modifier</i>
                            </a>
                            <a href="{!! url('courriers/' .$recue->courrier->id. '/edit') !!}" title="voir les d&eacute;tails du courrier" class="btn btn-outline-warning">
                                <i class="far fa-edit">&nbsp;D&eacute;tails</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection