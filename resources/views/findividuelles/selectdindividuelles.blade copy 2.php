@extends('layout.default')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        {{ __("Sélection de l'ingénieur") }}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div>
                                <button class="btn btn-success add-all" data-url="">Valider</button>
                            </div>
                            <br />
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                style="height: 100px;">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="50px"><input type="checkbox" id="check_all"></th>
                                        <th>ID</th>
                                        <th>Cin</th>
                                        <th>Civilité</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Date nais.</th>
                                        <th>Lieu nais.</th>
                                        <th>Téléphone</th>
                                        <th>Département</th>
                                        <th>Région</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Cin</th>
                                        <th>Civilité</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Date nais.</th>
                                        <th>Lieu nais.</th>
                                        <th>Téléphone</th>
                                        <th>Département</th>
                                        <th>Région</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if ($individuelles->count())
                                        @foreach ($individuelles as $key => $individuelle)
                                            <tr id="tr_{{ $individuelle->id }}">
                                                <td>
                                                    <input type="checkbox" class="checkbox" name="row[$key][individuelle]"
                                                        data-id="{{ $individuelle->id }}">
                                                </td>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $individuelle->cin }}</td>
                                                <td>{!! $individuelle->demandeur->user->civilite !!}</td>
                                                <td>{!! $individuelle->demandeur->user->firstname !!}</td>
                                                <td>{!! $individuelle->demandeur->user->name !!}</td>
                                                <td>{!! $individuelle->demandeur->user->date_naissance->format('d/m/Y') !!}</td>
                                                <td>{!! $individuelle->demandeur->user->lieu_naissance !!}</td>
                                                <td>{!! $individuelle->demandeur->user->telephone !!}</td>
                                                <td>{!! $individuelle->demandeur->departement->nom !!}</td>
                                                <td>{!! $individuelle->demandeur->departement->region->nom !!}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#check_all').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".checkbox").prop('checked', true);
                } else {
                    $(".checkbox").prop('checked', false);
                }
            });
            $('.checkbox').on('click', function() {
                if ($('.checkbox:checked').length == $('.checkbox').length) {
                    $('#check_all').prop('checked', true);
                } else {
                    $('#check_all').prop('checked', false);
                }
            });
            $('.add-all').on('click', function(e) {
                var idsArr = [];
                $(".checkbox:checked").each(function() {
                    idsArr.push($(this).attr('data-id'));
                });
                if (idsArr.length <= 0) {
                    alert("Please select atleast one record to pointer.");
                } else {
                    var strIds = idsArr.join(",");
                    $.ajax({
                        url: "{{ route('findividuelles.adddindividuelles') }}",
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'ids': strIds
                        },
                        success: function(data) {
                            if (data['status'] == true) {
                                $(".checkbox:checked").each(function() {
                                    alert(strIds);
                                });
                                alert(data['message']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                            window.location.reload()
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endpush
