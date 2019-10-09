@extends('layout.default') 
@section('content')
<div class="container">
    <!-- Standard buttons -->
    <div class="col-md-12">
        <a class="btn btn-info btn-block" href="{{ route('arrives.show') }}"><span data-feather="book-open"></span> Courriers arrivés</a>
    </div>
    <br />
    <!-- Primary buttons -->
    <div class="col-md-12">
        <a class="btn btn-dark btn-block" href="#"><span data-feather="book-open"></span> Courriers départs</a>
    </div>
    <br />
    <div class="col-md-12">
        <a class="btn btn-info btn-block" href="#"><span data-feather="book-open"></span> Courriers internes</a>
    </div>
</div>

@endsection
