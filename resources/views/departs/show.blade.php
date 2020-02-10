@extends('layout.default')
@section('title', 'ONFP - Fiche Couriers departs')
@section('content')
    @foreach ($departs as $depart)  
        <div class="container">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{!! $depart->courrier->types_courrier->name !!}</h5>
                        <h5 class="card-category">{!! $depart->courrier->objet !!}</h5>
                        <p>{{ $depart->courrier->message }}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <small>Posté le {!! $depart->courrier->created_at->format('d/m/Y à H:m') !!}</small>
                            <span class="badge badge-primary">{!! $depart->courrier->user->firstname !!}&nbsp;{!! $depart->courrier->user->name !!}</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-5">
                            @can('update', $depart->courrier)
                            <a href="{!! url('departs/' .$depart->id. '/edit') !!}" title="modifier" class="btn btn-outline-warning">
                                <i class="far fa-edit">&nbsp;Modifier</i>
                            </a>
                            @endcan 
                            <a href="{!! url('courriers/' .$depart->courrier->id. '/edit') !!}" title="voir les d&eacute;tails du courrier" class="btn btn-outline-primary">
                                <i class="far fa-eye">&nbsp;D&eacute;tails</i>
                            </a>
                            {{--  <a href="{!! url('courriers/' .$depart->courrier->id. '/edit') !!}" title="supprimer" class="btn btn-outline-danger">
                                <i class="far fa-edit">&nbsp;Supprimer</i>
                            </a>  --}}
                            @can('delete', $depart->courrier)
                            {!! Form::open(['method'=>'DELETE', 'url'=>'departs/' .$depart->id, 'id'=>'deleteForm']) !!}
                            {!! Form::button('<i class="fa fa-trash">&nbsp;Supprimer</i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger', 'title'=>"supprimer"] ) !!}
                            {!! Form::close() !!}
                            @endcan 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection