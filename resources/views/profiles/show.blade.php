@extends('layout.default')

@section('content')
<div class="container">
    <div class="row mt-4">
       <div class="col-4 text-center">
            <img src="{{ asset(auth::user()->profile->getImage()) }}" class="rounded-circle w-100"/>
       </div>
       <div class="col-8">
            <div class="d-flex align-items-baseline">
            </div>
            <div class="d-flex mt-3">
            </div>            
            @can('update', auth::user()->profile)
            <a href="{{ route('profiles.edit', ['username'  => auth::user()->username]) }}" class="btn btn-outline-secondary mt-3">Modifier mon profile</a>             
            @endcan
            
            <div class="mt-3 d-flex">
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
           
            <div class="mt-3">
                <div class="mr-3"><b>{{ __("Nom d'utilisateur") }}:</b> {{ auth::user()->username }}</div>
                <div class="mr-3"><b>Adresse e-mail:</b> {{ auth::user()->email }}</div>
                <div class="mr-3"><b>Téléphone:</b> {{ auth::user()->telephone }}</div>
            </div>
        </div>
    </div>

    <div class="mt-5 row">
        @foreach (auth::user()->postes as $post)
        <div class="col-4 pb-3">
            <a href="{{ route('postes.show', ['poste' => $post->id ]) }}"><img src="{{ asset('storage').'/'.$post->image }}" class="w-100"/></a>
        </div>            
        @endforeach
    </div>
</div></div>
@endsection
