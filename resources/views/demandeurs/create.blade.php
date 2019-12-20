@extends('layout.default')
@section('content')
<div class="content">
    <div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif                    
            <div class="row pt-5"></div>
            <div class="card">
                <div class="card-header card-header-primary text-center">
                    <h3 class="card-title">Enregistrement</h3>
                    <p class="card-category">demandeurs</p>
                </div>
                <div class="card-body">                                               
                        <form method="POST" action="{{ url('demandeurs') }}">
                           @csrf                                    
                        <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="objet"><b>Objet:</b></label>
                                    <select name="objet" id="objet" class="form-control @error('objet') is-invalid @enderror" value="{{ old('objet') }}">
                                    @foreach($objets as $objet)
                                        <option value="{{ $objet->name }}">{{ $objet->name }}</option>
                                    @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ $errors->first('objet') }}
                                    </div>
                                </div>               
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="input-cin"><b>Numero CIN:</b></label>
                                    <input type="text" name="cin" class="form-control" id="input-cin" placeholder="numero cin" value="{{ old('cin') }}">
                                    <small id="emailHelp" class="form-text text-muted">
                                            @if ($errors->has('cin'))
                                            @foreach ($errors->get('cin') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                            @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date_r"><b>Date de dépôt:</b></label>
                                    <input class="form-control {{ $errors->has('date_r') ? 'is-invalid' : '' }}" type="date" value="{{ $date }}" name="date_r" placeholder="date réception courrier..."
                                        id="date_r" value="{{ old('date_r') }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('date_r') }}
                                    </div>
                                </div> 
                            </div>                        
                        <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>&nbsp;Enregistrer</button>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection