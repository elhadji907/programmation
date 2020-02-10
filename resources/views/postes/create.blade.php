@extends('layout.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Créer un post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('postes.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                        <label for="legende">Légende</label>                            
                            <input id="legende" type="text" class="form-control @error('legende') is-invalid @enderror" name="legende" value="{{ old('legende') }}" autocomplete="legende" autofocus>
                           
                            @error('legende')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Chisir une image...</label>                                

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Créer mon post') }}
                        </button>
                          
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
