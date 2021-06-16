@extends('layout.default')
@section('title', 'ONFP - '.$projet->sigle)
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
                        <h3 class="card-title">{{ $projet->name }}</h3>
                        <p class="card-category">{{ $projet->sigle }}</p>
                    </div>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-8 col-lg-8 col-xs-12 col-sm-12">
                                    <label for="input-name"><b>{{ __('Nom du projet') }}:</b></label>
                                    <input type="text" name="name" class="form-control" id="input-name"
                                        placeholder="nom complète" value="{{ old('name') ?? $projet->name }}" disabled>
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('name'))
                                            @foreach ($errors->get('name') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                    <label for="input-name"><b>{{ __('Sigle') }}:</b></label>
                                    <input type="text" name="sigle" class="form-control" id="input-sigle"
                                        placeholder="nom complète" value="{{ old('sigle') ?? $projet->sigle }}" disabled>
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('sigle'))
                                            @foreach ($errors->get('sigle') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Date début :', null, ['class' => 'control-label']) !!}
                                    {!! Form::date('debut', Carbon\Carbon::parse($projet->debut)->format('Y-m-d'), ['placeholder' => 'La date de démarrage', 'class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('debut'))
                                            @foreach ($errors->get('debut') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                    {!! Form::label('Date fin :', null, ['class' => 'control-label']) !!}
                                    {!! Form::date('fin', Carbon\Carbon::parse($projet->fin)->format('Y-m-d'), ['placeholder' => 'La date de cloture', 'class' => 'form-control', 'disabled' => 'disabled']) !!}
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('fin'))
                                            @foreach ($errors->get('fin') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <label for="input-name"><b>{{ __('Budjet') }}:</b></label>
                                    <input type="text" name="budjet" class="form-control" id="input-budjet"
                                        placeholder="Bdjet" value="{{ old('budjet') ?? number_format($projet->budjet,0, ',', ' ') . ' ' }}" disabled>
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('budjet'))
                                            @foreach ($errors->get('budjet') as $message)
                                                <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
