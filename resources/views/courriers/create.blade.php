@extends('layout.default') 
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
</div
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
        <div class="card container"> 
            <div class="card-header">
                <i class="fas fa-table"></i>
                STATISTIQUE DES COURRIERS
            </div>              
        <div class="card-body">
             
        </div>
    </div>
    </div>
</div>
</div>
@endsection
