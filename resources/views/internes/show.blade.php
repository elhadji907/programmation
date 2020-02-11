@extends('layout.default')
@section('title', 'ONFP - Fiche Couriers internes')
@section('content') 
        <div class="container">
            <div class="container-fluid">
                <div class="card">
                    @foreach ($internes as $interne) 
                    <div class="card-body">
                        <h3 class="card-title">{!! $interne->courrier->types_courrier->name !!}</h5>
                        <h5 class="card-category">{!! $interne->courrier->objet !!}</h5>
                        <p>{{ $interne->courrier->message }}</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <small>Posté le {!! $interne->courrier->created_at->format('d/m/Y à H:m') !!}</small>
                            <span class="badge badge-primary">{!! $interne->courrier->user->firstname !!}&nbsp;{!! $interne->courrier->user->name !!}</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-5">
                            @can('update', $interne->courrier)  
                            <a href="{!! url('internes/' .$interne->id. '/edit') !!}" title="modifier" class="btn btn-outline-warning">
                                <i class="far fa-edit">&nbsp;Modifier</i>
                            </a>
                            @endcan 
                            <a href="{!! url('courriers/' .$interne->courrier->id. '/edit') !!}" title="voir les d&eacute;tails du courrier" class="btn btn-outline-primary">
                                <i class="far fa-eye">&nbsp;D&eacute;tails</i>
                            </a>
                            {{--  <a href="{!! url('courriers/' .$interne->courrier->id. '/edit') !!}" title="supprimer" class="btn btn-outline-danger">
                                <i class="far fa-edit">&nbsp;Supprimer</i>
                            </a>  --}}
                            @can('delete', $interne->courrier)  
                            {!! Form::open(['method'=>'DELETE', 'url'=>'internes/' .$interne->id, 'id'=>'deleteForm']) !!}
                            {!! Form::button('<i class="fa fa-trash">&nbsp;Supprimer</i>', ['type' => 'submit', 'class' => 'btn btn-outline-danger', 'title'=>"supprimer"] ) !!}
                            {!! Form::close() !!}
                            @endcan 
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <hr>

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Commentaires</h5>
                            @forelse ($interne->courrier->comments as $comment)
                            <div class="card mt-2">
                                <div class="card-body">
                                    {!! $comment->content !!}
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <small>Posté le {!! $comment->created_at->format('d/m/Y') !!}</small>
                                        <span class="badge badge-primary">{!! $comment->user->firstname !!}&nbsp;{!! $comment->user->name !!}</span>
                                    </div>
                                </div>
                            </div>
                            @empty

                            <div class="alert alert-info">Aucun commentaire pour ce courrier</div>
                                
                            @endforelse
                            <form method="POST" action="{{ route('comments.store', $interne->courrier->id) }}" class="mt-3">
                                @csrf                                                         
                                 <div class="form-group">
                                     <label for="commentaire"><b>Votre commentaire</b></label>                                   
                                     <textarea class="form-control @error('commentaire') is-invalid @enderror" name="commentaire" id="commentaire" rows="5" placeholder="Ecrire votre commentaire"></textarea>                                     
                                     <small id="emailHelp" class="form-text text-muted">
                                             @if ($errors->has('commentaire'))
                                             @foreach ($errors->get('commentaire') as $message)
                                             <p class="text-danger">{{ $message }}</p>
                                             @endforeach
                                             @endif
                                     </small>
                                 </div>
                                <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>&nbsp;Poster</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
@endsection