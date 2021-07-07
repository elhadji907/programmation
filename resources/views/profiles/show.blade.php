@extends('layout.default')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-4 text-center">
                <img src="{{ asset(auth::user()->profile->getImage()) }}" class="rounded-circle w-50" />
            </div>
            <div class="col-8">
                @can('update', $user->profile)
                    <div class="mt-3 d-flex">
                        <div class="mr-1"><b>{{ auth::user()->civilite }}</b></div>
                        <div class="mr-1"><b>{{ auth::user()->firstname }}</b></div>
                        <div class="mr-1"><b>{{ auth::user()->name }}</b></div>

                        @if (auth::user()->civilite == 'M.')
                            <div class="mr-1"><b>né le</b></div>
                        @endif
                        @if (auth::user()->civilite == 'Mme')
                            <div class="mr-1"><b>née le</b></div>
                        @endif
                        @if (auth::user()->date_naissance !== null)
                            <div class="mr-1"><b>{{ auth::user()->date_naissance->format('d M Y') }}</b></div>
                        @endif
                        @if (auth::user()->lieu_naissance !== null)
                            <div class="mr-1"><b>à</b></div>
                            <div class="mr-1"><b>{{ auth::user()->lieu_naissance }}</b></div>
                        @endif
                    </div>

                    <div class="mt-0">
                        <div class="mr-3"><b>{{ __("Nom d'utilisateur") }}:</b> {{ auth::user()->username }}</div>
                        <div class="mr-3"><b>Adresse e-mail:</b> {{ auth::user()->email }}</div>
                        <div class="mr-3"><b>Téléphone:</b> {{ auth::user()->telephone }}</div>
                    </div>
                    <a href="{{ route('profiles.edit', ['username' => auth::user()->username]) }}"
                        class="btn btn-outline-secondary mt-3">Modifier mon profile</a>
                @endcan
            </div>
        </div>
        @roles('Administrateur|Courrier')
        <div class="list-group mt-5">
            @foreach ($courriers as $courrier)
                <div class="list-group-item">
                    <h4><a href="{!! route('courriers.show', $courrier->id) !!}">{!! $courrier->objet !!}</a></h4>
                    <p>{!! $courrier->message !!}</p>
                    <p><strong>Type de courrier : </strong> {!! $courrier->types_courrier->name !!}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small>Posté le {!! $courrier->created_at->format('d/m/Y à H:m') !!}</small>
                        <span class="badge badge-primary">{!! $courrier->user->firstname !!}&nbsp;{!! $courrier->user->name !!}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center pt-2">
            {!! $courriers->links() !!}
        </div>
        @endroles
        @roles('Demandeur')    
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                @if (isset($individuelles))
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Ma demande de formation
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- <div align="right">
                                <a href="{{ route('individuelles.create') }}">
                                    <div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div>
                                </a>
                            </div>
                            <br /> --}}
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                id="table-individuelles">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Numéro</th>
                                        <th>Cin</th>
                                        {{-- <th>Civilité</th> --}}
                                        <th>Prenom et Nom</th>
                                        {{-- <th>Date nais.</th>
                                    <th>Lieu nais.</th> --}}
                                        <th>Téléphone</th>
                                        <th style="width:30%;">Module</th>
                                        {{-- <th>Localité</th> --}}
                                        <th>Statut</th>
                                        <th style="width:08%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>Numéro</th>
                                        <th>Cin</th>
                                        {{-- <th>Civilité</th> --}}
                                        <th>Prenom et Nom</th>
                                        {{-- <th>Date nais.</th>
                                    <th>Lieu nais.</th> --}}
                                        <th>Téléphone</th>
                                        <th>Module</th>
                                        {{-- <th>Localité</th> --}}
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($individuelles as $individuelle)
                                        @can('view', $individuelle)
                                            <tr>
                                                <td>{!! $individuelle->demandeur->numero !!}</td>
                                                <td>{!! $individuelle->cin !!}</td>
                                                {{-- <td>{!! $individuelle->demandeur->user->civilite !!}</td> --}}
                                                <td>{!! $individuelle->demandeur->user->firstname !!} {{ ' ' }}{!! $individuelle->demandeur->user->name !!} </td>
                                                {{-- <td>{!! $individuelle->demandeur->user->name !!}</td>
                                        <td>{!! $individuelle->demandeur->user->date_naissance->format('d/m/Y') !!}</td>
                                        <td>{!! $individuelle->demandeur->user->lieu_naissance !!}</td> --}}
                                                <td>{!! $individuelle->demandeur->user->telephone !!}</td>
                                                <td>
                                                    @foreach ($individuelle->demandeur->modules as $module)
                                                        <p>{!! $module->name !!}</p>
                                                    @endforeach
                                                </td>
                                                {{-- <td>{!! $individuelle->demandeur->departement->nom !!}</td> --}}
                                                <td style="text-align: center;">
                                                    {!! $individuelle->demandeur->statut !!}
                                                </td>
                                                <td class="d-flex align-items-baseline text-center-row">
                                                    <a href="{!! url('individuelles/' . $individuelle->id . '/edit') !!}" class='btn btn-success btn-sm'
                                                        title="modifier">
                                                        <i class="far fa-edit">&nbsp;</i>
                                                    </a>
                                                    &nbsp;
                                                    <a href="{!! url('individuelles/' . $individuelle->id) !!}" class='btn btn-primary btn-sm'
                                                        title="voir">
                                                        <i class="far fa-eye">&nbsp;</i>
                                                    </a>
                                                    &nbsp;
                                                    {!! Form::open(['method' => 'DELETE', 'url' => 'individuelles/' . $individuelle->id, 'id' => 'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
                                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'supprimer']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endcan
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                </div>
                @else
                <div align="center">
                    <a href="{{ route('individuelles.create') }}">
                        <div class="btn btn-outline-primary mt-3"><i class="fas fa-plus"></i>&nbsp;Cliquez ici pour compléter votre demande de formation</i></div>
                    </a>
                </div>
                @endif
            </div>
        </div>
        @endroles
    </div>
@endsection
