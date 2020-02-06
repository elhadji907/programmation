@extends('layout.default')

@section('content')
<div class="container">
    <div class="row mt-4">
       <div class="col-4 text-center">
            <img src="{{ asset(auth::user()->profile->getImage()) }}" class="rounded-circle w-50"/>
       </div>
       <div class="col-8">
            @can('update', $user->profile)
                   
            <div class="mt-3 d-flex">
                <div class="mr-1"><b>{{ auth::user()->civilite }}</b></div>
                <div class="mr-1"><b>{{ auth::user()->firstname }}</b></div>
                <div class="mr-1"><b>{{ auth::user()->name }}</b></div>

                @if (auth::user()->civilite=="M.")
                    <div class="mr-1"><b>né le</b></div>
                @endif 
                @if (auth::user()->civilite=="Mme")                                  
                    <div class="mr-1"><b>née le</b></div>
                @endif                
                @if (auth::user()->date_naissance!==NULL)
                    <div class="mr-1"><b>{{ auth::user()->date_naissance->format('d M Y')}}</b></div>
                @endif
                @if (auth::user()->lieu_naissance!==NULL)
                <div class="mr-1"><b>à</b></div>
                <div class="mr-1"><b>{{ auth::user()->lieu_naissance }}</b></div>
                @endif
            </div>
    
            <div class="mt-0">
                <div class="mr-3"><b>{{ __("Nom d'utilisateur") }}:</b> {{ auth::user()->username }}</div>
                <div class="mr-3"><b>Adresse e-mail:</b> {{ auth::user()->email }}</div>
                <div class="mr-3"><b>Téléphone:</b> {{ auth::user()->telephone }}</div>
            </div>
            <a href="{{ route('profiles.edit', ['username'  => auth::user()->username]) }}" 
                class="btn btn-outline-secondary mt-3">Modifier mon profile</a>             
            @endcan 
        </div>
    </div>

    <div class="list-group mt-5">
        @foreach ($courriers as $courrier) 
        <div class="list-group-item">
            <h4><a href="#">{!! $courrier->objet !!}</a></h4>
            <p>{!! $courrier->message !!}</p>
            <div class="d-flex justify-content-between align-items-center">
                <small>Posté le {!! $courrier->created_at->format('d/m/Y à H:m') !!}</small>
                <span class="badge badge-primary">{!! $courrier->user->firstname !!}</span>
            </div>
        </div>
        @endforeach 
    </div>
    <div class="d-flex justify-content-center pt-2">
        {!! $courriers->links() !!}
    </div>
</div></div>
@endsection
