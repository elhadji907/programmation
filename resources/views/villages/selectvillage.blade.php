@extends('layout.default')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">SENFORAGE</h4>
                            <p class="card-category"> Selection du village pour le client
                                {{-- <a href="{{route('clients.create')}}"><div class="btn btn-warning">Nouveau Client <i class="material-icons">add</i></div></a> --}}
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table-villages">
                                    <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Village
                                        </th>
                                        <th>
                                            Commune
                                        </th>
                                        <th>
                                            Region
                                        </th>
                                        <th>
                                            Selectionner
                                        </th>
                                    </thead>
                                    <tbody>

                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-villages').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('villages.list') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nom',
                        name: 'nom'
                    },
                    {
                        data: 'commune.nom',
                        name: 'commune.nom'
                    },
                    {
                        data: 'commune.arrondissement.departement.region.nom',
                        name: 'commune.arrondissement.departement.region.nom'
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false
                    }

                ],
                "columnDefs": [{
                        "data": null,
                        "render": function(data, type, row) {
                            url_e = "{!! route('directions.create', 'village=:id') !!}".replace(':id', data.id);
                            return '<a href=' + url_e +
                                '  class=" btn btn-primary " ><i class="material-icons">edit</i></a>';
                        },
                        "targets": 4
                    },

                ],

            });
        });

    </script>


@endpush
