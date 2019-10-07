@extends('layout.default')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-8">
            <img src="{{ asset('storage').'/'.$poste->image }}" class="w-100"/>
    </div>
    <div class="col-4">
       <h3>{{ $poste->user->username }}</h3>
       <p>
           {{ $poste->legende }}
       </p>
    </div>
</div>
@endsection
