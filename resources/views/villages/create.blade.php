@extends('layout.default')

@section('content')
<div class="row">
 <div class="container col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
  <br />
  <h3 aling="center">Ajouter un nouveau village</h3>
  <br />
  @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif
  <form method="post" action="{{url('villages')}}">
   {{csrf_field()}}
   <div class="form-group">
    <label class="control-label"><b>Nom du Village:</b></label>
    <input type="text" name="nom_du_village" class="form-control" value="{{ old('nom_du_village') }}" placeholder="Entrer le nom du village" />
   </div>
   <div class="form-group">
        <label class="control-label"><b>Nom du chef de Village:</b></label>
    <input type="text" name="nom_du_chef_de_village" class="form-control" value="{{ old('nom_du_chef_de_village') }}" placeholder="Entrer le nom du chef de village" />
   </div>
   <div class="form-group">
        <label class="control-label"><b>Nom de la commune:</b></label>
    <input type="text" name="nom_de_la_commune" class="form-control" value="{{ old('nom_de_la_commune') }}" placeholder="Entrer le nom de la commune" />
   </div>
   <div class="form-group">
    <input type="submit" value="Enregistrer" class="btn btn-primary" />
   </div>
  </form>
 </div>
</div>
@endsection