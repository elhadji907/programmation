@extends('layout.default')

@section('content')
<div class="container">
    @roles('Administrateur|Courrier')
    <div class="list-group mt-5">
        @foreach ($courriers as $courrier) 
        <div class="list-group-item">
            <h4><a href="{!! route('courriers.show', $courrier->id) !!}">{!! $courrier->objet !!}</a></h4>
            <p>{!! $courrier->message !!}</p>
            <p><strong>Type de courrier : </strong> {!! $courrier->types_courrier->name !!}</p>
            <div class="d-flex justify-content-between align-items-center">
                <small>Posté le {!! $courrier->created_at->format('d/m/Y à H:m') !!}</small>
                <span class="badge badge-primary">{!! $courrier->user->firstname !!}&nbsp;{!! $courrier->user->name !!}</span>
            </div>
        </div>
        @endforeach 
    </div>
    <div class="d-flex justify-content-center pt-2">
        {!! $courriers->links() !!}
    </div>
    @endroles
</div>
@endsection
