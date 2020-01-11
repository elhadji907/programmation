@extends('layout.default')
@section('title', 'ONFP - Cration courriers')
@section('content')
<div class="container">
    <!-- Standard buttons -->
    <div class="col-md-12">
        <a class="btn btn-info btn-block" href="{{ route('recues.index') }}"><span data-feather="book-open"></span> Courriers arrivés</a>
    </div>
    <br />
    <!-- Primary buttons -->
    <div class="col-md-12">
        <a class="btn btn-dark btn-block" href="{{ route('departs.index') }}"><span data-feather="book-open"></span> Courriers départs</a>
    </div>
    <br />
    <div class="col-md-12">
        <a class="btn btn-info btn-block" href="{{ route('internes.index') }}"><span data-feather="book-open"></span> Courriers internes</a>
    </div>
    <br />
    <!-- Primary buttons -->
    <div class="col-md-12">
        <a class="btn btn-dark btn-block" href="{{ route('demandeurs.index') }}"><span data-feather="book-open"></span>Courriers Demande</a>
    </div>
    <br />
</div
<hr />
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        <div class="card"> 
            <div class="card-header">
               {{--  <i class="fas fa-table"></i> --}}               
               <img src="{{ asset("img/stats_15267.png") }}" class="w-5"/>
                Statistiques des courriers
            </div>             
        <div class="card-body">
            {!! $chart->container() !!}
        </div>
      </div>
    </div>          
</div>
<hr />
@endsection


@push('scripts')
{!! $chart->script() !!}
@endpush
