@extends('layout.default')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Liste des villages
                    </div>
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <div align="right">
                                <a href="{{ route('villages.selectvillage') }}">
                                    <div class="btn btn-success">Nouveau Village&nbsp;<i class="fas fa-plus"></i></div>
                                </a>
                            </div>
                            <br />
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Chef</th>
                                        <th>Info</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Chef</th>
                                        <th>Info</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($villages as $village)
                                        <tr>
                                            <td>
                                                {{ $village->id }}
                                            </td>
                                            <td>
                                                {{ $village->nom }}<br>
                                                Region de
                                                {{ $village->commune->arrondissement->departement->region->nom }}<br>
                                                Commune de {{ $village->commune->nom }}

                                            </td>
                                            <td>
                                                {{ $village->chef->user->name . '  ' . $village->chef->user->firstname }}
                                            </td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href={{ route('villages.show', ['village' => $village->id]) }}
                                                    title="Modifier"><i class="far fa-edit">&nbsp;</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            {{-- {{ $villages->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
